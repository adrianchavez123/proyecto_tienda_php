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

create table productos
(
	id int not null auto_increment,
	codigo varchar(15) not null,
	nombre varchar(100) not null,
	existencia int not null,
	unidad_de_medida varchar(100) not null, 
	clasificacion varchar(100) not null,
	ubicacion varchar(200) not null,
	imagen varchar(200)not null,
	costo_compra double not null,
	porcentaje_ganancia double not null,
	precio_venta double not null,
	demanda_diaria int not null,
	tiempo_de_entrega varchar(30)not null,
	cantidad_productos_minimos int not null,
	punto_reorden varchar(50) not null,
	activo varchar(50) not null,
	unique key (codigo),
	primary key (id)
) engine= Innodb;

create table compras
(
	numero_orden int not null auto_increment,
	proveedor_id int not null,
	fecha_pedido date not null,
	foreign key (proveedor_id) references proveedores(id)
	on update cascade
	on delete restrict,
	primary key (numero_orden)

) engine = Innodb;


create table detalle_compra
(
	id int not null auto_increment,
	numero_orden int not null,
	producto_id int not null,
	foreign key (producto_id) references productos(id)
	on update cascade
	on delete restrict,
	primary key (id)

) engine = Innodb;


create table recepcion
(
	numero_recepcion int not null auto_increment,
	proveedor_id int not null,
	compra_id int not null,
	fecha_recepcion date not null,
	foreign key (proveedor_id) references proveedores(id)
	on delete restrict
	on update cascade,
	foreign key (compra_id) references proveedores(id)
	on delete restrict
	on update cascade,
	primary key (numero_recepcion)

)	engine = Innodb;

create table ventas
(
	numero_orden int not null,
	nombre_razon_social varchar(200) not null,
	fecha_pedido date not null,
	usuario_id int not null,
	rfc varchar(200) not null,
	foreign key (usuario_id) references usuarios(id)
	on update cascade
	on delete restrict,
	primary key (rfc)

) engine = Innodb;


create table detalle_venta
(
	id int not null auto_increment,
	numero_orden int not null,
	producto_id int not null,
	foreign key (producto_id) references productos(id)
	on update cascade
	on delete restrict,
	primary key (id)

) engine = Innodb;

insert into usuarios values(null,'admin','admin','admin','admin',md5('admin'));