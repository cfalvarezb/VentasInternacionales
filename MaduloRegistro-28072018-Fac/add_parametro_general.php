<?php
  $page_title = 'Agregar parametro';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
 
?>
<?php
 if(isset($_POST['add_parametro_general'])){
   //$req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   //validate_fields($req_fields);
   if(empty($errors)){
 	   

	 $id_param_generales = remove_junk($db->escape($_POST['prm-codigo']));
	 $descripcion        = remove_junk($db->escape($_POST['prm-descripcion']));
	 $params_generales   = all_parametros_generales(); 
	 
	 $paso = true;
	 foreach ($params_generales as &$prm_gen) {
		if($prm_gen['id_param_generales'] === $id_param_generales){
			$paso = false;
			break;
		}
	 } 
	 
	 if ($paso === true){
	 
		 $query  = "insert into parametros_generales (id_param_generales,
													  descripcion)
											   values ('{$id_param_generales}',
		
											   '{$descripcion}')";	
														
		if($db->query($query)){
		   $session->msg('s',"Parametro agregado exitosamente. ");
		   redirect('parametros_generales.php', false);
		   
		 } else {
		   $session->msg('d',' Lo siento, registro falló.');
		   redirect('add_parametro_general.php', false);
		 }
     }else{
		 $session->msg('d','Codigo parametro general ya existe.');
		  redirect('add_parametro_general.php', false);
	 }	 

    

   } else{
     $session->msg("d", $errors);
     redirect('add_parametro_general.php',false);
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
          <form method="post" action="add_parametro_general.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="number" class="form-control" name="prm-codigo" placeholder="Codigo parametro general">
               </div>
              </div>
			  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="prm-descripcion" placeholder="Descripcion del codigo">
               </div>
              </div>	
				 
              <button type="submit" name="add_parametro_general" class="btn btn-danger">Agregar parametro</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
