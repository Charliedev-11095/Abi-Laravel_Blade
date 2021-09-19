<x-app-layout>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">

        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    GESTOR DE DATOS
                </h2>
            </div>
        </x-slot>

        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">ADMINISTRAR DATOS</H2>
                </div>
                <div class="card-body">

                    <div>
                      

                        <a href="{{ url('/formalumnos') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-danger" type="submit"
                                value=" ALUMNO"></a>
                    </div>
                    <br>

                    <div>


                        <a href="{{ url('/formtutores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-warning" type="submit"
                                value=" TUTOR"></a>
                    </div>
                    <br>

{{--                     <div>
                      

                        <a href="{{ url('/formentrenadores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn-primary" type="submit"
                                value=" ENTRENADOR"></a>
                    </div>
                    <br> --}}

                    <div>
                      

                        <a href="{{ url('/formreg_med') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form " type="submit"
                                value="  REGISTRO MÉDICO"></a>
                    </div>
                    <br>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
