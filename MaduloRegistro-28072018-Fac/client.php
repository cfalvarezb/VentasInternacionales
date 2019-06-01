<?php
  $page_title = 'Lista de clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $clientes = find_all_clientes();
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
           <a href="add_client.php" class="btn btn-primary">Agregar cliente</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" style="width: 50px;">#</th>
					<th class="text-center" style="width: 10%;"> Nombre del cliente</th>
					<th class="text-center" style="width: 10%;"> Nit </th>
					<th class="text-center" style="width: 10%;"> Direccion </th>
					<th class="text-center" style="width: 10%;"> Telefono </th>
					<th class="text-center" style="width: 10%;"> Persona de contacto </th>
					<th class="text-center" style="width: 10%;"> Correo 1 </th>
					<th class="text-center" style="width: 10%;"> Correo 2 </th>
					<th class="text-center" style="width: 10%;"> Accion </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($clientes as $cliente):?>
				  <tr>
					<td class="text-center"><?php echo count_id();?></td>

					<td class="text-center"> <?php echo remove_junk($cliente['name']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['nit']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['direccion']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['telefono']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['persona_contacto']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['correo_1']); ?></td>
					<td class="text-center"> <?php echo remove_junk($cliente['correo_2']); ?></td>
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_product.php?id_cliente=<?php echo (int)$cliente['id_cliente'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_client.php?id_cliente=<?php echo (int)$cliente['id_cliente'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
