Create Database BD;
Use BD;

Create Table Parametro (
IdParametro tinyint,
Descripcion Varchar (100),
Valor tinyint);

Create Table Funcionalidad(
IdFuncionalidad tinyint,
Descripcion Varchar (100));

Create Table Perfil(
IdPerfil tinyint,
Descripcion Varchar (100));



Create Table Localidad(
IdLocalidad tinyint,
Descripcion Varchar (100),
CodigoPostal tinyint);

Create Table Barrio(
IdBarrio tinyint,
Descripcion Varchar (100),
IdLocalidad tinyint,
FOREIGN KEY (IdLocalidad) references Localidad (IdLocalidad));

Create Table Calle(
IdCalle tinyint,
Descripcion Varchar (100),
IdBarrio tinyint,
FOREIGN KEY (ID_Barrio) references Barrio (ID_Barrio));

Create Table EstadoAprobacionUsuario(
IdEstadoAprobacionUsuario tinyint,
Descripcion Varchar (100));

Create Table Usuario(
IdUsuario tinyint,
Nombre Varchar (50),
Apellido Varchar (50),
Numero tinyint,
Username Varchar(50),
Password Varchar(50),
CUIL tinyint,
CUIT tinyint,
IdCalle tinyint,
IdEstadoAprobacionUsuario tinyint,
FOREIGN KEY (IdCalle) references Calle (IdCalle),
FOREIGN KEY (IdEstadoAprobacionUsuario) references EstadoAprobacionUsuario (IdEstadoAprobacionUsuario));

Create Table UsuarioPerfil (
IdUsuarioPerfil tinyint,
IdPerfil tinyint,
IdUsuario tinyint,
FOREIGN KEY (IdPerfil) references Perfil (IdPerfil),
FOREIGN KEY (IdUsuario) references Usuario (IdUsuario));

Create Table HistorialActivacionDelivery(
IdHistorialActivacionDelivery tinyint,
FechaLogeoEnLinea datetime,
FechaLogeoUltimaVez datetime,
IdDelivery tinyint,
FOREIGN KEY (IdDelivery) references Usuario (IdUsuario));

Create Table EstadoAprobacionUsuario(
IdEstadoAprobacionUsuario tinyint,
Descripcion Varchar (100));

Create Table MenuNegocio(
IdMenuNegocio tinyint,
Descripcion Varchar(100),
IdComercio tinyint,
FOREIGN KEY (IdComercio) references Usuario (IdUsuario));

Create Table MenuNegocioItem(
IdMenuNegocioItem tinyint,
Descripcion Varchar (200),
Precio decimal(7,2),
PrecioOferta decimal(7,2),
Foto mediumblob,
IdMenu tinyint,
FOREIGN KEY (IdMenu) references MenuNegocio (IdMenu));

Create Table Categoria(
IdCategoria tinyint,
Descripcion Varchar (100));

Create Table CategoriaComercio(
IdCategoriaComercio tinyint,
IdCategoria tinyint,
IdComercio tinyint,
FOREIGN KEY (IdCategoria) references Categoria (IdCategoria),
FOREIGN KEY (IdComercio) references Usuario (IdUsuario));

Create Table Oferta (
IdOferta tinyint,
FechaInicio date,
FechaFinal date,
IdMenuNegocioItem tinyint,
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem));

Create Table EstadoEntrega(
IdEstadoEntrega tinyint,
Descripcion Varchar (100));

Create Table Pedido(
IdPedido tinyint,
FechaPedido datetime,
CostoEntrega decimal(7,2),
TiempoEstimadoEntrega time,
IdComercio tinyint,
IdCliente tinyint,
FOREIGN KEY (IdComercio) references Usuario (IdUsuario),
FOREIGN KEY (IdCliente) references Usuario (IdUsuario)
);

Create Table PedidoItem(
IdPedidoItem tinyint,
Precio decimal(7,2),
IdPedido tinyint,
IdMenuNegocioItem tinyint,
FOREIGN KEY (IdPedido) references Pedido (IdPedido),
FOREIGN KEY (IdMenuNegocioItem) references MenuNegocioItem (IdMenuNegocioItem)
);

Create Table Entrega(
IdEntrega tinyint,
FechaTomaPedido datetime,
FechaEntrega datetime,
IdRepartidor tinyint,
IdPedido tinyint,
IdEstadoEntrega tinyint,
FOREIGN KEY (IdRepartidor) references Usuario (IdUsuario),
FOREIGN KEY (IdPedido) references Pedido (IdPedido),
FOREIGN KEY (IdEstadoEntrega) references EstadoEntrega (IdEstadoEntrega));
