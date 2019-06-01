<?php
  $page_title = 'Agregar valor a parametro general';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $vals_generales   = find_by_id_val_param('valores_parametros_generales',(int)$_GET['id']);
  $params_generales = all_parametros_generales();  
?>
<?php
 if(isset($_POST['edit_valor_general'])){
   //$req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   //validate_fields($req_fields);
   if(empty($errors)){
 	   

	 $id_val_param = remove_junk($db->escape($_POST['vlr-parametro']));
	 $descripcion        = remove_junk($db->escape($_POST['vlr-descripcion']));	 
	 $id_param_general   = remove_junk($db->escape($_POST['val-prm-gen']));
	 
	 $query  = "update valores_parametros_generales set id_valores_generales = '{$id_param_general}', descripcion = '{$descripcion}'
										   where id_val_param = '{$id_val_param}'";	
	 $result = $db->query($query);												
	if($result && $db->affected_rows() === 1){
	   $session->msg('s',"Valor actualizado exitosamente. ");
	   redirect('valores_generales.php', false);
	   
	 } else {
	   $session->msg('d',' Lo siento, actualizacion falló.');
	   redirect('edit_valor_general.php?id='.$id_param_generales, false);
	 }
    

    

   } else{
     $session->msg("d", $errors);
     redirect('edit_valor_general.php',false);
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
            <span>Agregar parametro</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="edit_valor_general.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="number" class="form-control" value="<?php echo remove_junk($vals_generales['id_val_param']); ?>" name="vlr-parametro" placeholder="Codigo valor general" readonly  >
               </div>
              </div>
			  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" value="<?php echo remove_junk($vals_generales['descripcion']); ?>" name="vlr-descripcion" placeholder="Descripcion del valor">
               </div>
              </div>	
			  <div class="form-group">
                <div class="input-group">
                   <select class="form-control" name="val-prm-gen">
                      <option value="">Selecciona parametro general</option>
						<?php  foreach ($params_generales as $param_general): ?>
						  <option value="<?php echo (int)$param_general['id_param_generales'] ?>" <?php if( $param_general['id_param_generales'] === $vals_generales['id_valores_generales']){echo "selected";} ?>>
							<?php echo $param_general['descripcion'] ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
              </div>
				
              <button type="submit" name="edit_valor_general" class="btn btn-danger">Actualiza parametro</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>