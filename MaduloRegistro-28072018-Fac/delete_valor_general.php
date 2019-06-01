<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id_val_prm('valores_parametros_generales',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Valor eliminado");
      redirect('valores_generales.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('valores_generales.php');
  }
?>