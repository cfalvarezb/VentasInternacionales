<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $docstransporte = join_product_doc_trs_prm();
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
           <a href="add_doc_transporte.php" class="btn btn-primary">Agregar documento</a>
         </div>
        </div>
        <div class="panel-body">
			<div style="overflow-x:auto;">
			  <table class="table table-bordered">
				<thead>
				  <tr>
					<th class="text-center" style="width: 50px;">#</th>
					<th class="text-center" style="width: 10%;"> Fecha de ingreso</th>
					<th class="text-center" style="width: 10%;"> BL </th>
					<th class="text-center" style="width: 10%;"> Casa </th>
					<th class="text-center" style="width: 10%;"> Tipo de carga </th>
					<th class="text-center" style="width: 10%;"> Tipo de factura </th>
					<th class="text-center" style="width: 10%;"> Codigo de factura </th>
					<th class="text-center" style="width: 10%;"> Producto </th>
					<th class="text-center" style="width: 10%;"> Cantidad </th>
					<th class="text-center" style="width: 10%;"> Cantidad_x_caja </th>
					<th class="text-center" style="width: 10%;"> Nro. Botellas </th>
					<th class="text-center" style="width: 10%;"> Invima </th>
					<th class="text-center" style="width: 10%;"> Paso registro invima? </th>
					<th class="text-center" style="width: 10%;"> Grados de alcohol autorizado </th>
					<th class="text-center" style="width: 10%;"> Paso grados alcohol autorizado? </th>
					<th class="text-center" style="width: 10%;"> Peso caja</th>
					<th class="text-center" style="width: 10%;"> Registro de exportacion </th>
					<th class="text-center" style="width: 10%;"> Tiene invima fisico? </th>
					<th class="text-center" style="width: 10%;"> Soporte </th>
					<th class="text-center" style="width: 10%;"> Numero de documento de transporte </th>
					<th class="text-center" style="width: 100px;"> Acciones </th>
				  </tr>
				</thead>
				<tbody>
				  <?php foreach ($docstransporte as $doctransporte):?>
				  <tr>
					<td class="text-center"><?php echo count_id();?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['fecha_ingreso']) ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['bl']) ?></td>					
					<td class="text-center"><?php echo remove_junk($doctransporte['casa']); ?></td>					
					<td class="text-center"><?php echo remove_junk($doctransporte['d2']); ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['d1']); ?></td>									
					<td class="text-center"><?php echo remove_junk($doctransporte['codigo_factura']); ?></td>			
					<td class="text-center"><?php echo remove_junk($doctransporte['name']); ?></td>			
					<td class="text-center"><?php echo remove_junk($doctransporte['cantidad']); ?></td>																		
					<td class="text-center"><?php echo remove_junk($doctransporte['cantidad_x_caja']); ?></td>					
					<td class="text-center"><?php echo remove_junk($doctransporte['botellas']); ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['invima']); ?></td>
					
					<?php if (remove_junk($product['paso_reg_invima']) === '1' ) : ?>
						<td class="text-center">Si</td>
					<?php else: ?>
						<td class="text-center">No</td>
					<?php endif; ?>	
															
					<td class="text-center"><?php echo remove_junk($doctransporte['grados_alcohol_aut']); ?></td>
					
					<?php if (remove_junk($product['paso_grados_alcohol_aut']) === '1' ) : ?>
						<td class="text-center">Si</td>
					<?php else: ?>
						<td class="text-center">No</td>
					<?php endif; ?>	
					
					<td class="text-center"><?php echo remove_junk($doctransporte['peso_caja']); ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['reg_exportacion']); ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['invima_fisico']); ?></td>
					<td class="text-center"><?php echo "Espacio para el soporte" ?></td>
					<td class="text-center"><?php echo remove_junk($doctransporte['num_doc_transporte']); ?></td>
					<td class="text-center">
					  <div class="btn-group">
						<a href="edit_doc_transporte.php?id=<?php echo (int)$doctransporte['id_doc_transporte'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
						  <span class="glyphicon glyphicon-edit"></span>
						</a>
						 <a href="delete_doc_transporte.php?id=<?php echo (int)$doctransporte['id_doc_transporte'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
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
