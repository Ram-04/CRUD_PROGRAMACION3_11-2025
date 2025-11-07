<?= $cabecera ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar datos de un producto</h5>
            <p class="card-text">

<form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
<input class="form-control" type="hidden" name="id" value="<?=$libro['id']?>">
<input class="form-control" type="hidden" name="imagen" value="<?=$libro['imagen']?>">
        <div class="form-group">
            <!-- aqui se muestran los datos actuales del producto para editar -->
            <label for="nombre">Nombre</label>
            <input id="nombre" value="<?=$libro['nombre']?>" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input id="marca" value="<?=$libro['marca']?>" class="form-control" type="text" name="marca">
        </div>
        <div class="form-group">
            <label for="coste">Coste</label>
            <input id="coste" value="<?=$libro['coste']?>" class="form-control" type="text" name="coste">
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <br>
            <img class="img-thumb"  src="<?=base_url()?>../public/uploads/<?=$libro['imagen'];?>" width="100" height="100">
            <!-- NO FUNCIONA Y NO SE POR QUE -->
           <!-- <img class="img-thumbnail" value="<?=$libro['imagen']?>" src="<?=base_url()?>/uploads/"<?$libro['imagen'];?>-->
            </br>
            <input id="imagen" class="form-control-file" type="file" name="imagen">
        </div>
             <br>
             <!-- boton para guardar los cambios -->
        <button class="btn btn-success" type="submit">Guardar</button>
    </form>
            </p>
        </div>
    </div>
<?=$pie?>