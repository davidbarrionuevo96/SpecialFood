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
VALUES("admin","admin",1,1111111,"admin@admin.com","7c4a8d09ca3762af61e59520943dc26494f8941b",2011115,null,1,1,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Cliente","cliente",1,1111111,"cliente@cliente.com","7c4a8d09ca3762af61e59520943dc26494f8941b",2011115,null,4,2,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Comercio","comercio",1,1111111,"comercion@comercio.com","7c4a8d09ca3762af61e59520943dc26494f8941b",null,2011115,3,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Repartidor","repartidor",1,1111111,"repartidor@repartidor.com","7c4a8d09ca3762af61e59520943dc26494f8941b",2011115,null,2,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("repartidor2","repartidor",1,1111111,"repartidorNoAprobad@admin.com","7c4a8d09ca3762af61e59520943dc26494f8941b",2011115,null,2,1,0,now() ,1);

insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values ('Comercio 1', '12123123122', 0, now(), 1);

insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values('Comercio 2', '34123456785', 0, now(), 1);

insert into MenuComercio (Descripcion, IdComercio, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Menu 1', 1, 0, now(), 1);

insert into EstadoEntrega (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Pendiente', 0, now(), 1);

insert into EstadoEntrega (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('En Transito', 0, now(), 1);

insert into EstadoEntrega (Descripcion, BajaLogica, FechaModificacion, IdUsuarioModificacion)
values('Entregado', 0, now(), 1);

INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pancho",10.0,"https://lamburger.com.ar/wp-content/uploads/2017/09/Super-pancho.jpg",1,0,now(),1);

INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Milanesas",10.0,"https://images.clarin.com/2017/07/18/S1KW2joSW_1256x620.jpg",1,0,now(),1);

INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pizza",10.0,"https://placeralplato.com/files/2016/01/Pizza-con-pepperoni.jpg",1,0,now(),1);

INSERT INTO `specialfooddb`.`menucomercioitem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Chisito",10.0,"http://wpc.72c72.betacdn.net/8072C72/lvi-images/sites/default/files/styles/landscape_1020_560/public/archivo/nota_periodistica/MAIZ.jpg",1,0,now(),1);

INSERT INTO `specialfooddb`.`puntodeventa`
(`Numero`,`IdComercio`,`IdCalle`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES(1,1,1,0,now(),1);





