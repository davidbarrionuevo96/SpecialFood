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

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("admin","admin",1,1111111,"admin@admin.com","admin",2011115,null,1,1,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Cliente","cliente",1,1111111,"cliente@cliente.com","cliente",2011115,null,1,1,0,now(),1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Comercio","comercio",1,1111111,"comercion@comercio.com","comercio",null,2011115,3,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("Repartidor","repartidor",1,1111111,"repartidor@repartidor.com","repartidor",2011115,null,2,1,0,now() ,1);

INSERT INTO `specialfooddb`.`usuario`
(`Nombre`,`Apellido`,`IdCalle`,`Numero`,`Email`,`Password`,`CUIL`,`CUIT`,`IdPerfil`,`IdEstadoAprobacionUsuario`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES("repartidor2","repartidor",1,1111111,"repartidorNoAprobad@admin.com","repartidor",2011115,null,2,1,0,now() ,1);

insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values ('Comercio 1', '12123123122', 0, now(), 1);

insert into comercio (nombre, cuit, bajalogica, fechamodificacion, idusuariomodificacion)
values('Comercio 2', '34123456785', 0, now(), 1);

INSERT INTO MenuComercio (Descripcion, IdComercio, BajaLogica, FechaModificacion, IdUsuarioModificacion)
VALUES('Menu 1', 1, 0, now(), 1);

