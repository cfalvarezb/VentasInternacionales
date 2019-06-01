<?php
  $page_title = 'Agregar proveedor';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  
  $all_t_vinos    = find_all_t_vinos();
  $all_p_botellas = find_all_presentacion_prod();
?>
<?php
 if(isset($_POST['add_proveedor'])){
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
	
	  
     $query  = "CALL prc_insert_proveedores('{$name}', 
											 '{$pais}', 
											 '{$ciudad}', 
											 '{$cod_bar_producto}',
											 '{$cod_gobernacion}',
											 '{$id_tipo_vino}',
											 '{$nombre_producto}',
											 '{$id_presentacion_botella}',
											 '{$n_invima}',
											 '{$grados_alcohol}',
											 '{$vencimiento_invima}',
											  @msg)";

	 if($db->query($query)){
	   $session->msg('s',"Producto agregado exitosamente. ");
	   redirect('add_product.php', false);
	   
	 } else {
	   $session->msg('d',' Lo siento, registro falló.');
	   redirect('product.php', false);
	 }

    

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
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
            <span>Agregar proveedor</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_proveedor.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="prv-name" placeholder="Nombre del proveedor">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="prv-pais" placeholder="Pais">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="prv-ciudad" placeholder="Ciudad">
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="prv-cod-prod" placeholder="Codigo de barras del producto">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="prv-cod-gob" placeholder="Codigo de gobernacion">
                  </div>
                </div>
              </div>	
              <div class="form-group">
               <div class="row">
                 <div class="col-md-6">                 
                     <select class="form-control" name="prv-t-vino">
                      <option value="">Selecciona tipo de vino</option>
						<?php  foreach ($all_t_vinos as $vino): ?>
						  <option value="<?php echo (int)$vino['id_val_param'] ?>">
							<?php echo $vino['descripcion'] ?></option>
						<?php endforeach; ?>
                    </select>
                 </div>
                 <div class="col-md-6">					
					<input type="text" class="form-control" name="prv-nm-prod" placeholder="Nombre de producto">			  
                 </div>				                  
               </div>
              </div>
			  <div class="form-group">
				<div class="row">
					<div class="col-md-6">                                         
					   <select class="form-control" name="prv-presentacion">
						  <option value="">Selecciona presentacion de botella</option>
							<?php  foreach ($all_p_botellas as $p_botella): ?>
							  <option value="<?php echo (int)$p_botella['id_val_param'] ?>">
								<?php echo $p_botella['descripcion'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				
					<div class="col-md-6">                                         
					  <input type="text" class="form-control" name="prv-n-invima" placeholder="Numero invima">
					</div>
				</div>					
			  </div>
			  <div class="form-group">
               <div class="row">                 
                 <div class="col-md-6">					
					<input type="number" step="any" class="form-control" name="prv-g-alcohol" placeholder="Grados de alcohol">
                 </div>
				 <div class="col-md-6">                                         
					<div class="form-group"> <!-- Date input -->
						<input class="form-control" id="date" name="prv-f-ven" placeholder="Fecha de vencimiento invima" type="text"/>
					</div>	
                 </div>
               </div>
              </div>			 
              <button type="submit" name="add_proveedor" class="btn btn-danger">Agregar producto</button>
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
