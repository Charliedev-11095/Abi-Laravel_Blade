
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{-- originalmente no era waiting-form, era is-invalid (Pone el div color rojo, si esta incorrecto) --}}


<p><h4> {{$Modo=='crear' ? 'Alumno':''}}
</h4></p>

<div class="form-group" style="{{$Modo=='crear' ? '':'visibility:hidden'}}">
    <label class="control-label" for="alumnos_id" value="{{$Modo=='crear' ? 'Seleccionar alumno a evaluar':'Verificar alumno'}}">{{$Modo=='crear' ? 'Seleccionar alumno':'Verificar alumno'}}</label>
    <select  type="text" name='{{$Modo=='crear' ? 'alumnos_id':''}}' id="alumnos_id" class="input100 {{$errors->has('alumnos_id')?'waiting-form':old('alumnos_id')}}">
    
        @foreach ($alumnos as $alumno)
        <option value="{{ $alumno->id }}">
            {{ $alumno->nombres }} {{ $alumno->apellido_paterno }}
            {{ $alumno->apellido_materno }}
        </option>
    @endforeach
    </select>
    {!! $errors->first('alumnos_id','<div class="invalid-feedback">:message</div>') !!}
</div>


<p><h4>Liderazgo, valores y actitudes
</h4></p>


<div class="form-group">
    <label class="control-label" for="comunicacion">Comunicación</label>
    <select class="input100 {{$errors->has('comunicacion')?'waiting-form':old('comunicacion')}}" type="text" value="{{ isset($historicos_deportivo->comunicacion)?$historicos_deportivo->comunicacion:'' }}" name="comunicacion" id="comunicacion">

        {{-- invalid-feedback2 sirve para marcar que era una opcion anterior --}}
        <option class="invalid-feedback2">{{ isset($historicos_deportivo->comunicacion)?$historicos_deportivo->comunicacion:'selecciona una opcion' }}</option>
        <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('comunicacion','<div class="invalid-feedback">:message</div>') !!}
    
</div>




<div class="form-group">
   
    <label class="control-label" for="liderazgo">Lidera con el ejemplo</label>
    <select class="input100 {{$errors->has('liderazgo')?'waiting-form':old('liderazgo')}}" type="text" value="{{ isset($historicos_deportivo->liderazgo)?$historicos_deportivo->liderazgo:'' }}" name="liderazgo" id="liderazgo">
        <option class="invalid-feedback2">{{ isset($historicos_deportivo->liderazgo)?$historicos_deportivo->liderazgo: 'selecciona una opcion' }}</option>
        <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('liderazgo','<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">
    <label class="control-label" for="respeto">Respeto</label>
    <select class="input100 {{$errors->has('respeto')?'waiting-form':old('respeto')}}" type="text" value="{{ isset($historicos_deportivo->respeto)?$historicos_deportivo->respeto:'' }}" name="respeto" id="respeto">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->respeto)?$historicos_deportivo->respeto: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>        

    {!! $errors->first('respeto','<div class="invalid-feedback">:message</div>') !!}
</div>




<div class="form-group">
    <label class="control-label" for="responsabilidad">Responsabilidad</label>
    <select class="input100 {{$errors->has('responsabilidad')?'waiting-form':old('responsabilidad')}}" type="text" value="{{ isset($historicos_deportivo->responsabilidad)?$historicos_deportivo->responsabilidad:'' }}" name="responsabilidad" id="responsabilidad">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->responsabilidad)?$historicos_deportivo->responsabilidad: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>       

    {!! $errors->first('responsabilidad','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="participacion">Participación y disponibilidad</label>
    <select class="input100 {{$errors->has('participacion')?'waiting-form':old('participacion')}}" type="text" value="{{ isset($historicos_deportivo->participacion)?$historicos_deportivo->participacion:'' }}" name="participacion" id="participacion">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->participacion)?$historicos_deportivo->participacion: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>    

    {!! $errors->first('participacion','<div class="invalid-feedback">:message</div>') !!}
</div>




<div class="form-group">
    <label class="control-label" for="actitud">Actitud</label>
    <select class="input100 {{$errors->has('actitud')?'waiting-form':old('actitud')}}" type="text" value="{{ isset($historicos_deportivo->actitud)?$historicos_deportivo->actitud:'' }}" name="actitud" id="actitud">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->actitud)?$historicos_deportivo->actitud: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>       

    {!! $errors->first('actitud','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="constancia">Constancia</label>
    <select class="input100 {{$errors->has('constancia')?'waiting-form':old('constancia')}}" type="text" value="{{ isset($historicos_deportivo->constancia)?$historicos_deportivo->constancia:'' }}" name="constancia" id="constancia">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->constancia)?$historicos_deportivo->constancia: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>     

    {!! $errors->first('constancia','<div class="invalid-feedback">:message</div>') !!}
</div>






<div class="form-group">
    <label class="control-label" for="compromiso">Compromiso</label>
    <select class="input100 {{$errors->has('compromiso')?'waiting-form':old('compromiso')}}" type="text" value="{{ isset($historicos_deportivo->compromiso)?$historicos_deportivo->compromiso:'' }}" name="compromiso" id="compromiso">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->compromiso)?$historicos_deportivo->compromiso: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>      

    {!! $errors->first('compromiso','<div class="invalid-feedback">:message</div>') !!}
</div>







<div class="form-group">
    <label class="control-label" for="trabajo_en_equipo">Trabajo en equipo</label>
    <select class="input100 {{$errors->has('trabajo_en_equipo')?'waiting-form':old('trabajo_en_equipo')}}" type="text" value="{{ isset($historicos_deportivo->trabajo_en_equipo)?$historicos_deportivo->trabajo_en_equipo:'' }}" name="trabajo_en_equipo" id="trabajo_en_equipo">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->trabajo_en_equipo)?$historicos_deportivo->trabajo_en_equipo: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>       

    {!! $errors->first('trabajo_en_equipo','<div class="invalid-feedback">:message</div>') !!}
</div>





<br>

<p><h4>Manejo de balón</h4></p>
<div class="form-group">
    <label class="control-label" for="mirada_al_frente">Mirada al frente</label>
    <select class="input100 {{$errors->has('mirada_al_frente')?'waiting-form':old('mirada_al_frente')}}" type="text" value="{{ isset($historicos_deportivo->mirada_al_frente)?$historicos_deportivo->mirada_al_frente:'' }}" name="mirada_al_frente" id="mirada_al_frente">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->mirada_al_frente)?$historicos_deportivo->mirada_al_frente: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>      

    {!! $errors->first('mirada_al_frente','<div class="invalid-feedback">:message</div>') !!}
</div>







<div class="form-group">
    <label class="control-label" for="coordinacion_manos_balon">Utilizar ambas manos</label>
    <select class="input100 {{$errors->has('coordinacion_manos_balon')?'waiting-form':old('coordinacion_manos_balon')}}" type="text" value="{{ isset($historicos_deportivo->coordinacion_manos_balon)?$historicos_deportivo->coordinacion_manos_balon:'' }}" name="coordinacion_manos_balon" id="coordinacion_manos_balon">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->coordinacion_manos_balon)?$historicos_deportivo->coordinacion_manos_balon: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('coordinacion_manos_balon','<div class="invalid-feedback">:message</div>') !!}
</div>






<div class="form-group">
    <label class="control-label" for="decision_bajo_presion">Toma decisiones bajo presión</label>
    <select class="input100 {{$errors->has('decision_bajo_presion')?'waiting-form':old('decision_bajo_presion')}}" type="text" value="{{ isset($historicos_deportivo->decision_bajo_presion)?$historicos_deportivo->decision_bajo_presion:'' }}" name="decision_bajo_presion" id="decision_bajo_presion">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->decision_bajo_presion)?$historicos_deportivo->decision_bajo_presion: 'selecciona una opción' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>      

    {!! $errors->first('decision_bajo_presion','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="acertividad_en_balon">Toma buenas decisiones</label>
    <select class="input100 {{$errors->has('acertividad_en_balon')?'waiting-form':old('acertividad_en_balon')}}" type="text" value="{{ isset($historicos_deportivo->acertividad_en_balon)?$historicos_deportivo->acertividad_en_balon:'' }}" name="acertividad_en_balon" id="acertividad_en_balon">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->acertividad_en_balon)?$historicos_deportivo->acertividad_en_balon: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>      

    {!! $errors->first('acertividad_en_balon','<div class="invalid-feedback">:message</div>') !!}
</div>




<br>
<p><h4>Pases</h4></p>
<div class="form-group">
    <label class="control-label" for="coordinacion_manos_pase">Mano derecha / Mano izquierda</label>
    <select class="input100 {{$errors->has('coordinacion_manos_pase')?'waiting-form':old('coordinacion_manos_pase')}}" type="text" value="{{ isset($historicos_deportivo->coordinacion_manos_pase)?$historicos_deportivo->coordinacion_manos_pase:'' }}" name="coordinacion_manos_pase" id="coordinacion_manos_pase">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->coordinacion_manos_pase)?$historicos_deportivo->coordinacion_manos_pase: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('coordinacion_manos_pase','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="rapidez_en_pase">Pases al objetivo / pases en tiempo</label>
    <select class="input100 {{$errors->has('rapidez_en_pase')?'waiting-form':old('rapidez_en_pase')}}" type="text" value="{{ isset($historicos_deportivo->rapidez_en_pase)?$historicos_deportivo->rapidez_en_pase:'' }}" name="rapidez_en_pase" id="rapidez_en_pase">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->rapidez_en_pase)?$historicos_deportivo->rapidez_en_pase: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>    

    {!! $errors->first('rapidez_en_pase','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="pase_al_poste">Pase al poste</label>
    <select class="input100 {{$errors->has('pase_al_poste')?'waiting-form':old('pase_al_poste')}}" type="text" value="{{ isset($historicos_deportivo->pase_al_poste)?$historicos_deportivo->pase_al_poste:'' }}" name="pase_al_poste" id="pase_al_poste">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->pase_al_poste)?$historicos_deportivo->pase_al_poste: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('pase_al_poste','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="acertividad_en_pase">Toma buenas decisiones</label>
    <select class="input100 {{$errors->has('acertividad_en_pase')?'waiting-form':old('acertividad_en_pase')}}" type="text" value="{{ isset($historicos_deportivo->acertividad_en_pase)?$historicos_deportivo->acertividad_en_pase:'' }}" name="acertividad_en_pase" id="acertividad_en_pase">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->acertividad_en_pase)?$historicos_deportivo->acertividad_en_pase: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>       

    {!! $errors->first('acertividad_en_pase','<div class="invalid-feedback">:message</div>') !!}
</div>




<br>
<p><h4>Trabajo de pies</h4></p>
<div class="form-group">
    <label class="control-label" for="balance_pies">Postura atlética, balance, control</label>
    <select class="input100 {{$errors->has('balance_pies')?'waiting-form':old('balance_pies')}}" type="text" value="{{ isset($historicos_deportivo->balance_pies)?$historicos_deportivo->balance_pies:'' }}" name="balance_pies" id="balance_pies">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->balance_pies)?$historicos_deportivo->balance_pies: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('balance_pies','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="pivote">Pivotea correctamente</label>
    <select class="input100 {{$errors->has('pivote')?'waiting-form':old('pivote')}}" type="text" value="{{ isset($historicos_deportivo->pivote)?$historicos_deportivo->pivote:'' }}" name="pivote" id="pivote">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->pivote)?$historicos_deportivo->pivote: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>     

    {!! $errors->first('pivote','<div class="invalid-feedback">:message</div>') !!}
</div>




<br>
<p><h4>Lanzamiento</h4></p>
<div class="form-group">
    <label class="control-label" for="balance_objetivo">Pies en linea con el objetivo</label>
    <select class="input100 {{$errors->has('balance_objetivo')?'waiting-form':old('balance_objetivo')}}" type="text" value="{{ isset($historicos_deportivo->balance_objetivo)?$historicos_deportivo->balance_objetivo:'' }}" name="balance_objetivo" id="balance_objetivo">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->balance_objetivo)?$historicos_deportivo->balance_objetivo: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>      

    {!! $errors->first('balance_objetivo','<div class="invalid-feedback">:message</div>') !!}
</div>




<div class="form-group">
    <label class="control-label" for="agarre_balon">Manos correctas en el balón</label>
    <select class="input100 {{$errors->has('agarre_balon')?'waiting-form':old('agarre_balon')}}" type="text" value="{{ isset($historicos_deportivo->agarre_balon)?$historicos_deportivo->agarre_balon:'' }}" name="agarre_balon" id="agarre_balon">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->agarre_balon)?$historicos_deportivo->agarre_balon: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>     

    {!! $errors->first('agarre_balon','<div class="invalid-feedback">:message</div>') !!}
</div>




<div class="form-group">
    <label class="control-label" for="alineacion_al_aro">Codo en linea al aro</label>
    <select class="input100 {{$errors->has('alineacion_al_aro')?'waiting-form':old('alineacion_al_aro')}}" type="text" value="{{ isset($historicos_deportivo->alineacion_al_aro)?$historicos_deportivo->alineacion_al_aro:'' }}" name="alineacion_al_aro" id="alineacion_al_aro">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->alineacion_al_aro)?$historicos_deportivo->alineacion_al_aro: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('alineacion_al_aro','<div class="invalid-feedback">:message</div>') !!}
</div>




<div class="form-group">
    <label class="control-label" for="entradas_manos">Termina entradas con ambas manos</label>
    <select class="input100 {{$errors->has('entradas_manos')?'waiting-form':old('entradas_manos')}}" type="text" value="{{ isset($historicos_deportivo->entradas_manos)?$historicos_deportivo->entradas_manos:'' }}" name="entradas_manos" id="entradas_manos">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->entradas_manos)?$historicos_deportivo->entradas_manos: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>      

    {!! $errors->first('entradas_manos','<div class="invalid-feedback">:message</div>') !!}
</div>




<br>
<p><h4>Defensa</h4></p>
<div class="form-group">
    <label class="control-label" for="posicion_cuerpo">Posicion del cuerpo</label>
    <select class="input100 {{$errors->has('posicion_cuerpo')?'waiting-form':old('posicion_cuerpo')}}" type="text" value="{{ isset($historicos_deportivo->posicion_cuerpo)?$historicos_deportivo->posicion_cuerpo:'' }}" name="posicion_cuerpo" id="posicion_cuerpo">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->posicion_cuerpo)?$historicos_deportivo->posicion_cuerpo: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>      

    {!! $errors->first('posicion_cuerpo','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="presion_balon">Presiona el balón</label>
    <select class="input100 {{$errors->has('presion_balon')?'waiting-form':old('presion_balon')}}" type="text" value="{{ isset($historicos_deportivo->presion_balon)?$historicos_deportivo->presion_balon:'' }}" name="presion_balon" id="presion_balon">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->presion_balon)?$historicos_deportivo->presion_balon: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>    

    {!! $errors->first('presion_balon','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="bloqueo_oponente">Bloquea a su jugador</label>
    <select class="input100 {{$errors->has('bloqueo_oponente')?'waiting-form':old('bloqueo_oponente')}}" type="text" value="{{ isset($historicos_deportivo->bloqueo_oponente)?$historicos_deportivo->bloqueo_oponente:'' }}" name="bloqueo_oponente" id="bloqueo_oponente">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->bloqueo_oponente)?$historicos_deportivo->bloqueo_oponente: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
    <option>Bueno</option>
    <option>Regular</option>
    <option>Bajo</option>
</select>     

    {!! $errors->first('bloqueo_oponente','<div class="invalid-feedback">:message</div>') !!}
</div>





<div class="form-group">
    <label class="control-label" for="contesta_lanzamiento">Contesta lanzamiento</label>
    <select class="input100 {{$errors->has('contesta_lanzamiento')?'waiting-form':old('contesta_lanzamiento')}}" type="text" value="{{ isset($historicos_deportivo->contesta_lanzamiento)?$historicos_deportivo->contesta_lanzamiento:'' }}" name="contesta_lanzamiento" id="contesta_lanzamiento">
    <option class="invalid-feedback2">{{ isset($historicos_deportivo->contesta_lanzamiento)?$historicos_deportivo->contesta_lanzamiento: 'selecciona una opcion' }}</option>
    <option>Excelente</option>
        <option>Bueno</option>
        <option>Regular</option>
        <option>Bajo</option>
    </select>       

    {!! $errors->first('contesta_lanzamiento','<div class="invalid-feedback">:message</div>') !!}
</div>



<br>
<p><h4>Observaciones</h4></p>
<div class="form-group">
    <label class="control-label" for="observaciones">Anotaciones sobre alumno</label>
    <textarea id="observaciones" class="input100 {{$errors->has('observaciones')?'waiting-form':old('observaciones')}}" name="observaciones" rows="10" cols="50" value="{{ isset($historicos_deportivo->observaciones)?$historicos_deportivo->observaciones:'' }}">...</textarea>
    {!! $errors->first('observaciones','<div class="invalid-feedback">:message</div>') !!}
</div>









{{-- ESTE ES EL LIMITE DE LOS SELECT, Y EMPIEZA EL BOTON  --}}

<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">


