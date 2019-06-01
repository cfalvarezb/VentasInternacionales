<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $client = find_by_id_id_cliente('clientes',(int)$_GET['id_cliente']);
  if(!$client){
    $session->msg("d","ID vacío");
    redirect('client.php');
  }
?>
<?php
  $delete_id = delete_by_id_cliente('clientes',(int)$client['id_cliente']);
  if($delete_id){
      $session->msg("s","Producto eliminado");
      redirect('client.php');
  } else {
      $session->msg("d","Eliminación falló");
   /*   redirect('product.php'); */
  }
?>