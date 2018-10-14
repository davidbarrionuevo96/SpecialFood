Create Database BD;
Use BD;

Create Table Parametro (
IdParametro tinyint PRIMARY KEY,
Descripcion Varchar (100),
Valor tinyint);

Create Table Funcionalidad(
IdFuncionalidad tinyint PRIMARY KEY,
Descripcion Varchar (100));

Create Table Perfil(
IdPerfil tinyint PRIMARY KEY,
Descripcion Varchar (100));

Create Table PerfilFuncionalidad(
IdPerfilFuncionalidad tinyint PRIMARY KEY,
IdPerfil tinyint,
IdFuncionalidad tinyint,
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdFuncionalidad) references Funcionalidad (IdFuncionalidad));

Create Table Localidad(
IdLocalidad tinyint PRIMARY KEY,
Descripcion Varchar (100),
CodigoPostal tinyint);

Create Table Barrio(
IdBarrio tinyint PRIMARY KEY,
Descripcion Varchar (100),
IdLocalidad tinyint,
FOREIGN KEY (IdLocalidad) references Localidad (IdLocalidad));

Create Table Calle(
IdCalle tinyint PRIMARY KEY,
Descripcion Varchar (100),
IdBarrio tinyint,
FOREIGN KEY (IdBarrio) references Barrio (IdBarrio));

Create Table EstadoAprobacionUsuario(
IdEstadoAprobacionUsuario tinyint PRIMARY KEY,
Descripcion Varchar (100));

Create Table Usuario(
IdUsuario tinyint PRIMARY KEY,
Nombre Varchar (50),
Apellido Varchar (50),
Numero tinyint,
Username Varchar(50),
Password Varchar(50),
CUIL tinyint,
IdPerfil tinyint,
IdCalle tinyint,
IdEstadoAprobacionUsuario tinyint,
FOREIGN KEY (IdCalle) references Calle (IdCalle),
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdEstadoAprobacionUsuario) references EstadoAprobacionUsuario (IdEstadoAprobacionUsuario));

Create Table HistorialActivacionDelivery(
IdHistorialActivacionDelivery tinyint PRIMARY KEY,
FechaLogin datetime,
FechaLogout datetime);

Create Table Comercio(
IdComercio tinyint PRIMARY KEY,
Nombre Varchar (50),
CUIT tinyint);

Create Table UsuarioComercio(
IdUsuarioComercio tinyint PRIMARY KEY,
IdComercio tinyint,
IdUsuario tinyint,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdUsuario) references Usuario (IdUsuario));

Create Table MenuComercio(
IdMenuComercio tinyint PRIMARY KEY,
Descripcion Varchar(100),
IdComercio tinyint,
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table MenuNegocioItem(
IdMenuNegocioItem tinyint PRIMARY KEY,
Descripcion Varchar (200),
Precio decimal(7,2),
Foto Varchar (200),
IdMenuComercio tinyint,
FOREIGN KEY (IdMenuComercio) references MenuComercio (IdMenuComercio));

Create Table Oferta(
IdOferta tinyint PRIMARY KEY,
PrecioOferta decimal(7,2),
FechaDesde datetime,
FechaHasta datetime,
IdMenuNegocioItem tinyint,
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem)); 

Create Table Categoria(
IdCategoria tinyint PRIMARY KEY,
Descripcion Varchar (100));

Create Table CategoriaComercio(
IdCategoriaComercio tinyint,
IdCategoria tinyint,
IdComercio tinyint,
FOREIGN KEY (IdCategoria) references Categoria (IdCategoria),
FOREIGN KEY (IdComercio) references Comercio (IdComercio));

Create Table PuntoDeVenta(
IdPuntoDeVenta tinyint PRIMARY KEY,
Numero tinyint,
idComercio tinyint,
IdCalle tinyint,
FOREIGN KEY (idComercio) references Comercio (idComercio),
FOREIGN KEY (IdCalle) references Calle (IdCalle));

Create Table EstadoEntrega(
IdEstadoEntrega tinyint PRIMARY KEY,
Descripcion Varchar (100));

Create Table Pedido(
IdPedido tinyint PRIMARY KEY,
FechaPedido datetime,
CostoEntrega decimal(7,2),
TiempoEstimadoEntrega time,
IdComercio tinyint,
IdCliente tinyint,
IdPuntoDeVenta tinyint,
FOREIGN KEY (IdComercio) references Comercio (IdComercio),
FOREIGN KEY (IdCliente) references Usuario (IdUsuario),
FOREIGN KEY (IdPuntoDeVenta) references PuntoDeVenta (IdPuntoDeVenta));

Create Table PedidoItem(
IdPedidoItem tinyint PRIMARY KEY,
Cantidad tinyint,
PrecioUnitario decimal(7,2),
IdPedido tinyint,
IdMenuNegocioItem tinyint,
FOREIGN KEY (IdPedido) references Pedido (IdPedido),
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem));

