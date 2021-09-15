<x-app-layout>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <x-slot name="header">
            <div class="row">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    GESTOR DE PDF
                </h2>
            </div>
        </x-slot>

        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <H2 class="title">PANEL DE PDF IMPRIMIBLES</H2>
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{ url('formalumnos') }}"><input
                                class="btn btn btn-danger btn--radius-2 login100-form-btn validate-form " type="submit"
                                value="ALUMNOS"></a>
                    </div>       
                    <br>
                <div>
                        <a href="{{ url('formtutores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-success" type="submit"
                                value=" TUTORES"></a>
                </div>
                    <br>
                <div>
                    
                        <a href="{{ url('formentrenadores') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-secondary " type="submit"
                                value=" ENTRENADORES"></a>
                </div>
                    <br>
                <div>
                        <a href="{{ url('formreg_med') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-primary" type="submit"
                                value=" REGISTRO MÉDICO"></a>
                </div>
                    <br>
                <div>
                        <a href="{{ url('formhistorico_deportivo') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn" type="submit"
                                value="PROGRESO DEPORTIVO"></a>
                </div>
                    <br>
                <div>
                        <a href="{{ url('/formhistorico_medico') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-warning" type="submit"
                                value="  HISTORIAL MÉDICO"></a>
                </div>
                                <br>
                <div>
                        <a href="{{ url('asistencia/grupo_alumnos') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-dark" type="submit"
                                value="  GRUPOS Y ALUMNOS"></a>
                </div>
                                <br>
                <div>
                        <a href="{{ url('formasistencia') }}"><input
                                class="btn btn--radius-2 login100-form-btn validate-form btn btn-danger" type="submit"
                                value="  LISTA DE GRUPO"></a>
                </div>
                    <br>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>