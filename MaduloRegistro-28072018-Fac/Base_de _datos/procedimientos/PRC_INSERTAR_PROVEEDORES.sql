drop procedure prc_insert_proveedores;

create procedure  prc_insert_proveedores (in p_name                    varchar(255),
                                          in p_pais                    varchar(255),
                                          in p_ciudad                  varchar(255),
                                          in p_cod_bar_producto        varchar(255),
                                          in p_cod_gobernacion         varchar(255),
                                          in p_id_tipo_vino            int(10),
                                          in p_nombre_producto         varchar(255),
                                          in p_id_presentacion_botella varchar(255),
                                          in p_n_invima                varchar(255),
                                          in p_grados_alcohol          decimal(25,2),
                                          in p_vencimiento_invima      datetime,
                                          out resultado varchar(1))
begin
  
   DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET resultado='1';  
   select concat('ERROR AL INGRESAR LOS DATOS (',p_name,',
                                               ',p_pais,',
                                               ',p_ciudad,',
                                               ',p_cod_bar_producto,',
                                               ',p_cod_gobernacion,',
                                               ',p_id_tipo_vino,',
                                               ',p_nombre_producto,',
                                               ',p_id_presentacion_botella,',
                                               ',p_n_invima,',
                                               ',p_grados_alcohol,',
                                               ',p_vencimiento_invima,'
                                               ) ') AS msg; 
                                        
   insert into usuarioVentas.proveedores(name,
                                         pais,
                                         ciudad,
                                         cod_bar_producto,
                                         cod_gobernacion,
                                         id_tipo_vino,
                                         nombre_producto,
                                         id_presentacion_botella,
                                         n_invima,
                                         grados_alcohol,
                                         vencimiento_invima
                               )
                         values(p_name,                   
                                p_pais,                   
                                p_ciudad,                 
                                p_cod_bar_producto,       
                                p_cod_gobernacion,        
                                p_id_tipo_vino,           
                                p_nombre_producto,        
                                p_id_presentacion_botella,
                                p_n_invima,               
                                p_grados_alcohol,         
                                p_vencimiento_invima     
                               );
  
  commit;
  
END;

 