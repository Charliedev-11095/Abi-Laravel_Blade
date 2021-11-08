<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    OPCIONES DE ADMINISTRADOR
                </h2>
            </div>
        </x-slot>




        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">HERRAMIENTAS DE ADMINISTRADOR</H2>
                </div>
                <div class="card-body">



                    <div>
                     

                        <a href="{{ url('/teams') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-danger" type="submit"
                                value="EQUIPOS DE TRABAJO"></a>
                    </div>

                    <br>

                    <div>
                       

                        <a href="{{ url('/formentrenadores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-secondary" type="submit"
                                value="admón.
                                ENTRENADOR"></a>
                    </div>
                    <br>


                    <div>
                     

                        <a href="{{ url('/team_entrenadores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-primary" type="submit"
                                value="
                                asignación DE ENTRENADORES"></a>
                    </div>
     
                    <br>

                    <div>
                   

                        <a href="{{ url('/formusuario') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-info" type="submit"
                                value="admón.
                                USUARIOS"></a>
                    </div>
                    <br>

                </div>
            </div>
        </div>


    </div>
</x-app-layout>