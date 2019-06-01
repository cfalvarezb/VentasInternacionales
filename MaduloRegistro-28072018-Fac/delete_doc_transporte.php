<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $doctransporte = find_by_id_id_doctrns('doc_transporte',(int)$_GET['id']);
  if(!$doctransporte){
    $session->msg("d","ID vacío");
    redirect('doc_transporte.php');
  }
?>
<?php
  $delete_id = delete_by_id_doc_transporte('doc_transporte',(int)$doctransporte['id_doc_transporte']);
  if($delete_id){
      $session->msg("s","Documento eliminado");
      redirect('doc_transporte.php');
  } else {
      $session->msg("d","Eliminación falló");
   /*   redirect('product.php'); */
  }
?>
