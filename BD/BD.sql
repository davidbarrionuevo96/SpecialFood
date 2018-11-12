drop Database if exists `SpecialFoodDB`;
create Database `SpecialFoodDB`;

Use `SpecialFoodDB`;

Create Table Parametro (
IdParametro integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
Valor varchar(100),
BajaLogica bit default(false),
FechaModificacion bit default(getdate()),
IdUsuarioModificacion integer not null
);

Create Table Funcionalidad(
IdFuncionalidad integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar(100));

Create Table Perfil(
IdPerfil integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100));

Create Table PerfilFuncionalidad(
IdPerfilFuncionalidad integer PRIMARY KEY AUTO_INCREMENT,
IdPerfil integer,
IdFuncionalidad integer,
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdFuncionalidad) references Funcionalidad (IdFuncionalidad));

Create Table Localidad(
IdLocalidad integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
CodigoPostal varchar(20));

Create Table Barrio(
IdBarrio integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
IdLocalidad integer,
FOREIGN KEY (IdLocalidad) references Localidad (IdLocalidad));

Create Table Calle(
IdCalle integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
IdBarrio integer,
FOREIGN KEY (IdBarrio) references Barrio (IdBarrio));

Create Table EstadoAprobacionUsuario(
IdEstadoAprobacionUsuario integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100));

Create Table Usuario(
IdUsuario integer PRIMARY KEY AUTO_INCREMENT,
Nombre varchar (50),
Apellido varchar (50),
DNI varchar(12),
Email varchar(100),
Username varchar(50),
Password varchar(50),
CUIL varchar(30),
IdPerfil integer,
IdCalle integer,
IdEstadoAprobacionUsuario integer,
FOREIGN KEY (IdCalle) references Calle (IdCalle),
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdEstadoAprobacionUsuario) references EstadoAprobacionUsuario (IdEstadoAprobacionUsuario));

Create Table HistorialActivacionDelivery(
IdHistorialActivacionDelivery integer PRIMARY KEY AUTO_INCREMENT,
IdDelivery integer,
FechaLogin datetime,
FechaLogout datetime,
FOREIGN KEY (IdDelivery) references Usuario(IdUsuario));

Create Table Comercio(
IdComercio integer PRIMARY KEY AUTO_INCREMENT ,
Nombre varchar (50),
CUIT varchar(30));

Create Table UsuarioComercio(
IdUsuarioComercio integer PRIMARY KEY AUTO_INCREMENT,
IdComercio integer,
IdUsuario integer,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdUsuario) references Usuario (IdUsuario));

Create Table MenuComercio(
IdMenuComercio integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar(100),
IdComercio integer,
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table MenuNegocioItem(
IdMenuNegocioItem integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (200),
Precio decimal(7,2),
Foto varchar (200),
IdMenuComercio integer,
FOREIGN KEY (IdMenuComercio) references MenuComercio (IdMenuComercio));

Create Table Oferta(
IdOferta integer PRIMARY KEY AUTO_INCREMENT,
PrecioOferta decimal(7,2),
FechaDesde datetime,
FechaHasta datetime,
IdMenuNegocioItem integer,
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem)); 

Create Table Categoria(
IdCategoria integer PRIMARY KEY AUTO_INCREMENT ,
Descripcion varchar (100));

Create Table CategoriaComercio(
IdCategoriaComercio integer PRIMARY KEY AUTO_INCREMENT,
IdCategoria integer,
IdComercio integer,
FOREIGN KEY (IdCategoria) references Categoria (IdCategoria),
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table PuntoDeVenta(
IdPuntoDeVenta integer PRIMARY KEY AUTO_INCREMENT,
Numero integer,
IdComercio integer,
IdCalle integer,
FOREIGN KEY (IdComercio) references Comercio (idComercio),
FOREIGN KEY (IdCalle) references Calle (IdCalle));

Create Table EstadoEntrega(
IdEstadoEntrega integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100));

Create Table Pedido(
IdPedido integer PRIMARY KEY AUTO_INCREMENT,
FechaPedido datetime,
CostoEntrega decimal(7,2),
TiempoEstimadoEntrega integer,
IdComercio integer,
IdCliente integer,
IdPuntoDeVenta integer,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdCliente) references Usuario (IdUsuario),
FOREIGN KEY (IdPuntoDeVenta) references PuntoDeVenta (IdPuntoDeVenta));

Create Table PedidoItem(
IdPedidoItem integer PRIMARY KEY AUTO_INCREMENT,
Cantidad integer,
PrecioUnitario decimal(7,2),
IdPedido integer,
IdMenuNegocioItem integer,
FOREIGN KEY (IdPedido) references Pedido (IdPedido),
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem));


Insert into comercio (idcomercio,Nombre, CUIT)
values("asdasdasda","3221231321");

Insert Into MenuComercio (Descripcion, IdComercio)
values("asd","1");
