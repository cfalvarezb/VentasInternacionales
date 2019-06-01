<?php
  $page_title = 'Editar parametro general';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $params_generales   = find_by_id_id_parametro_gen('parametros_generales',(int)$_GET['id']);  
?>
<?php
 if(isset($_POST['edit_parametro_general'])){
   $req_fields = array('prm-codigo','prm-descripcion');
   validate_fields($req_fields);
   if(empty($errors)){
 	   

	 $id_param_generales = remove_junk($db->escape($_POST['prm-codigo']));
	 $descripcion        = remove_junk($db->escape($_POST['prm-descripcion']));	 
	 
	 $query  = "update parametros_generales set descripcion = '{$descripcion}'
										   where id_param_generales = '{$id_param_generales}'";	
	 $result = $db->query($query);												
	if($result && $db->affected_rows() === 1){
	   $session->msg('s',"Parametro agregado exitosamente. ");
	   redirect('parametros_generales.php', false);
	   
	 } else {
	   $session->msg('d',' Lo siento, actualizacion falló.');
	   redirect('edit_param_general.php?id='.$id_param_generales, false);
	 }
    

    

   } else{
     $session->msg("d", $errors);
     redirect('edit_parametro_general.php',false);
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
          <form method="post" action="edit_param_general.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" value="<?php echo remove_junk($params_generales['id_param_generales']); ?>" name="prm-codigo" placeholder="Codigo parametro general" readonly  >
               </div>
              </div>
			  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" value="<?php echo remove_junk($params_generales['descripcion']); ?>" name="prm-descripcion" placeholder="Descripcion del codigo">
               </div>
              </div>	
				 
              <button type="submit" name="edit_parametro_general" class="btn btn-danger">Actualiza parametro</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
