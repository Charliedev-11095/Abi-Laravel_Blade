<x-guest-layout>

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="{{ asset('basketball.png') }}"/>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ABI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
         body {
                font-family: Arial, Helvetica, sans-serif;
            }
            @media screen and (max-width: 767px) {
    .botonpequeno{
        width: 7rem;
        height: 2.1rem;
        font-size: 70%;
    }
}
        </style>
    </head>
    <body class="antialiased">
        

    


{{-- //////////////////////////////////// --}}


<body>
                  
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset('images/bg.jpg') }});" >
            
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-8 col-md-offset-2 text-center fh5co-heading">

                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>BIENVENIDO<br> <strong>A NUESTRA PÁGINA</strong></h1>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>CONÓCENOS</h2>
                    <p>CEFODE AGUILAS MORELIA, es un proyecto deportivo dirigido a todos los niños y niñas, adolescentes y jóvenes que gusten de la práctica del basquetbol, con un enfoque tanto formativo como competitivo en la ciudad de Morelia, Michoacán.</p>
            </div>

    <div id="fh5co-project">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>ACTIVIDADES CULTURALES Y DEPORTIVAS</h2>
                    <p>Desarrolla alguna de las siguientes habilidades mientras te diviertes</p>
                </div>
            </div>
        </div>
        <div class="project-content">
            <div class="col-forth">
                <div class="project animate-box" style="background-image:url({{ asset('images/img1.jpg') }});">
                    <a href="#" class="desc" style="text-decoration:none">
                        <h3>Fundamentos básicos</h3>
                    </a>
                </div>
            </div>
            <div class="col-forth">
                <div class="project animate-box" style="background-image:url({{ asset('images/img2.jpg') }});">
                    <a href="#" class="desc" style="text-decoration:none">
                        <h3>Entrenamiento funcional</h3>
                    </a>
                </div>
            </div>
            <div class="col-forth">
                <div class="project animate-box" style="background-image:url({{ asset('images/img3.jpg') }});">
                    <a href="#" class="desc" style="text-decoration:none">
                        <h3>Biomecánica de ejecución</h3>
                    </a>
                </div>
            </div>
            <div class="col-forth">
                <div class="project animate-box" style="background-image:url({{ asset('images/img4.jpg') }});">
                    <a href="#" class="desc" style="text-decoration:none">
                        <h3>toma de deciciones</h3>
                    </a>
                </div>
            </div>
    
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"><br>subir</i></a>
    </div>
    
    
    </body>


{{-- /////////////////////////////////// --}}


    <footer id="fh5co-footer" role="contentinfo">
        <center><h1>Encuentranos en....</h1></center>
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-4 fh5co-widget">
                   
                    <h3>MAPA DE UBICACIÓN.</h3>
                    <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="https://www.facebook.com/Academia-Basquetbol-Integral-117194377233584" target="_blank"><i class="icon-facebook"></i></a>Página oficial de ABI en Facebook</li>
                            
                        </ul>
                    </p>
                    {{-- <p><a class="btn btn-primary btn-outline with-arrow" href="#">Learn More <i class="icon-arrow-right"></i></a></p> --}}
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60150.683580222656!2d-101.74184912595496!3d19.5665966988659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a5f3e1eb35cb7%3A0x3bc7650cf34be0d4!2sMichoac%C3%A1n!5e0!3m2!1ses-419!2smx!4v1631405441030!5m2!1ses-419!2smx" width="900" height="300" style="border:1;" allowfullscreen="" loading="lazy"></iframe>
            <div class="row copyright">

                <div class="col-md-12 text-center">
                        &copy; 2021 derechos reservados.
                </div>
            </div>

        </div>
    </footer>

    </body>
</html>
<div class="absolute flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a class="btn btn-primary botonpequeno" href="{{ route('login') }}">INICIAR SESIÓN</a>
                {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif --}}
            @endauth
        </div>
    @endif

        </div>
</x-guest-layout>