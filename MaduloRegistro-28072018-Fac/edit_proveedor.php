<?php
  $page_title = 'Editar proveedor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  $all_t_vinos    = find_all_t_vinos();
  $all_p_botellas = find_all_presentacion_prod();
  $proveedor      = find_by_id_proveedores('proveedores',(int)$_GET['id']);
?>
<?php
 if(isset($_POST['edit_proveedor'])){
   //$req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   //validate_fields($req_fields);
   if(empty($errors)){
 	   
	   
	 $name                    = remove_junk($db->escape($_POST['prv-name']));
	 $pais					  =	remove_junk($db->escape($_POST['prv-pais']));
	 $ciudad 				  =	remove_junk($db->escape($_POST['prv-ciudad']));
	 $cod_bar_producto		  =	remove_junk($db->escape($_POST['prv-cod-prod']));
	 $cod_gobernacion         = remove_junk($db->escape($_POST['prv-cod-gob']));
	 $id_tipo_vino            = remove_junk($db->escape($_POST['prv-t-vino']));
  	 $nombre_producto         = remove_junk($db->escape($_POST['prv-nm-prod']));
 	 $id_presentacion_botella = remove_junk($db->escape($_POST['prv-presentacion']));
 	 $n_invima				  =	remove_junk($db->escape($_POST['prv-n-invima']));
 	 $grados_alcohol		  =	number_format($_POST['prv-g-alcohol'],2);
 	 $vencimiento_invima	  =	remove_junk($db->escape($_POST['prv-f-ven']));	   	 
	
	  
     $query   = "UPDATE proveedores SET";
     $query  .=" name ='{$name}', pais ='{$pais}', ciudad ='{$ciudad}', cod_bar_producto = '{$cod_bar_producto}', cod_gobernacion = '{$cod_gobernacion}', id_tipo_vino = '{$id_tipo_vino}', nombre_producto = '{$nombre_producto}', ";
     $query  .=" id_presentacion_botella ='{$id_presentacion_botella}', n_invima ='{$n_invima}', grados_alcohol ='{$grados_alcohol}',vencimiento_invima='{$vencimiento_invima}'";
     $query  .=" WHERE id_proveedor ='{$proveedor['id_proveedor']}'";
     $result = $db->query($query);
     if($result && $db->affected_rows() === 1){
	   $session->msg('s',"Proveedor ha sido actualizado. ");
	   redirect('proveedores.php', false);
     } else {
	   $session->msg('d',' Lo siento, actualización falló.');
	   redirect('edit_proveedor.php?id='.$proveedor['id_proveedor'], false);
     }

    

   } else{
     $session->msg("d", $errors);
     redirect('edit_proveedor.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar proveedor</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="edit_proveedor.php?id=<?php echo (int)$proveedor['id_proveedor'] ?>" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['name']); ?>" name="prv-name" placeholder="Nombre del proveedor">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['pais']); ?>" name="prv-pais" placeholder="Pais">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['ciudad']); ?>" name="prv-ciudad" placeholder="Ciudad">
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['cod_bar_producto']); ?>" name="prv-cod-prod" placeholder="Codigo de barras del producto">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['cod_gobernacion']); ?>" name="prv-cod-gob" placeholder="Codigo de gobernacion">
                  </div>
                </div>
              </div>	
              <div class="form-group">
               <div class="row">
                 <div class="col-md-6">                 
                     <select class="form-control" name="prv-t-vino">
                      <option value="">Selecciona tipo de vino</option>
						<?php  foreach ($all_t_vinos as $vino): ?>
						  <option value="<?php echo (int)$vino['id_val_param'] ?>" <?php if( $vino['id_val_param'] === $proveedor['id_tipo_vino']){echo "selected";} ?>>
							<?php echo $vino['descripcion'] ?></option>
						<?php endforeach; ?>
                    </select>
                 </div>
                 <div class="col-md-6">					
					<input type="text" class="form-control" name="prv-nm-prod" value="<?php echo remove_junk($proveedor['nombre_producto']); ?>" placeholder="Nombre de producto">			  
                 </div>				                  
               </div>
              </div>
			  <div class="form-group">
				<div class="row">
					<div class="col-md-6">                                         
					   <select class="form-control" name="prv-presentacion">
						  <option value="">Selecciona presentacion de botella</option>
							<?php  foreach ($all_p_botellas as $p_botella): ?>
							  <option value="<?php echo (int)$p_botella['id_val_param'] ?>" <?php if( $p_botella['id_val_param'] === $proveedor['id_presentacion_botella']){echo "selected";} ?>>
								<?php echo $p_botella['descripcion'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				
					<div class="col-md-6">                                         
					  <input type="text" class="form-control" value="<?php echo remove_junk($proveedor['n_invima']); ?>" name="prv-n-invima" placeholder="Numero invima">
					</div>
				</div>					
			  </div>
			  <div class="form-group">
               <div class="row">                 
                 <div class="col-md-6">					
					<input type="number" step="any" class="form-control" value="<?php echo remove_junk($proveedor['grados_alcohol']); ?>" name="prv-g-alcohol" placeholder="Grados de alcohol">
                 </div>
				 <div class="col-md-6">                                         
					<div class="form-group"> <!-- Date input -->
						<input class="form-control" id="date" name="prv-f-ven" value="<?php echo remove_junk($proveedor['vencimiento_invima']); ?>" placeholder="Fecha de vencimiento invima" type="text"/>
					</div>	
                 </div>
               </div>
              </div>			 
              <button type="submit" name="edit_proveedor" class="btn btn-danger">Editar proveedor</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="prv-f-ven"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
