<!-- Favicon -->
<link href="{{asset('img/cropped-header-objectpatq.png')}}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Libraries Stylesheet -->
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
{{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Template Stylesheet -->
<link href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- Font open sans --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<style>
        body{
                font-family:'Noto Sans Display','Gill Sans MT', 'Gill Sans' , Calibri, 'Trebuchet MS', sans-serif;
                /* font-family: 'Lucida Sans Unicode', 'Trebuchet MS' , 'Lucida Grande', 'Lucida Sans', Arial, sans-serif */
        }
        ::selection {
                background-color: #00c14d; /* Ganti dengan warna latar belakang yang Anda inginkan */
                color: #ffffff; /* Ganti dengan warna teks yang Anda inginkan */
        }
                
        body{
                color: #4d4d4d;
        }

        .text-gray{
                color: rgb(114, 114, 114);
        }

        .text-all-news{
                text-decoration: none;
        }

        .text-all-news:hover{
                text-decoration: underline;
        }

        .instagram{
                background: linear-gradient(140deg, rgba(38,70,83,1) 2%, rgba(42,157,143,1) 8%, rgba(233,196,106,1) 16%, rgba(230,57,70,1) 50%, rgba(244,162,97,1) 96%, rgba(232,113,82,1) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text; 
                text-fill-color: transparent;
        }
        .tiktok{
                background: rgb(0,0,0);
                background: -moz-radial-gradient(circle, rgba(0,0,0,1) 11%, rgba(254,44,85,1) 40%, rgba(37,244,255,1) 67%);
                background: -webkit-radial-gradient(circle, rgba(0,0,0,1) 11%, rgba(254,44,85,1) 40%, rgba(37,244,255,1) 67%);
                background: radial-gradient(circle, rgba(0,0,0,1) 11%, rgba(254,44,85,1) 40%, rgba(37,244,255,1) 67%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#000000",endColorstr="#25f4ff",GradientType=1);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text; 
                text-fill-color: transparent;
        }
</style>