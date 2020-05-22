<div class="card card-body bg-light mt-5">
<a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-outline-success"><i class="fa fa-backward"></i>Volver</a>
</div>
<div class="card card-body bg-light mt-5">
    <h2>Editar Usuario</h2>
    <form action="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $datos['id_usuario']?>" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre<sup>*</sup></label>
            <input type="nombre" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="<?php echo $datos['nombre'];?>" placeholder="ingrese su nombre">
        </div>  
        <div class="form-group">
            <label for="email">Email<sup>*</sup></label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $datos['email'];?>" placeholder="ingrese su Correo">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono<sup>*</sup></label>
            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" value="<?php echo $datos['telefono'];?>"  placeholder="ingrese su Telefono">
        </div>
        <input type="submit" class="btn btn-success" value="editar Usuario">
    </form>
</div>