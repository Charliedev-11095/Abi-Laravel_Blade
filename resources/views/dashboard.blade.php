<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <!DOCTYPE HTML>
                <html>
                    <head>
                    
                    <title>perfil</title>
                    
                    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
                    
                
                    </head>
                    <body>
                        
                    <header id="fh5co-header" class="" role="banner" style="background-image:url({{ asset('images/img5.jpg') }});" data-stellar-background-ratio="0.5">
                            
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-8 col-md-offset-2 text-center fh5co-heading">
                                    <div class="display-t">
                                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                            <h1 style="color:rgb(255, 255, 255);"><br> <strong>BIENVENIDO {{Auth::user()->role}}</strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    

                    <div id="fh5co-services" class="fh5co-bg-section">
                        
                        @if (Session::has('Mensaje'))
                        <div class="alert alert-warning alert-dismissable"> 
                            {{Session::get('Mensaje')}}
                        </div>
                        @endif
                        
                        <div class="container">
                            

                            @if (Auth::user()->role == 'Administrador')
                            <div class="card card-5">
                                <div class="card-heading">
                                                    
                                <H2 class="title">ACCESO RÁPIDO</H2>
                                </div>
                                <div class="card-body">
                                    <center><p><a href="{{ url('/teams/create') }}" class="btn btn-primary btn-lg with-arrow" >CREAR EQUIPO DE TRABAJO</a></p></center>
                                    <br>
                            <center><p><a href="{{ url('/formentrenadores/create') }}" class="btn btn-primary btn-lg with-arrow" >CREAR USUARIO ENTRENADOR</a></p></center>
                        
                            
                                </div>
                            </div>
                            <br>
                            @endif



                            <div class="card card-5">
                                <div class="card-heading">
                                                    
                                <H2 class="title">CONTROL DE ALUMNO</H2>
                                </div>
                                <div class="card-body">
                                    <center><p><a href="{{ url('/formtutores/create') }}" class="btn btn-primary btn-lg with-arrow" >CREAR GRUPO</a></p></center>
                                    <br>
                                    <center><p><a href="{{ url('/formtutores/create') }}" class="btn btn-primary btn-lg with-arrow" >REGISTRAR ALUMNO</a></p></center>
                                    <br>


<center><p><a href="{{ url('/formasistencia/create') }}" class="btn btn-primary btn-lg with-arrow" >TOMAR ASISTENCIA</a></p></center>
<br>

<center><p><a href="{{ url('/formhistorico_deportivo/create') }}" class="btn btn-primary btn-lg with-arrow" >Generar evaluación deportiva</a></p></center>
<br>
<center><p><a href="{{ url('/formhistorico_medico/create') }}" class="btn btn-primary btn-lg with-arrow" >CREAR REGISTRO DE SALUD</a></p></center>




                                </div>
                            </div>
                            <br>
                            <div class="card card-5">
                                <div class="card-heading">
                                                    
                                <H2 class="title">ACCESO RÁPIDO A HISTORIALES</H2>
                                </div>
                                <div class="card-body">
                                    <center><p><a href="{{ url('/formhistorico_deportivo') }}" class="btn btn-primary btn-lg with-arrow" >PROGRESO DEPORTIVO</a></p></center>
                                    <br>
<center><p><a href="{{ url('/formhistorico_medico') }}" class="btn btn-primary btn-lg with-arrow" >HISTORIAL MÉDICO</a></p></center>
<br>


                                </div>
                            </div>
                            
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                    
                            </div>

                            <div class="gototop js-top">
                                <a href="#" class="js-gotop"><i class="icon-arrow-up"><br>subir</i></a>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    </body>
                </html>
                
                
            

</x-app-layout>
