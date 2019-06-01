<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $proveedor = find_by_id_proveedores('proveedores',(int)$_GET['id']);
  if(!$proveedor){
    $session->msg("d","ID vacío");
    redirect('proveedores.php');
  }
?>
<?php
  $delete_id = delete_by_id_proveedores('proveedores',(int)$proveedor['id_proveedor']);
  if($delete_id){
      $session->msg("s","Proveedor eliminado");
      redirect('proveedores.php');
  } else {
      $session->msg("d","Eliminación falló");
   /*   redirect('proveedores.php'); */
  }
?>
