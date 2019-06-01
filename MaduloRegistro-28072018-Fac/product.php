<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Agregar producto</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" style="width: 50px;">#</th>
					<th> Imagen</th>
					<th> Nombre Producto </th>
					<th class="text-center" style="width: 10%;"> Categoría </th>
					<th class="text-center" style="width: 10%;"> Tipo de presentecion </th>
					<th class="text-center" style="width: 10%;"> Registro de importacion </th>
					<th class="text-center" style="width: 10%;"> Registro sanitario </th>
					<th class="text-center" style="width: 10%;"> Registro lote </th>
					<th class="text-center" style="width: 10%;"> Frase Exceso de alcohol </th>
					<th class="text-center" style="width: 10%;"> Grados de alcohol </th>
					<th class="text-center" style="width: 10%;"> Fecha vencimiento </th>
					<th class="text-center" style="width: 10%;"> Importador </th>
					<th class="text-center" style="width: 100px;"> Acciones </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($products as $product):?>
				  <tr>
					<td class="text-center"><?php echo count_id();?></td>
					<td>
					  <?php if($product['media_id'] === '0'): ?>
						<img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
					  <?php else: ?>
					  <img class="img-avatar img-circle" src="uploads/products/<?php echo $product['file_name']; ?>" alt="">
					<?php endif; ?>
					</td>
					<td> <?php echo remove_junk($product['name']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['nm_categoria']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['nm_t_botella']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['reg_importacion']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['sanitario']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['reg_lote']); ?></td>
					
					<?php if (remove_junk($product['frase_exc_alcohol']) === '1' ) : ?>
						<td class="text-center">Si</td>
					<?php else: ?>
						<td class="text-center">No</td>
					<?php endif; ?>	
					
					<td class="text-center"> <?php echo remove_junk($product['g_alcohol']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['fecha_vencimiento']); ?></td>
					<td class="text-center"> <?php echo remove_junk($product['nm_cliente']); ?></td>
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_product.php?id=<?php echo (int)$product['id_producto'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_product.php?id=<?php echo (int)$product['id_producto'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-trash"></span>
						</a>
					  </div>
					</td>					
				  </tr>
				 <?php endforeach; ?>
				</tbody>
			  </table>
			</div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
