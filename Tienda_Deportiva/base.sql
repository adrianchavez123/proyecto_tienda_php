create table proveedores
(
	id int not null auto_increment,
	nombre_razon_social varchar(200) not null,
	rfc varchar(200) not null,
	domicilio varchar(200) not null,
	ciudad varchar(200) not null,
	activo varchar(50) not null,
	unique key (rfc),
	primary key (id)

)	engine = Innodb;

create table usuarios
(
	id int not null auto_increment,
	nombre  varchar(200) not null,
	tipo_usuario varchar(50) not null,
	correo varchar(200) not null,
	usuario varchar(50) not null,
	pass varchar(200) not null,
	unique key (usuario),
	primary key (id)
)	engine= Innodb;