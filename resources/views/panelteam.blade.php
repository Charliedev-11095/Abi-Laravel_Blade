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
                                            <h1 style="color:rgb(255, 255, 255);"><br> <strong>BIENVENIDO AL EQUIPO DE TRABAJO</strong></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">


                        <div class="container"> 
                    <div id="fh5co-services" class="fh5co-bg-section">
                        
                        @if (Session::has('Mensaje'))
                        <div class="alert alert-warning alert-dismissable"> 
                            {{Session::get('Mensaje')}}
                        </div>
                        @endif
                        
                        <div class="container">
                            
                            <div class="card card-5">
                                <div class="card-heading">
                                                    
                                @foreach ($teams as $team)
                                <H2 class="title">{{ $team->nombre }}</H2>
                                
                                @endforeach
                               
                               
                                </div>
                                <div class="card-body">
                                    @foreach ($teams as $team)
                                    <p><h4>Descripcion:</h4></p>
                                    <p><h5>{{ $team->descripcion }}</h5></p>
                                    <br>
                                    <p><h4>Direccion:</h4></p>
                                    <p><h5>{{ $team->calle }}{{ ' No. interior '.$team->numero_interior }}{{ ', No. exterior '.$team->numero_exterior }}{{ ', '.$team->colonia }}{{ ', '.$team->codigo_postal }}{{ '; '.$team->ciudad }}{{ ', '.$team->estado.'.' }}</h5></p>
                                    <br>
                                    <p><h4>Contacto</h4></p>
                                    <p><h5>{{ 'Correo electronico: '.$team->email_contacto }}</h5></p>
                                    <p><h5>{{ 'Telefono: '.$team->telefono }}</h5></p>
                                    @endforeach
                                    <br>
                                    <p><h4>Integrantes</h4></p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                        <tr>
                                            <tr>
                                               
                                      
                                                <th>Nombres</>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                             <th>Correo electronico</th>
                                             <th>Estatus</th>
                                            </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formentrenador as $entrenador)
                                        <tr>
                                           
                                          
                                            <td>{{$entrenador->nombres}}</td>
                                            <td>{{$entrenador->apellido_paterno}}</td>
                                            <td>{{$entrenador->apellido_materno}}</td>
                                            <td>{{$entrenador->email}}</td>
                                            <td>{{$entrenador->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                            </div>








                                </div>
                            </div>
                            <br>

                            
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