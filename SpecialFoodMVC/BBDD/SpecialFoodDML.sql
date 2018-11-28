insert into Localidad (Descripcion, CodigoPostal, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Morón', '1708', 0, now(), 1);
insert into Localidad (Descripcion, CodigoPostal, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Castelar', '1709', 0, now(), 1);
insert into Localidad (Descripcion, CodigoPostal, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Ituzaingó', '1710', 0, now(), 1);

insert into Barrio (Descripcion, IdLocalidad, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Morón Norte', 1, 0, now(), 1);
insert into Barrio (Descripcion, IdLocalidad, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Castelar Norte', 2, 0, now(), 1);
insert into Barrio (Descripcion, IdLocalidad, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Ituzaingó Sur', 3, 0, now(), 1);

insert into Calle (Descripcion, IdBarrio, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Coronel Machado', 1, 0, now(), 1);
insert into Calle (Descripcion, IdBarrio, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Almirante Brown', 1, 0, now(), 1);
insert into Calle (Descripcion, IdBarrio, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Mendoza', 1, 0, now(), 1);

insert into estadoaprobacionusuario (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Pendiente', 0, now(), 1);
insert into estadoaprobacionusuario (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Aprobado', 0, now(), 1);
insert into estadoaprobacionusuario (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Rechazado', 0, now(), 1);

insert into perfil (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Administrador', 0, now(), 1);
insert into perfil (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Comercio', 0, now(), 1);
insert into perfil (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Delivery', 0, now(), 1);
insert into perfil (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion) 
values ('Usuario', 0, now(), 1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("admin","admin",1,254,"admin@admin.com","7c4a8d09ca3762af61e59520943dc26494f8941b",'20-32548971-7',null,1,2,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Cliente","cliente",2,154,"cliente@cliente.com","7c4a8d09ca3762af61e59520943dc26494f8941b",'30-54879654-7',null,4,2,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Comercio","comercio",3,487,"comercio@comercio.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'20-354831245-5',2,2,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Repartidor","repartidor",2,784,"repartidor@repartidor.com","7c4a8d09ca3762af61e59520943dc26494f8941b",'30-7842315-7',null,3,2,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Tomas","Juarez",1,458,"tomas@tomas.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'20658491357',2,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Diego","Gonzalez",1,458,"diego@diego.com","7c4a8d09ca3762af61e59520943dc26494f8941b",'20-36985475-2',null,3,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Ignacio","Baldo",1,458,"ignacio@ignacio.com","7c4a8d09ca3762af61e59520943dc26494f8941b",'30-66541158-2',null,4,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc1","Baldo",1,458,"Mc1@Mc1.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);
INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc2","Baldo",1,458,"Mc2@Mc2.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);
INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc3","Baldo",1,458,"Mc3@Mc3.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);
INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc4","Baldo",1,458,"Mc4@Mc4.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);
INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc5","Baldo",1,458,"Mc5@Mc5.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);
INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Mc6","Baldo",1,458,"Mc6@Mc6.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,'30-66541158-2',2,1,0,now() ,1);

insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values ('Mc Donalds', '30-7842315-7', 0, now(), 1);
insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values('Burger King','30-7842315-7', 0, now(), 1);
insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values('Wendys','30-7842315-7', 0, now(), 1);

insert into MenuComercio (Descripcion, IdComercio, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Menu Mc', 1, 0, now(), 1);
insert into MenuComercio (Descripcion, IdComercio, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Menu Bk', 2, 0, now(), 1);
insert into MenuComercio (Descripcion, IdComercio, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Menu W', 3, 0, now(), 1);

insert into EstadoPedido (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Pendiente', 0, now(), 1);
insert into EstadoPedido (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Pagado', 0, now(), 1);
insert into EstadoPedido (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('En Transito', 0, now(), 1);
insert into EstadoPedido (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Entregado', 0, now(), 1);

INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pancho",10.0,"https://lamburger.com.ar/wp-content/uploads/2017/09/Super-pancho.jpg",1,0,now(),1);
INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Milanesas",10.0,"../../img/2.jpg",1,0,now(),1);
INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pizza",10.0,"https://placeralplato.com/files/2016/01/Pizza-con-pepperoni.jpg",1,0,now(),1);
INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Chisito",10.0,"../../img/1.jpg",1,0,now(),1);

INSERT INTO `specialfooddb`.`puntodeventa`
(`Numero`,`IdComercio`,`IdCalle`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(168,1,1,0,now(),1);
INSERT INTO `specialfooddb`.`puntodeventa`
(`Numero`,`IdComercio`,`IdCalle`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(458,2,2,0,now(),1);
INSERT INTO `specialfooddb`.`puntodeventa`
(`Numero`,`IdComercio`,`IdCalle`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(325,3,3,0,now(),1);
/*
set sql_safe_updates = 0
update pedido set iddelivery = null, idestadopedido = 2, tiempoestimadoentrega=null;
select * from pedido

select * from penalidadDelivery
*/
insert into pedido (fechapedido, costoentrega, tiempoestimadoentrega, iddelivery, idcliente, idpuntodeventa, idestadopedido, bajalogica, fechamodificacion, idusuariomodificacion)
values('2018-11-26 15:25:40', 60, 45, 6, 2, 2, 2, 0, now(), 1);
insert into pedido (fechapedido, costoentrega, tiempoestimadoentrega, iddelivery, idcliente, idpuntodeventa, idestadopedido, bajalogica, fechamodificacion, idusuariomodificacion)
values('2018-11-26 14:25:40', 65, 30, 4, 7, 1, 3, 0, now(), 1);
insert into pedido (fechapedido, costoentrega, tiempoestimadoentrega, iddelivery, idcliente, idpuntodeventa, idestadopedido, bajalogica, fechamodificacion, idusuariomodificacion)
values('2018-11-26 18:25:40', 65, 30, null, 7, 2, 4, 0, now(), 1);
insert into pedido (fechapedido, costoentrega, tiempoestimadoentrega, iddelivery, idcliente, idpuntodeventa, idestadopedido, bajalogica, fechamodificacion, idusuariomodificacion)
values('2018-11-26 20:28:40', 65, 30, null, 2, 1, 4, 0, now(), 1);

INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(1,3,0,now(),1);
INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(1,9,0,now(),1);
INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(1,10,0,now(),1);
INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(1,11,0,now(),1);
INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(2,5,0,now(),1);
INSERT INTO `specialfooddb`.`usuariocomercio`(`IdComercio`,`IdUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(3,5,0,now(),1);

insert into oferta (preciooferta, fechadesde, fechahasta, idmenucomercioitem, bajalogica, fechamodificacion, idusuariomodificacion)
values(45,'2018/11/20','2018/11/25',2,0,now(),1);
insert into oferta (preciooferta, fechadesde, fechahasta, idmenucomercioitem, bajalogica, fechamodificacion, idusuariomodificacion)
values(150,'2018/11/20','2018/11/25',3,0,now(),1);
insert into oferta (preciooferta, fechadesde, fechahasta, idmenucomercioitem, bajalogica, fechamodificacion, idusuariomodificacion)
values(32,'2018/11/20','2018/11/25',1,0,now(),1);