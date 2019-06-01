<?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $all_presentaciones = find_all_presentacion_prod();
  $all_importadores = find_all_importadores();
?>
<?php
 if(isset($_POST['add_product'])){
   //$req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   //validate_fields($req_fields);
   if(empty($errors)){
 	   
     $p_name         = remove_junk($db->escape($_POST['product-title']));
     $p_categorie_id = remove_junk($db->escape($_POST['product-categorie'])); 
	 $p_id_presentacion_botella = remove_junk($db->escape($_POST['product-presentacion'])); 
	 $p_reg_importacion = remove_junk($db->escape($_POST['product-reg-import']));
	 $p_sanitario = remove_junk($db->escape($_POST['product-rg-sanitario']));
	 $p_frase_exc_alcohol = remove_junk($db->escape($_POST['frc-exc-alc']));
	 $p_importador = remove_junk($db->escape($_POST['product-importador']));
	 
	 
	 $p_g_alcohol = number_format($_POST['product-g-alcohol'],2);
	 $p_reg_lote = remove_junk($db->escape($_POST['product-rg-lote']));
	 $p_fecha_vencimiento = remove_junk($db->escape($_POST['product-f-ven']));
     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }

     $date    = make_date();
	 
	       
     $query  = "CALL prc_insert_products('{$p_name}', 
									     '{$p_categorie_id}', 
									     '{$media_id}', 
									     '{$date}',
									     '{$p_id_presentacion_botella}',
									     '{$p_reg_importacion}',
									     '{$p_sanitario}',
									     '{$p_frase_exc_alcohol}',
									     '{$p_importador}',
									     '{$p_g_alcohol}',
									     '{$p_reg_lote}',
									     '{$p_fecha_vencimiento}',
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
            <span>Agregar producto</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Nombre del producto">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Selecciona una categoría</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control" name="product-photo">
                      <option value="">Selecciona una imagen</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-6">                 
                     <select class="form-control" name="product-presentacion">
                      <option value="">Selecciona una presentacion</option>
						<?php  foreach ($all_presentaciones as $presentaciones): ?>
						  <option value="<?php echo (int)$presentaciones['id_val_param'] ?>">
							<?php echo $presentaciones['descripcion'] ?></option>
						<?php endforeach; ?>
                    </select>
                 </div>
                 <div class="col-md-6">					
					<div class="form-group"> <!-- Date input -->
						<input class="form-control" id="date" name="product-reg-import" placeholder="Registro de importacion" type="text"/>
					</div>				  
                 </div>				                  
               </div>
              </div>
			  <div class="form-group">
				<div class="row">
					<div class="col-md-6">                                         
					  <input type="number" step="any" class="form-control" name="product-g-alcohol" placeholder="Grados de alcohol">
					</div>
				
					<div class="col-md-6">                                         
					  <input type="text" class="form-control" name="product-rg-lote" placeholder="Registro lote">
					</div>
				</div>					
			  </div>
			  <div class="form-group">
               <div class="row">                 
                 <div class="col-md-6">					
					<div class="form-group"> <!-- Date input -->
						<input class="form-control" id="date" name="product-f-ven" placeholder="Fecha de Vencimiento" type="text"/>
					</div>				  
                 </div>
				 <div class="col-md-6">                                         
					<input type="text" class="form-control" name="product-rg-sanitario" placeholder="Registro sanitario">
                 </div>
               </div>
              </div>
			  <div class="form-group">
               <div class="row"> 
				 <div class="col-md-6">
					<select class="form-control" name="product-importador">
                      <option value="">Selecciona Importador</option>
						<?php  foreach ($all_importadores as $importador): ?>
						  <option value="<?php echo (int)$importador['id_proveedor'] ?>">
							<?php echo $importador['name'] ?></option>
						<?php endforeach; ?>
                    </select>
				 </div>					 
                 <div class="col-md-6">															
						<label class="custom-control-label" for="frc-exc-alc">Frase exceso de alcohol?</label>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="frc-exc-alc" value="1">Si
						  </label>
						</div>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="frc-exc-alc" value="0" checked>No
						  </label>
						</div>						
				 </div>				 
			   </div>
			  </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="product-reg-import"]'); //our date input has the name "date"
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
<script>
    $(document).ready(function(){
      var date_input2=$('input[name="product-f-ven"]'); //our date input has the name "date"
      var container2=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options2={
        format: 'yyyy-mm-dd',
        container: container2,
        todayHighlight: true,
        autoclose: true,
      };
      date_input2.datepicker(options2);
    })
</script>