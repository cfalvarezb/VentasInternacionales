<?php
  $page_title = 'Lista de proveedores';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $proveedores = join_prov_vpg();
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
           <a href="add_proveedor.php" class="btn btn-primary">Agregar proveedor</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" style="width: 50px;">#</th>
					<th class="text-center" style="width: 10%;"> Nombre</th>
					<th class="text-center" style="width: 10%;"> Pais </th>
					<th class="text-center" style="width: 10%;"> Cidudad </th>
					<th class="text-center" style="width: 10%;"> Codigo de barras de producto </th>
					<th class="text-center" style="width: 10%;"> Codigo de gobernacion </th>
					<th class="text-center" style="width: 10%;"> Tipo de vino </th>
					<th class="text-center" style="width: 10%;"> Nombre de producto </th>
					<th class="text-center" style="width: 10%;"> Presentacion de la botella </th>
					<th class="text-center" style="width: 10%;"> Numero de invima </th>
					<th class="text-center" style="width: 10%;"> Grados de alcohol </th>
					<th class="text-center" style="width: 10%;"> Vencimiento de invima </th>					
					<th class="text-center" style="width: 10%;"> Accion </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($proveedores as $proveedor):?>
				  <tr>				  			
					<td class="text-center"><?php echo count_id();?></td>
					<td class="text-center"><?php echo remove_junk($proveedor['name']); ?></td>
					<td class="text-center"><?php echo remove_junk($proveedor['PAIS']); ?></td>					
					<td class="text-center"><?php echo remove_junk($proveedor['CIUDAD']); ?></td>					
					<td class="text-center"><?php echo remove_junk($proveedor['COD_BAR_PRODUCTO']); ?></td>
					<td class="text-center"><?php echo remove_junk($proveedor['COD_GOBERNACION']); ?></td>									
					<td class="text-center"><?php echo remove_junk($proveedor['ID_TIPO_VINO']); ?></td>			
					<td class="text-center"><?php echo remove_junk($proveedor['NOMBRE_PRODUCTO']); ?></td>			
					<td class="text-center"><?php echo remove_junk($proveedor['tipo_presentacion']); ?></td>																		
					<td class="text-center"><?php echo remove_junk($proveedor['N_INVIMA']); ?></td>					
					<td class="text-center"><?php echo remove_junk($proveedor['GRADOS_ALCOHOL']); ?></td>
					<td class="text-center"><?php echo remove_junk($proveedor['VENCIMIENTO_INVIMA']); ?></td>
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_proveedor.php?id=<?php echo (int)$proveedor['ID_PROVEEDOR'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_proveedor.php?id=<?php echo (int)$proveedor['ID_PROVEEDOR'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
