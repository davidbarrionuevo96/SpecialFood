drop Database if exists `SpecialFoodDB`;
create Database `SpecialFoodDB`;

Use `SpecialFoodDB`;

Create Table Parametro (
IdParametro integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
Valor varchar(100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table Funcionalidad(
IdFuncionalidad integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar(100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table Perfil(
IdPerfil integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table PerfilFuncionalidad(
IdPerfilFuncionalidad integer PRIMARY KEY AUTO_INCREMENT,
IdPerfil integer,
IdFuncionalidad integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdFuncionalidad) references Funcionalidad (IdFuncionalidad));

Create Table Localidad(
IdLocalidad integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
CodigoPostal varchar(20),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table Barrio(
IdBarrio integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
IdLocalidad integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdLocalidad) references Localidad (IdLocalidad));

Create Table Calle(
IdCalle integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
IdBarrio integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdBarrio) references Barrio (IdBarrio));

Create Table EstadoAprobacionUsuario(
IdEstadoAprobacionUsuario integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table Usuario(
IdUsuario integer PRIMARY KEY AUTO_INCREMENT,
Nombre varchar (50),
Apellido varchar (50),
IdCalle integer,
Numero integer,
Email varchar(100),
Password varchar(50),
CUIL varchar(30),
CUIT varchar(30),
IdPerfil integer,
IdEstadoAprobacionUsuario integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdCalle) references Calle (IdCalle),
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdEstadoAprobacionUsuario) references EstadoAprobacionUsuario (IdEstadoAprobacionUsuario));

Create Table HistorialActivacionDelivery(
IdHistorialActivacionDelivery integer PRIMARY KEY AUTO_INCREMENT,
IdDelivery integer,
FechaLogin datetime,
FechaLogout datetime,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdDelivery) references Usuario(IdUsuario));

Create Table Comercio(
IdComercio integer PRIMARY KEY AUTO_INCREMENT ,
Nombre varchar (50),
CUIT varchar(30),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table UsuarioComercio(
IdUsuarioComercio integer PRIMARY KEY AUTO_INCREMENT,
IdComercio integer,
IdUsuario integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdUsuario) references Usuario (IdUsuario));

Create Table MenuComercio(
IdMenuComercio integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar(100),
IdComercio integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table MenuComercioItem(
IdMenuComercioItem integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (200),
Precio decimal(7,2),
Foto varchar (200),
IdMenuComercio integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdMenuComercio) references MenuComercio (IdMenuComercio));

Create Table Oferta(
IdOferta integer PRIMARY KEY AUTO_INCREMENT,
PrecioOferta decimal(7,2),
FechaDesde datetime,
FechaHasta datetime,
IdMenuComercioItem integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdMenuComercioItem) references MenuComercioItem (IdMenuComercioItem)); 

Create Table Categoria(
IdCategoria integer PRIMARY KEY AUTO_INCREMENT ,
Descripcion varchar (100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table CategoriaComercio(
IdCategoriaComercio integer PRIMARY KEY AUTO_INCREMENT,
IdCategoria integer,
IdComercio integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdCategoria) references Categoria (IdCategoria),
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table PuntoDeVenta(
IdPuntoDeVenta integer PRIMARY KEY AUTO_INCREMENT,
Numero integer,
IdComercio integer,
IdCalle integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdCalle) references Calle (IdCalle));

Create Table EstadoPedido(
IdEstadoEntrega integer PRIMARY KEY AUTO_INCREMENT,
Descripcion varchar (100),
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null);

Create Table Pedido(
IdPedido integer PRIMARY KEY AUTO_INCREMENT,
FechaPedido datetime,
CostoEntrega decimal(7,2),
TiempoEstimadoEntrega integer,
IdComercio integer,
IdCliente integer,
IdPuntoDeVenta integer,
IdEstadoPedido integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdCliente) references Usuario (IdUsuario),
FOREIGN KEY (IdPuntoDeVenta) references PuntoDeVenta (IdPuntoDeVenta),
FOREIGN KEY (IdEstadoPedido) references EstadoPedido (IdEstadoEntrega));

Create Table PedidoItem(
IdPedidoItem integer PRIMARY KEY AUTO_INCREMENT,
Cantidad integer,
PrecioUnitario decimal(7,2),
IdPedido integer,
IdMenuComercioItem integer,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdPedido) references Pedido (IdPedido),
FOREIGN KEY (IdMenuComercioItem) references MenuComercioItem (IdMenuComercioItem));

Create Table PenalidadDelivery(
IdPenalidadDelivery integer PRIMARY KEY AUTO_INCREMENT,
IdDelivery integer null,
IdPedido integer null,
MontoPenalidad decimal(7,2) not null,
TiempoExcedido varchar(5) not null,
BajaLogica bit not null default 0,
FechaModificacion datetime not null,
IdUsuarioModificacion integer not null,
FOREIGN KEY (IdDelivery) references Usuario (IdUsuario),
FOREIGN KEY (IdPedido) references Pedido (IdPedido));

