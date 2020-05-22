<div class="card card-body bg-light mt-5">
<a href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-outline-success"><i class="fa fa-backward"></i>Volver</a>
</div>
<div class="card card-body bg-light mt-5">
    <h2>Agregar Usuario</h2>
    <form action="<?php echo RUTA_URL; ?>/paginas/agregar" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre<sup>*</sup></label>
            <input type="nombre" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" placeholder="Digite su nombre">
        </div>  
        <div class="form-group">
            <label for="email">Email<sup>*</sup></label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite su email">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono<sup>*</sup></label>
            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" placeholder="Digite su telefono">
        </div>
        <input type="submit" class="btn btn-success" value="Agregar Usuario">
    </form>
</div>

