<div class="wrapper wrapper--w790">
    <div class="card card-5">

        <div class="card-body">

{{-- originalmente no era waiting-form, era is-invalid (Pone el div color rojo, si esta incorrecto) --}}

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Nombre</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="nombre" class="input100" type="text" name="nombre" value="{{isset($team->nombre)?$team->nombre:''}}" required autofocus autocomplete="nombre">
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-user"></i>
    </span>
        </div>
</div>




<div class="form-row wrap-input100 validate-input">
    <div class="name ">Descripcion</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="descripcion" class="input100" type="text" name="descripcion" value="{{isset($team->descripcion)?$team->descripcion:''}}" required autofocus autocomplete="descripcion">
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-user"></i>
    </span>
        </div>
</div>


{{-- 
/////////////////////////////////////////////////////////////////////
 --}}


 <div class="form-row wrap-input100 validate-input" >
    <div class="name ">Calle</div>
    <div class="input-group wrap-input100 validate-input">
        <input id="calle" class="input101" type="text" name="calle" value="{{isset($team->calle)?$team->calle:''}}" required autofocus autocomplete="calle">
        <span class="focus-input100 "></span>
    </div>
    </div>
        <div class="name ">Número</div>
        <div class="input-group wrap-input100 validate-input ">
            <div class="row row-refine ">
                <div class="col-3 ">
                    <div class="input-group-desc ">
                        <input id="numero_interior" class=" input101 " type="text " name="numero_interior" value="{{isset($team->numero_interior)?$team->numero_interior:''}}" required autofocus autocomplete="numero_interior">
                        <span class="focus-input100 "></span>
                        <label class="label--desc">Interior</label>
                    </div>  
                    <br>
                </div>
                <div class="col-9 wrap-input100 validate-input ">
                    <div class="input-group-desc ">
                        <input id="numero_exterior" class=" input101 " type="text " name="numero_exterior" value="{{isset($team->numero_exterior)?$team->numero_exterior:''}}" required autofocus autocomplete="numero_exterior">
                        <span class="focus-input100 "></span>
                        <label class="label--desc">Exterior</label>
                    </div>
                    
                </div>
            </div>
        </div>
    
        <div class="form-row wrap-input100 validate-input">
        <div class="name ">Colonia</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="colonia" class="input101" type="text" name="colonia" value="{{isset($team->colonia)?$team->colonia:''}}" required autofocus autocomplete="colonia">
                <span class="focus-input100 "></span>
            </div>
    </div>
    
    <div class="form-row wrap-input100 validate-input">
        <div class="name ">Ciudad</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="ciudad" class="input101" type="text" name="ciudad" value="{{isset($team->ciudad)?$team->ciudad:''}}"required autofocus autocomplete="ciudad">
                <span class="focus-input100 "></span>
            </div>
    </div>
    
    <div class="form-row wrap-input100 validate-input">
        <div class="name ">Estado</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="estado" class="input101" type="text" name="estado" value="{{isset($team->estado)?$team->estado:''}}" required autofocus autocomplete="estado">
                <span class="focus-input100 "></span>
            </div>
    </div>
    

    <div class="form-row wrap-input100 validate-input">
        <div class="name ">Codigo Postal</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="codigo_postal" class="input101" type="number" name="codigo_postal" value="{{isset($team->codigo_postal)?$team->codigo_postal:''}}" required autofocus autocomplete="codigo_postal">
                <span class="focus-input100 "></span>
            </div>
    </div>
 

    <div class="form-row wrap-input100 validate-input">
        <div class="name ">Correo electrónico de contacto</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="email_contacto" class="input101" type="email" name="email_contacto" value="{{isset($team->email_contacto)?$team->email_contacto:''}}" required autofocus autocomplete="email_contacto">
                <span class="focus-input100 "></span>
            </div>
    </div>
    




    <div class="form-row wrap-input100 validate-input">
        <div class="name ">Teléfono</div>
            <div class="input-group wrap-input100 validate-input">
                <input id="telefono" class=" input100 " type="number" name="telefono" value="{{isset($team->telefono)?$team->telefono:''}}" unsigned required autofocus autocomplete="telefono">
                <span class="focus-input100 "></span>
            </div>
    </div>
    





<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">

{{-- Se agrega para para dirigirse a listadogrupos o principal de grupos --}}


</div>

</div>
</div>

