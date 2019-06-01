

create procedure PRC_INSERT_DOCS(in P_ID_CLIENTE              int,
                                 in P_FECHA_INGRESO           DATETIME,
                                 in P_BL                      varchar(255),
                                 in P_ID_TIPO_FACTURA         int(10),
                                 in P_CASA                    varchar(255),
                                 in P_ID_TIPO_CARGA           int,
                                 in P_CODIGO_FACTURA          varchar(255),
                                 in P_ID_CODIGO_PRODUCTO      int,
                                 in P_CANTIDAD                int,
                                 in P_CANTIDAD_X_CAJA         int,
                                 in P_BOTELLAS                int,
                                 in P_INVIMA                  varchar(255),
                                 in P_PASO_REG_INVIMA         int,
                                 in P_GRADOS_ALCOHOL_AUT      int,
                                 in P_PASO_GRADOS_ALCOHOL_AUT int,
                                 in P_PESO_CAJA               decimal(25,2),
                                 in P_REG_EXPORTACION         int,
                                 in P_INVIMA_FISICO           int,
                                 in P_num_doc_transporte      varchar(255))
begin
  insert into usuarioventas.doc_transporte (id_cliente, 
                                                fecha_ingreso, 
                                                bl, 
                                                id_tipo_factura, 
                                                casa, 
                                                id_tipo_carga, 
                                                codigo_factura, 
                                                id_codigo_producto, 
                                                cantidad, 
                                                cantidad_x_caja, 
                                                botellas, 
                                                invima, 
                                                paso_reg_invima, 
                                                grados_alcohol_aut, 
                                                paso_grados_alcohol_aut, 
                                                PESO_CAJA, 
                                                reg_exportacion, 
                                                invima_fisico, 
                                                num_doc_transporte
                                                )
                                         values (P_ID_CLIENTE, 
                                                 P_FECHA_INGRESO, 
                                                 P_BL, 
                                                 P_ID_TIPO_FACTURA, 
                                                 P_CASA, 
                                                 P_ID_TIPO_CARGA, 
                                                 P_CODIGO_FACTURA, 
                                                 P_ID_CODIGO_PRODUCTO, 
                                                 P_CANTIDAD, 
                                                 P_CANTIDAD_X_CAJA, 
                                                 P_BOTELLAS, 
                                                 P_INVIMA, 
                                                 P_PASO_REG_INVIMA, 
                                                 P_GRADOS_ALCOHOL_AUT, 
                                                 P_PASO_GRADOS_ALCOHOL_AUT, 
                                                 P_PESO_CAJA, 
                                                 P_REG_EXPORTACION, 
                                                 P_INVIMA_FISICO, 
                                                 P_num_doc_transporte);
  commit;

  
END;
  
  