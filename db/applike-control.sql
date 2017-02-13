create database applike_control;

use applike_control;

create table estado(
	codigo_estado int auto_increment not null,
	nombre varchar(60) not null,
	estatus int not null default 1,
	constraint pk_codigo_estado primary key (codigo_estado)
)engine = InnoDB;

create table municipio(
	codigo_municipio int auto_increment not null,
	nombre varchar(60) not null,
	codigo_estado int not null,
	estatus int not null default 1,
	constraint pk_codigo_municipio primary key (codigo_municipio),
	constraint fk_codigo_estado foreign key (codigo_estado) references estado (codigo_estado) on update cascade on delete restrict
)engine = InnoDB;

create table tipo_dispositivo(
	codigo_tipo_dispositivo int auto_increment not null,
	nombre varchar(60) not null,
	estatus int not null default 1,
	constraint pk_codigo_tipo_dispositivo primary key (codigo_tipo_dispositivo)
)engine = InnoDB;

create table persona(
	cedula varchar(20) not null,
	nacionaliad char(1) not null default "V",
	nombres varchar(60) not null,
	apellidos varchar(60) not null,
	sexo char(1) not null,
	codigo_municipio int not null,
	direccion_detalla varchar(255) not null,
	estatus int not null default 1,
	constraint pk_cedula primary key (cedula),
	constraint pk_codigo_municipio foreign key (codigo_municipio) references municipio (codigo_municipio) on update cascade on delete restrict
)engine = InnoDB;

create table cuenta(
	codigo_cuenta int auto_increment not null,
	cedula varchar(20) not null,
	correo_applike varchar(255) not null,
	correo_paypal varchar(255) not null,
	codigo_tipo_dispositivo int not null,
	nro_telefono varchar(11) null,
	estatus int not null default 1,
	constraint pk_codigo_cuenta primary key (codigo_cuenta),
	constraint fk_cedula foreign key (cedula) references persona (cedula) on update cascade on delete restrict,
	constraint fk_codigo_tipo_dispositivo foreign key (codigo_tipo_dispositivo) references tipo_dispositivo(codigo_tipo_dispositivo) on update cascade on delete restrict
)engine = InnoDB;

create table pago(
	codigo_pago int auto_increment not null,
	codigo_cuenta int not null,
	cant_dolares numeric not null,
	cant_bolivares numeric not null,
	cant_comision_plataforma numeric not null,
	fecha_desde date not null,
	fecha_hasta date not null,
	fecha_pago date not null,
	constraint pk_codigo_pago primary key (codigo_pago),
	constraint fk_codigo_cuenta foreign key (codigo_cuenta) references cuenta (codigo_cuenta) on update cascade on delete restrict
)engine = InnoDB;