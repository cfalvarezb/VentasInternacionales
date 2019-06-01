<?php
  $page_title = 'Agregar Documento de transporte';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $all_presentaciones = find_all_presentacion_prod();
  $all_importadores = find_all_importadores();
  
  // nuevas variable
  $all_clientes  = find_all_clientes();
  $all_t_factura = find_all_t_factura();
  $all_t_carga   = find_all_t_carga();
  $all_products  = join_product_table();
?>

<?php

 if(isset($_POST['add_doc_transporte'])){
   //$req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price' );
   //validate_fields($req_fields);
   if(empty($errors)){
 	 session_start();
	 $doc_cliente = remove_junk($_SESSION['id_user']);
	 $doc_fecha_ingreso = remove_junk($db->escape($_POST['doc-fecha-ingreso']));
	 $doc_bl = remove_junk($db->escape($_POST['doc-bl']));
	 $doc_t_factura = remove_junk($db->escape($_POST['doc-t-factura']));
	 $doc_casa = remove_junk($db->escape($_POST['doc-casa']));
	 $doc_t_carga = remove_junk($db->escape($_POST['doc-t-carga']));
     $doc_cod_factura = remove_junk($db->escape($_POST['doc-cod-factura']));
	 $doc_product = remove_junk($db->escape($_POST['doc-product']));
	 $doc_cantidad = remove_junk($db->escape($_POST['doc-cantidad']));
	 $doc_cn_x_caja = remove_junk($db->escape($_POST['doc-cn-x-caja']));
	 $doc_botellas = remove_junk($db->escape($_POST['doc-botellas']));
	 $doc_invima = remove_junk($db->escape($_POST['doc-invima']));
	 $doc_rev_inv = remove_junk($db->escape($_POST['doc-rev-inv']));
	 $doc_gr_aut_alc = number_format($_POST['doc-gr-aut-alc'],2);
	 $doc_gr_aut_alcp = remove_junk($db->escape($_POST['doc-gr-aut-alcp']));
	 $doc_peso_caja = remove_junk($db->escape($_POST['doc-peso-caja']));
	 $doc_re_exp = remove_junk($db->escape($_POST['doc-re-exp']));
	 $doc_inv_fisico = remove_junk($db->escape($_POST['doc-inv-fisico']));
	 $num_doc_trnprte = remove_junk($db->escape($_POST['num-doc-trnprte']));
	

	 session_start(); 
	 echo $_SESSION['id_user'];
     $query  = "CALL PRC_INSERT_DOCS('{$doc_cliente      }',
									 '{$doc_fecha_ingreso}',
									 '{$doc_bl           }',
									 '{$doc_t_factura    }',
									 '{$doc_casa         }',
									 '{$doc_t_carga      }',
									 '{$doc_cod_factura  }',
									 '{$doc_product      }',
									 '{$doc_cantidad     }',
									 '{$doc_cn_x_caja    }',
									 '{$doc_botellas     }',
									 '{$doc_invima       }',
									 '{$doc_rev_inv      }',
									 '{$doc_gr_aut_alc   }',
									 '{$doc_gr_aut_alcp  }',
									 '{$doc_peso_caja    }',
									 '{$doc_re_exp       }',
									 '{$doc_inv_fisico   }',
									 '{$num_doc_trnprte  }')";
									 

	 if($db->query($query)){
	   $session->msg('s',"Documento agregado exitosamente. ");
	   redirect('add_doc_transporte.php', false);
	   
	 } else {
	   $session->msg('d',' Lo siento, registro falló.');
	   redirect('add_doc_transporte.php', false);
	 }

    

   } else{
     $session->msg("d", $errors);
     redirect('add_doc_transporte.php',false);
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
            <span>Agregar documento de transporte</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_doc_transporte.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                 <div class="col-md-6">                 
                     <select class="form-control" name="doc-cliente">
                      <option value="">Selecciona cliente</option>
						<?php  foreach ($all_clientes as $clientes): ?>
						  <option value="<?php echo (int)$clientes['id_cliente'] ?>">
							<?php echo $clientes['name'] ?></option>
						<?php endforeach; ?>
                     </select>
                 </div>              
				 <div class="col-md-6">
					<input class="form-control" id="date" name="doc-fecha-ingreso" placeholder="Fecha Ingreso" type="text"/>
				 </div>				 
			    </div>						
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">                                         
					  <input type="text" class="form-control" name="doc-bl" placeholder="BL">
					</div>
					<div class="col-md-6">
						<select class="form-control" name="doc-t-factura">
							<option value="">Selecciona tipo de factura</option>
							<?php  foreach ($all_t_factura as $t_factura): ?>
								<option value="<?php echo (int)$t_factura['id_val_param'] ?>">
								<?php echo $t_factura['d1'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>		
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="doc-casa" placeholder="Casa">
					</div>
					<div class="col-md-6">
						<select class="form-control" name="doc-t-carga">
							<option value="">Selecciona tipo de carga</option>
							<?php  foreach ($all_t_carga as $t_carga): ?>
								<option value="<?php echo (int)$t_carga['id_val_param'] ?>">
								<?php echo $t_carga['d1'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="doc-cod-factura" placeholder="Codigo de factura">
					</div>
					<div class="col-md-6">
						<select class="form-control" name="doc-product">
							<option value="">Selecciona producto</option>
							<?php  foreach ($all_products as $product): ?>
								<option value="<?php echo (int)$product['id_producto'] ?>">
								<?php echo $product['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="number" class="form-control" name="doc-cantidad" id="doc-cantidad" placeholder="Cantidad" oninput="calc_botella();">
					</div>
					<div class="col-md-6">
						<input type="number" class="form-control" name="doc-cn-x-caja" id="doc-cn-x-caja" placeholder="Cantidad por caja" oninput="calc_botella();" >
					</div>
				</div>
			 </div>	
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-botellas">Cantidad de botellas: </label>
						<input type="text" class="form-control" name="doc-botellas" id="doc-botellas" disabled >
					</div>
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-invima">&nbsp;</label>
						<input type="text" class="form-control" name="doc-invima" placeholder="Invima">
					</div>
				</div>
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-rev-inv">Paso revision invima?</label>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-rev-inv" value="1">Si
						  </label>
						</div>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-rev-inv" value="0" checked>No
						  </label>
						</div>	
					</div>
					<div class="col-md-6">
						<input type="number" step="any" class="form-control" name="doc-gr-aut-alc" placeholder="Grados autorizados de alcohol">
					</div>
				</div>
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-gr-aut-alcp">Paso grados autorizados de alcohol?</label>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-gr-aut-alcp" value="1">Si
						  </label>
						</div>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-gr-aut-alcp" value="0" checked>No
						  </label>
						</div>	
					</div>
					<div class="col-md-6">	
						<div class="input-group">	
							<span class="input-group-addon">Kg</span>	
							<input type="number" step="any" class="form-control" name="doc-peso-caja" id="doc-peso-caja" placeholder="Peso caja">
						</div>	
					</div>					
				</div>
			 </div>
			 <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-re-exp">Reexportación?</label>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-re-exp" value="1">Si
						  </label>
						</div>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-re-exp" value="0" checked>No
						  </label>
						</div>
					</div>
					<div class="col-md-6">
						<label class="custom-control-label" for="doc-inv-fisico">Invima fisico?</label>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-inv-fisico" value="1">Si
						  </label>
						</div>
						<div class="radio-inline">
						  <label>
							<input type="radio" name="doc-inv-fisico" value="0" checked>No
						  </label>
						</div>
					</div>
				</div>
			 </div>	
			  <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" name="num-doc-trnprte" placeholder="Numero de documento de transporte">
					</div>
					<div class="col-md-6">
						Espacio para el soporte
					</div>
				</div>
			  </div>			
             <button type="submit" name="add_doc_transporte" class="btn btn-danger">Agregar documento</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>

<script>
    $(document).ready(function(){
      var date_input3=$('input[name="doc-fecha-ingreso"]'); //our date input has the name "date"
      var container3=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options3={
        format: 'yyyy-mm-dd',
        container: container3,
        todayHighlight: true,
        autoclose: true,
      };
      date_input3.datepicker(options3);
    })
</script>