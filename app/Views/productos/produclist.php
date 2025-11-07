<?= $cabecera ?>


<br>
<h5 class="mb-2">Cómo usar este sistema de gestión de productos</h5>
 <ul class="">
    <li><strong>AGREGAR PRODUCTO:</strong> Pulse "Agregar producto" para abrir el formulario. Complete Nombre, Marca y Coste. Opcional: suba una imagen (se guarda en public/uploads). Luego pulse "Guardar".</li>
    <li><strong>EDITAR:</strong> El botón "EDITAR" abre el formulario con los datos actuales del producto para modificarlos. Aquí puede actualizar la imagen; si no sube una nueva imagen, la existente se mantiene.</li>
    <li><strong>BORRAR:</strong> El botón "BORRAR" elimina el registro del producto de la base de datos. 
    <br>
<a href="<?= base_url('crear') ?>" class="btn btn-success">Agregar producto</a>
        <table class="table table-striped table-custom mt-3">
            <thead class="thead-dark">
                <!-- estos son los campos de la tabla -->       
                <tr>
                    <th class="palabraclave">N</th>
                    <th class="palabraclave">Nombre</th>
                    <th class="palabraclave">Marca</th>
                    <th class="palabraclave">coste</th>
                    <th class="palabraclave">Imagen</th>
            </thead>
            <tbody>
                <!-- aqui se cargan los datos de la base de datos -->   
                <?php foreach($nojoda as $nojoda): ?>
                <tr>
                    <td><?=$nojoda['id'];?></td>
                    <td><?=$nojoda['nombre'];?></td>
                    <td><?=$nojoda['marca'];?></td>
                    <td class="muted"><?=$nojoda['coste'];?></td>
                    <td>
                       <img class="img-thumb" src="<?=base_url()?>../public/uploads/<?=$nojoda['imagen'];?>" width="100" height="100">
                    </td>
                    <td><?=$nojoda['imagen'];?></td>  
                       <td>
                        <a href="<?=base_url('editar/'.$nojoda['id']);?>" class="btn btn-info" type="button">EDITAR</a>
                        <a href="<?=base_url('borrar/'.$nojoda['id']);?>" class="btn btn-danger" type="button">BORRAR</a>
                       </td>     
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
<?= $pie ?>