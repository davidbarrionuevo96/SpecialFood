SELECT * FROM specialfooddb.MenuComercioItem;

INSERT INTO `specialfooddb`.`comercio`
(`Nombre`,`CUIT`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("comercio1",123131,0,now(),1);


INSERT INTO `specialfooddb`.`menucomercio`
(`Descripcion`,`IdComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Menu1",1,0,now(),1);

INSERT INTO `specialfooddb`.`menucomercio`
(`Descripcion`,`IdComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Menu1",1,0,now(),1);

INSERT INTO `specialfooddb`.`menucomercio`
(`Descripcion`,`IdComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Menu1",1,0,now(),1);


INSERT INTO `specialfooddb`.`MenuComercioItem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pancho",10.0,"https://lamburger.com.ar/wp-content/uploads/2017/09/Super-pancho.jpg",2,0,now(),1);


INSERT INTO `specialfooddb`.`MenuComercioItem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Milanesas",10.0,"https://images.clarin.com/2017/07/18/S1KW2joSW_1256x620.jpg",2,0,now(),1);

INSERT INTO `specialfooddb`.`MenuComercioItem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Pizza",10.0,"https://placeralplato.com/files/2016/01/Pizza-con-pepperoni.jpg",2,0,now(),1);

INSERT INTO `specialfooddb`.`MenuComercioItem`
(`Descripcion`,`Precio`,`Foto`,`IdMenuComercio`,`BajaLogica`,`FechaModificacion`,`IdUsuarioModificacion`)
VALUES
("Chisito",10.0,"http://wpc.72c72.betacdn.net/8072C72/lvi-images/sites/default/files/styles/landscape_1020_560/public/archivo/nota_periodistica/MAIZ.jpg",2,0,now(),1);