<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_producto
/*--------------------------------------------------------------*/
function find_by_id_id_producto($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_producto='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_producto
/*--------------------------------------------------------------*/
function find_by_id_id_parametro_gen($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_param_generales='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_val_param
/*--------------------------------------------------------------*/
function find_by_id_val_param($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_val_param='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_cliente
/*--------------------------------------------------------------*/
function find_by_id_id_cliente($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_cliente='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_doc_transporte
/*--------------------------------------------------------------*/
function find_by_id_id_doctrns($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_doc_transporte='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id_doc_transporte
/*--------------------------------------------------------------*/
function find_by_id_proveedores($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id_proveedor='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id_prm_gen($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_param_generales=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id_val_prm($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_val_param = ". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id product
/*--------------------------------------------------------------*/
function delete_by_id_producto($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_producto=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id product
/*--------------------------------------------------------------*/
function delete_by_id_proveedores($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_proveedor =". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id cliente
/*--------------------------------------------------------------*/
function delete_by_id_cliente($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_cliente=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id_doc_transporte
/*--------------------------------------------------------------*/
function delete_by_id_doc_transporte($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id_doc_transporte=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id_product($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id_producto) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

  
  function find_all_clientes(){
	 global $db;
      $results = array();
      $sql = "select  
				  cl.id_cliente,
				  cl.name,
				  cl.nit,
				  cl.direccion,
				  cl.telefono,
				  cl.persona_contacto,
				  cl.correo_1,
				  cl.correo_2
			  from
				  clientes cl";
      $result = find_by_sql($sql);
      return $result;		
	}
	
	function find_all_t_factura(){
	  global $db;
      $results = array();
      $sql = "select 
				vpg.descripcion d1,
				id_val_param
			  from
				parametros_generales pg
			  inner join
				valores_parametros_generales vpg
			  on
				vpg.id_valores_generales = pg.id_param_generales and
				pg.id_param_generales = 3";
      $result = find_by_sql($sql);
      return $result;
	}	
	
	function find_all_t_carga(){
	  global $db;
      $results = array();
      $sql = "select 
				vpg.descripcion d1,
				id_val_param
			  from
				parametros_generales pg
			  inner join
				valores_parametros_generales vpg
			  on
				vpg.id_valores_generales = pg.id_param_generales and
				pg.id_param_generales = 4";
      $result = find_by_sql($sql);
      return $result;
	}
	
  
 function updateLastLogIn($user_id)
	{
	global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  ="select
			  p.id_producto,
			  p.name,
			  p.categorie_id,
			  cat.name nm_categoria,
			  p.media_id,
			  m.file_name,
			  p.date,
			  p.id_presentacion_botella,
			  vpg.descripcion nm_t_botella,
			  p.reg_importacion,
			  p.sanitario,
			  p.frase_exc_alcohol,
			  p.importador,
			  cl.name nm_cliente,
			  p.g_alcohol,
			  p.reg_lote,
			  p.fecha_vencimiento
			 from
			  products p
			 left join
			  categories cat
			 on 
			  p.categorie_id = cat.id
			 left join
			  media m
			 on
			  p.media_id = m.id
			 left join
			  valores_parametros_generales vpg
			 on 
			  p.id_presentacion_botella = vpg.id_val_param and
			  vpg.id_valores_generales = 2
			 left join
			  clientes cl
			 on
			  p.importador = cl.id_cliente
			 order by
			  id_producto";

    return find_by_sql($sql);

   }
   
   
    /*--------------------------------------------------------------*/
   /* Function for Finding all document of transform 
   /* JOIN with domain tables --specify after
   /*--------------------------------------------------------------*/
  function join_product_doc_trs_prm(){
     global $db;
     $sql  ="select
			  dt.id_doc_transporte,
			  dt.fecha_ingreso,
			  dt.bl,
			  dt.id_tipo_factura,
			  vpg.descripcion d1, 
			  dt.casa,
			  dt.id_tipo_carga,
			  vpg2.descripcion d2,
			  dt.codigo_factura,
			  dt.id_codigo_producto,
			  p.name,
			  dt.cantidad,
			  dt.cantidad_x_caja,
			  dt.botellas,
			  dt.invima,
			  dt.paso_reg_invima,
			  dt.grados_alcohol_aut,
			  dt.paso_grados_alcohol_aut,
			  dt.peso_caja,
			  dt.reg_exportacion,
			  dt.invima_fisico,
			  dt.num_doc_transporte
			from 
			  doc_transporte dt
			inner join
			  valores_parametros_generales vpg
			on
			  dt.id_tipo_factura = vpg.id_val_param
			inner join
			  parametros_generales pg
			on
			  vpg.id_valores_generales = pg.id_param_generales and
			  pg.id_param_generales = 3
			inner join 
			  valores_parametros_generales vpg2
			on
			  dt.id_tipo_carga = vpg2.id_val_param
			inner join 
			  products p
			on
			  dt.id_codigo_producto = p.id_producto";

    return find_by_sql($sql);

   }
   
      /*--------------------------------------------------------------*/
   /* Function for Finding all providers of same table name
   /* 
   /*--------------------------------------------------------------*/
  function join_prov_vpg(){
     global $db;
     $sql  ="select  
			  prv.ID_PROVEEDOR,
			  prv.name,
			  prv.PAIS,
			  prv.CIUDAD,
			  prv.COD_BAR_PRODUCTO,
			  prv.COD_GOBERNACION,
			  PRV.ID_TIPO_VINO,
			  VPG.descripcion tipo_vino,
			  prv.NOMBRE_PRODUCTO,
			  PRV.ID_PRESENTACION_BOTELLA,
			  VPG2.descripcion tipo_presentacion,
			  prv.N_INVIMA,
			  prv.GRADOS_ALCOHOL,
			  prv.VENCIMIENTO_INVIMA
			from
			  PROVEEDORES PRV
			inner join
			  VALORES_PARAMETROS_GENERALES VPG
			on
			  PRV.ID_TIPO_VINO = VPG.ID_VAL_PARAM 
			inner join
			  VALORES_PARAMETROS_GENERALES VPG2
			on
			  prv.ID_PRESENTACION_BOTELLA = VPG2.ID_VAL_PARAM";

    return find_by_sql($sql);

   } 
   
      /*--------------------------------------------------------------*/
   /* Function for Finding all parametros generales of same table name
   /* 
   /*--------------------------------------------------------------*/
  function all_parametros_generales(){
     global $db;
     $sql  ="select  
			  pg.id_param_generales,
			  pg.descripcion
			from
			  parametros_generales pg";

    return find_by_sql($sql);

   } 
   
      /*--------------------------------------------------------------*/
   /* Function for Finding all parametros generales of same table name
   /* 
   /*--------------------------------------------------------------*/
  function all_vlrs_generales(){
     global $db;
     $sql  ="select  
				  pg.id_param_generales,
				  pg.descripcion d1,
			      vpg.id_val_param,
			      vpg.descripcion d2
			 from
				  parametros_generales pg
		     inner join
				  valores_parametros_generales vpg
			 on 
				   pg.id_param_generales = vpg.id_valores_generales
			 order by
				   vpg.id_val_param ";

    return find_by_sql($sql);

   } 
   
   
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
   /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id_producto,cl.name cliente,p.name,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " LEFT JOIN clientes cl ON p.importador = cl.id_cliente";
   $sql  .= " ORDER BY p.id_producto DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id_producto = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
 
 function find_all_presentacion_prod(){
   global $db;
   $sql  = "SELECT vpg.id_val_param,vpg.descripcion";
   $sql .= " FROM parametros_generales pg";
   $sql .= " INNER JOIN valores_parametros_generales vpg ON pg.id_param_generales = vpg.id_valores_generales and pg.id_param_generales = 2";
   $sql .= " ORDER BY vpg.id_valores_generales DESC";
   return find_by_sql($sql); 
 }
 
 function find_all_t_vinos(){
   global $db;
   $sql  = "SELECT vpg.id_val_param,vpg.descripcion";
   $sql .= " FROM parametros_generales pg";
   $sql .= " INNER JOIN valores_parametros_generales vpg ON pg.id_param_generales = vpg.id_valores_generales and pg.id_param_generales = 1";
   $sql .= " ORDER BY vpg.id_valores_generales DESC";
   return find_by_sql($sql); 
 }
 
 function find_all_importadores(){
   global $db;
   $sql  = "SELECT p.id_proveedor,
				   p.name,p.pais,
				   p.ciudad,
				   p.cod_bar_producto,
				   p.cod_gobernacion,
				   p.id_tipo_vino,
				   p.nombre_producto,
				   p.id_presentacion_botella,
				   p.n_invima,
				   p.grados_alcohol,
				   p.vencimiento_invima";
   $sql .= " FROM proveedores p";
   return find_by_sql($sql); 
 }
 
 
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

?>
