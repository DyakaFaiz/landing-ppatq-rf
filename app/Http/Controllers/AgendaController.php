<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    private function extractParagraphHTML($html) 
    {
        // Membuat instance DOMDocument
        $dom = new DOMDocument();
    
        // Non-aktifkan error parsing HTML (HTML dari editor seperti Quill bisa tidak valid)
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();
    
        // Ambil semua elemen <p>
        $pTags = $dom->getElementsByTagName('p');
    
        // Jika ada tag <p>, ambil outer HTML dari tag pertama
        if ($pTags->length > 0) {
            return $dom->saveHTML($pTags->item(0));
        }
        
        // Jika tidak ada, kembalikan string kosong
        return '';
    }


    private const CACHE_TTL = 300;

    /**
     * Buang sisa editor Quill yang ikut tersimpan di HTML agenda: tooltip berisi <input>, area clipboard, dan
     * atribut contenteditable pada pembungkus isi (membuat teks bisa diketik oleh pengunjung).
     */
    private function bersihkanQuill(?string $html): string
    {
        $html = preg_replace('~<div class="ql-(?:tooltip|clipboard)\b[^"]*"[^>]*>.*?</div>~s', '', (string) $html);

        $html = preg_replace('~<input\b[^>]*>~i', '', $html);

        // Atribut yang membuat konten bisa diedit atau dipasangi perilaku editor
        return preg_replace('~\s+(?:contenteditable|data-gramm|data-placeholder|tabindex)="[^"]*"~i', '', $html);
    }
    private const PER_HALAMAN = 6;

    public function index(){
        $halaman = max(1, (int) request()->query('page', 1));

        $total = Cache::remember('agenda.total', self::CACHE_TTL, fn () => DB::table('agenda')
            ->whereNull('deleted_at')
            ->count());

        // Halaman di luar jangkauan: 404, bukan halaman kosong yang bisa diindeks
        abort_if($halaman > max(1, (int) ceil($total / self::PER_HALAMAN)), 404);

        $item = Cache::remember("agenda.v3.halaman.$halaman", self::CACHE_TTL, function () use ($halaman) {
            $agenda = DB::table('agenda')
                ->select('id', 'judul', 'isi', 'tanggal_mulai', 'tanggal_selesai', 'gambar', 'created_at')
                ->whereNull('deleted_at')
                ->orderBy("created_at", "desc")
                ->forPage($halaman, self::PER_HALAMAN)
                ->get();

            // Untuk setiap record agenda, tambahkan properti baru berisi teks dari tag <p>
            foreach ($agenda as $agendaItem) {
                $agendaItem->isi = $this->bersihkanQuill($agendaItem->isi);
                $agendaItem->isi_paragraph = $this->extractParagraphHTML($agendaItem->isi);
            }

            return $agenda;
        });

        $data['agenda'] = (new LengthAwarePaginator(
            $item, $total, self::PER_HALAMAN, $halaman, ['path' => Paginator::resolveCurrentPath()]
        ))->withQueryString();

        return view('agenda.index', $data);
    }
}
