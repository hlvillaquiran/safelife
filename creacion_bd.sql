create database safe_life;
use safe_life;

create table if not exists safe_usuarios(
	cod_usuario 			int primary key auto_increment not null,
    correo_electronico 		varchar(150) not null unique,
    contrasena				varchar(150) not null,
    nombre					varchar(200) not null,
    apellido				varchar(200) not null,
    ciudad					varchar(200) not null,
    celular					varchar(200) not null,
    validado				char,
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    tipo_usuario			char not null comment 'A ADMINISTRADOR / U USUARIO / M MONITOREO'
);

create table if not exists  safe_comunidad(
	cod_comunidad			int primary key auto_increment not null,
    nombre_comunidad		varchar(200) not null,
    ciudad_comunidad		varchar(200) not null,
    parroquia_comunidad		varchar(200) not null,
    estado					char not null comment 'A ACTIVO / I INACTIVO'
);

create table if not exists  safe_comunidad_usuario(
	cod_usuario				int not null,
    cod_comunidad			int not null,
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_usuario) references safe_usuarios(cod_usuario),
    foreign key(cod_comunidad) references safe_comunidad(cod_comunidad)
);

create table safe_denuncias(
	cod_denuncia 			int primary key auto_increment not null,
    cod_usuario				int not null,
    tipo_denuncia			varchar(200) not null,
    fecha_denuncia			date not null,
    sub_denuncia			varchar(200),
    documento				varchar(200),
    nombre					varchar(200),
    ciudad					varchar(200),
    direccion				varchar(200),
    url_imagen				varchar(200),
    descripcion				varchar(300),
    edad					int,
    vestimenta				varchar(200),
    lugar_contacto			varchar(200),
    fecha_hora_contacto		datetime,
    estado					char,
    
    foreign key(cod_usuario) references safe_usuarios(cod_usuario)
);

create table if not exists  safe_tipo_boton(
	cod_tipo_boton 			int primary key auto_increment not null,
    boton					varchar(200) not null
);

create table if not exists  safe_boton_panico(
	cod_boton 				int primary key auto_increment not null,
    cod_usuario				int not null,
    cod_tipo_boton			int not null,
    fecha_boton				date,
    lat						decimal,
    lon						decimal,
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_usuario) references safe_usuarios(cod_usuario),
    foreign key(cod_tipo_boton) references safe_tipo_boton(cod_tipo_boton)
);

create table if not exists  safe_atencion_denuncias(
	cod_atencion			int primary key auto_increment not null,
    cod_denuncia			int not null,
    fecha					date not null,
    estado_denuncia			char not null,
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_denuncia) references safe_denuncias(cod_denuncia)
);

create table if not exists  safe_seguimiento_denuncia(
	cod_seguimiento 		int primary key auto_increment not null,
    cod_atencion			int not null,
    cod_denuncia			int not null,
    encargado				varchar(200) not null,
    detalle					varchar(300) not null,
    fecha_proxima_accion	date,
    url_imagen				varchar(200),
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_atencion) references safe_atencion_denuncias(cod_atencion),
    foreign key(cod_denuncia) references safe_denuncias(cod_denuncia)
);

create table if not exists  safe_atencion_botones(
	cod_atencion			int primary key auto_increment not null,
    cod_boton				int not null,
    tipo_unidad				varchar(200) not null,
    unidad_asignada			varchar(200) not null,
    detalle					varchar(300) not null,
    estado_boton			char,
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_boton) references safe_boton_panico(cod_boton)
);

/****** TABLAS DE FUNCIONAMIENTO SISTEMA ******/
create table if not exists safe_menu(
	cod_menu				int primary key auto_increment not null,
    icono					varchar(100),
	nombre					varchar(150) not null,
    estado					char not null comment 'A ACTIVO / I INACTIVO'
);

create table if not exists safe_paginas(
	cod_pagina				int primary key auto_increment not null,
    cod_menu				int	not null,
    titulo					varchar(200),
    subtitulo				varchar(200),
    contenido				varchar(1000),
    raiz					varchar(100),
    destino					varchar(100),
    estado					char not null comment 'A ACTIVO / I INACTIVO',
    
    foreign key(cod_menu) references safe_menu(cod_menu)
);

create table if not exists safe_menu_por_usuario(
	cod_menu_x_usuario		int primary key auto_increment not null,
    cod_menu				int not null,
    tipo_usuario			char not null,
    
    foreign key (cod_menu) references safe_menu(cod_menu)
);
