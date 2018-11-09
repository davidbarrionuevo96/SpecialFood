Drop Database if exists `pokemons-gonzalez-diego`;
Create Database `pokemons-gonzalez-diego`;

Use `pokemons-gonzalez-diego`;

Create Table Tipo(
Id Tinyint PRIMARY KEY AUTO_INCREMENT,
Descripcion Varchar (10),
Imagen Varchar(500));

Create Table Pokemon(
Id Tinyint PRIMARY KEY AUTO_INCREMENT,
Nombre Varchar (25),
Ataque Varchar (50),
Imagen Varchar(500),
IdTipo Tinyint,
FOREIGN KEY (IdTipo) references Tipo (Id));

Create Table Usuario(
IdUsuario Tinyint PRIMARY KEY AUTO_INCREMENT,
Usuario Varchar (50),
Clave Varchar (50));


Insert Into Tipo (Descripcion, Imagen)
Values 
("Fuego","https://images.vexels.com/media/users/3/137391/isolated/preview/5853be1fe267b18fa22abcf71ea40d5e-contorno-de-dibujos-animados-fuego-anaranjado-by-vexels.png"),
("Electrico","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRce6T0YjJL1TrOA5tAgT9O-lPITwKlObr3RwunE8Rp7I9AfKwI"),
("Planta"," https://vignette.wikia.nocookie.net/hydrangea/images/7/7a/Tipo_Planta.png/revision/latest?cb=20161218030458&path-prefix=es");

Insert Into Pokemon (Nombre, Ataque, Imagen, IdTipo)
Values  
("Charizard", "Fuego Fatuo", "https://vignette.wikia.nocookie.net/sonicpokemon/images/b/bf/Charizard_AG_anime.png", 1),
("Pikachu", "Impact Trueno", "https://www.geekno.com/wp-content/uploads/2016/08/pikachu.jpeg", 2),
("Bulbasaur", "Espesura", "https://www.geekno.com/wp-content/uploads/2016/08/bulbasaur.jpeg", 3);

Insert Into Usuario(Usuario, Clave)
Values("admin","admin1");
