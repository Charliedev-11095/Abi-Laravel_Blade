
{{-- originalmente no era waiting-form, era is-invalid (Pone el div color rojo, si esta incorrecto) --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="form-row wrap-input100 validate-input">
    <div class="name ">Nombre de Usuario</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="name" class="input100" type="text" name="name" value="{{isset($usuario->name)?$usuario->name:''}}" required autofocus autocomplete="Nombres">
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-envelope"></i>
    </span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input">
    <div class="name ">Correo electronico</div>
        <div class="input-group wrap-input100 validate-input" >
            <input id="email" class="input100" type="email" name="email" value="{{isset($usuario->email)?$usuario->email:''}}" required autofocus autocomplete="email">
            <span class="focus-input100 "></span>
    <span class="symbol-input100">
        <i class="fa fa-envelope"></i>
    </span>
        </div>
</div>

<div class="form-row wrap-input100 validate-input ">
    <div class="name ">Contraseña</div>
    <div class="input-group wrap-input100 validate-input">
    <input id="password" class="input101 " type="password" name="password" required autocomplete="new-password" placeholder="Ingresa la contraseña" />
    </div>
</div>


<input type="submit" class="btn btn-success" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">
