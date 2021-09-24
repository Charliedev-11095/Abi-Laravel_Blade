


<div class="wrapper wrapper--w790">
    <div class="card card-5">

        <div class="card-body">

{{-- originalmente no era waiting-form, era is-invalid (Pone el div color rojo, si esta incorrecto) --}}




<div class="form-group">
    <label class="control-label" for="nivel">Nivel</label>
    <select class="input100 {{$errors->has('nivel')?'waiting-form':old('nivel')}}" type="text" value="{{ isset($grupo->nivel)?$grupo->nivel:'' }}" name="nivel" id="nivel" required>
    <option class="invalid-feedback2" value="{{ isset($grupo->nivel)?$grupo->nivel:'' }}">{{ isset($grupo->nivel)?$grupo->nivel: 'selecciona una opción' }}</option>
    <option>Inicial</option>
    <option>Básico</option>
    <option>Intermedio</option>
    <option>Avanzado</option>
</select>    

    {!! $errors->first('nivel','<div class="invalid-feedback">:message</div>') !!}
</div>



<div class="form-group">

    <label class="control-label" for="grado">Grado</label>
    <select class="input100 {{$errors->has('grado')?'waiting-form':old('grado')}}" type="text" value="{{ isset($grupo->grado)?$grupo->grado:'' }}" name="grado" id="grado" required>

        {{-- invalid-feedback2 sirve para marcar que era una opcion anterior --}}
        <option class="invalid-feedback2" value="{{ isset($grupo->grado)?$grupo->grado:'' }}">{{ isset($grupo->grado)?$grupo->grado:'selecciona una opción' }}</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    </select>    

    {!! $errors->first('grado','<div class="invalid-feedback">:message</div>') !!}
    
</div>




<div class="form-group">
    <label class="control-label" for="seccion">Sección</label>
    <select class="input100 {{$errors->has('seccion')?'waiting-form':old('seccion')}}" type="text" value="{{ isset($grupo->seccion)?$grupo->seccion:'' }}" name="seccion" id="seccion" required>
        <option class="invalid-feedback2" value="{{ isset($grupo->seccion)?$grupo->seccion:'' }}">{{ isset($grupo->seccion)?$grupo->seccion: 'selecciona una opción' }}</option>
        <option>A</option>
        <option>B</option>
    </select>    

    {!! $errors->first('seccion','<div class="invalid-feedback">:message</div>') !!}

</div>



<div class="form-group">
    <label class="control-label" for="estado">Estado</label>
    <select class="input100 {{$errors->has('estado')?'waiting-form':old('estado')}}" type="text" value="{{ isset($grupo->estado)?$grupo->estado:'' }}" name="estado" id="estado" required>
    <option class="invalid-feedback2" value="{{ isset($grupo->estado)?$grupo->estado:'' }}">{{ isset($grupo->estado)?$grupo->estado: 'selecciona una opción' }}</option>
    <option>Activo</option>
    <option>Inactivo</option>
</select>    

    {!! $errors->first('estado','<div class="invalid-feedback">:message</div>') !!}
</div>



<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">

{{-- Se agrega para para dirigirse a listadogrupos o principal de grupos --}}


</div>

</div>
</div>

