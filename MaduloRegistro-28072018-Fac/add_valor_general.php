<?php
  $page_title = 'Agregar parametro';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $params_generales = all_parametros_generales();
?>
<?php
 if(isset($_POST['add_valor_general'])){
   $req_fields = array('vlr-codigo','vlr-descripcion','vlr-prm-gen' );
   validate_fields($req_fields);
   if(empty($errors)){
 	   

	 $id_vlrs_generales   = remove_junk($db->escape($_POST['vlr-codigo']));
	 $descripcion         = remove_junk($db->escape($_POST['vlr-descripcion']));
	 $id_param_generales  = remove_junk($db->escape($_POST['vlr-prm-gen'])); 
	 $vlrs_generales      = all_vlrs_generales(); 	 
	 
	 $paso = true;
	 foreach ($vlrs_generales as &$vlr_gen) {
		if($vlr_gen['id_val_param'] === $id_vlrs_generales){
			$paso = false;
			break;
		}
	 } 	 
	 if ($paso === true){
			 $query  = "insert into valores_parametros_generales (id_valores_generales,
																  id_val_param,
																  descripcion)
												   values ('{$id_param_generales}',		
														   '{$id_vlrs_generales }',
														   '{$descripcion}')";	
															
			if($db->query($query)){
			   $session->msg('s',"Parametro agregado exitosamente. ");
			   redirect('valores_generales.php', false);
			   
			 } else {
			   $session->msg('d',' Lo siento, registro falló.');
			   redirect('add_valor_general.php', false);
			 }
     }else{
		 $session->msg('d','Valor de parametro general ya existe.');
		  redirect('add_valor_general.php', false);
	 }	 

    

   } else{
     $session->msg("d", $errors);
     redirect('add_valor_general.php',false);
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
            <span>Agregar valor a parametro general</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_valor_general.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="number" class="form-control" name="vlr-codigo" placeholder="Codigo valor general">
               </div>
              </div>
			  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="vlr-descripcion" placeholder="Descripcion del valor">
               </div>
              </div>	
			  <div class="form-group">
                <div class="input-group">
					<select class="form-control" name="vlr-prm-gen">
                      <option value="">Seleccione parametro general</option>
						<?php  foreach ($params_generales as $prm_general): ?>
						  <option value="<?php echo (int)$prm_general['id_param_generales'] ?>">
							<?php echo $prm_general['descripcion'] ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
			  </div> 			
              <button type="submit" name="add_valor_general" class="btn btn-danger">Agregar parametro</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
