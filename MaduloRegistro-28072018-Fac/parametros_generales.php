<?php
  $page_title = 'Lista de parametros generales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $params_generales = all_parametros_generales();
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
           <a href="add_parametro_general.php" class="btn btn-primary">Agregar parametro general</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" style="width: 10%;">Codigo parametro general</th>
					<th class="text-center" style="width: 10%;"> Decripcion</th>					
					<th class="text-center" style="width: 10%;"> Accion </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($params_generales as $param_general):?>
				  <tr>				  								
					<td class="text-center"><?php echo remove_junk($param_general['id_param_generales']); ?></td>
					<td class="text-center"><?php echo remove_junk($param_general['descripcion']); ?></td>									
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_param_general.php?id=<?php echo (int)$param_general['id_param_generales'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_param_general.php?id=<?php echo (int)$param_general['id_param_generales'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
