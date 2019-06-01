<?php
  $page_title = 'Lista valores de parametros generales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $valrs_generales = all_vlrs_generales();
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
           <a href="add_valor_general.php" class="btn btn-primary">Agregar valor a parametro general</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
				    <th class="text-center" style="width: 10%;"> Codigo valor parametro</th>										
					<th class="text-center" style="width: 10%;">Valor parametro general</th>					
					<th class="text-center" style="width: 10%;">Parametro general</th>
					<th class="text-center" style="width: 10%;"> Accion </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($valrs_generales as $val_general):?>
				  <tr>
					<td class="text-center"><?php echo remove_junk($val_general['id_val_param']); ?></td>														
					<td class="text-center"><?php echo remove_junk($val_general['d2']); ?></td>				
					<td class="text-center"><?php echo remove_junk($val_general['d1']); ?></td>	
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_valor_general.php?id=<?php echo (int)$val_general['id_val_param'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_valor_general.php?id=<?php echo (int)$val_general['id_val_param'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
