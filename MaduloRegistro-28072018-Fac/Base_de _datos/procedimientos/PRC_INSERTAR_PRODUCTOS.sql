drop procedure prc_insert_products;

create procedure  prc_insert_products (in p_name                    varchar(255),
                                       in p_categorie_id            int,
                                       in p_media_id                int,
                                       in p_date                    datetime,
                                       in p_id_presentacion_botella int,
                                       in p_reg_importacion         datetime,
                                       in p_sanitario               varchar(250),
                                       in p_frase_exc_alcohol       int,
                                       in p_importador              int,
                                       in p_g_alcohol               decimal(10,2),
                                       in p_reg_lote                varchar(255),
                                       in p_fecha_vencimiento       datetime,
                                       out resultado varchar(1))
begin
  
   DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET resultado='1';  
   select concat('ERROR AL INGRESAR LOS DATOS (',p_name,',
                                               ',p_categorie_id,',
                                               ',p_media_id,',
                                               ',p_categorie_id,',
                                               ',p_date,',
                                               ',p_id_presentacion_botella,',
                                               ',p_reg_importacion,',
                                               ',p_sanitario,',
                                               ',p_frase_exc_alcohol,',
                                               ',p_importador,',
                                               ',p_g_alcohol,',
                                               ',p_reg_lote,',
                                               ',p_fecha_vencimiento,'
                                               ) ') AS msg; 
                                        
   insert into usuarioVentas.products(name,
                                categorie_id,
                                media_id,
                                date,
                                id_presentacion_botella,
                                reg_importacion,
                                sanitario,
                                frase_exc_alcohol,
                                importador,
                                g_alcohol,
                                reg_lote,
                                fecha_vencimiento
                               )
                         values(p_name,
                                p_categorie_id,
                                p_media_id,
                                p_date,
                                p_id_presentacion_botella,
                                p_reg_importacion,
                                p_sanitario,
                                p_frase_exc_alcohol,
                                p_importador,
                                p_g_alcohol,
                                p_reg_lote,
                                p_fecha_vencimiento
                               );
  
  commit;
  select 
    max(id_producto) 
  into
    resultado
  from 
    usuarioVentas.products;
  
END;

 