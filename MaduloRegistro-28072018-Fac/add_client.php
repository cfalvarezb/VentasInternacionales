<?php
  $page_title = 'Agregar clientes';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
  $all_clientes = find_all_clientes();
?>
<?php
  if(isset($_POST['add_client'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
	   
       $name             = remove_junk($db->escape($_POST['name']));
       $nit              = remove_junk($db->escape($_POST['nit']));
       $direccion        = remove_junk($db->escape($_POST['direccion']));
       $telefono         = remove_junk($db->escape($_POST['telefono']));
	   $persona_contacto = remove_junk($db->escape($_POST['persona_contacto']));
	   $correo_1 = remove_junk($db->escape($_POST['correo_1']));
	   $correo_2 = remove_junk($db->escape($_POST['correo_2']));
	          
        $query = "INSERT INTO clientes (";
        $query .="name,nit,direccion,telefono,persona_contacto,correo_1,correo_2";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$nit}', '{$direccion}', '{$telefono}','{$persona_contacto}','{$correo_1}','{$correo_2}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Cliente ha sido creado");
          redirect('add_client.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
          redirect('add_client.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_client.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Agregar cliente</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_client.php">
            <div class="form-group">
				<div class="row">
                  <div class="col-md-6">
					<input type="text" class="form-control" name="name" placeholder="Nombre del cliente" required>
				  </div>
                  <div class="col-md-6">
					<input type="text" class="form-control" name="nit" placeholder="Nit">
				  </div>
				</div>  
            </div>

            <div class="form-group">
				<div class="row">
                  <div class="col-md-6">
					<input type="text" class="form-control" name ="direccion"  placeholder="Direccion">
				  </div>
                  <div class="col-md-6">
					<input type="text" class="form-control" name ="telefono"  placeholder="Telefono">
				  </div>
				</div>  
            </div>
			<div class="form-group">
				<div class="row">
                  <div class="col-md-6">
					<input type="text" class="form-control" name ="persona_contacto"  placeholder="Persona de contacto">				
				  </div>
				  <div class="col-md-6">
					<input type="text" class="form-control" name ="correo_1"  placeholder="Correo de contacto numero 1">				
				  </div>
				</div>                  
			</div>			
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name ="correo_2"  placeholder="Correo de contacto numero 2">				
					</div>
				</div>                
			</div>
            <div class="form-group clearfix">
              <button type="submit" name="add_client" class="btn btn-danger">Guardar</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
