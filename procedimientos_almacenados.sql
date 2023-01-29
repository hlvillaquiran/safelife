use safe_life

/**** PROCEDIMIENTOS ALMACENADOS ****/
delimiter $$
create procedure login_VerificarCredenciales(in correo varchar(150), in clave varchar(150))
begin
	select count(*) as existe
    from safe_usuarios as u
    where
    u.estado = 'A' and
    u.correo_electronico = correo and
    u.contrasena = sha1(clave);
end; 
$$

delimiter $$
create procedure login_ObtenerDatosUsuario(in correo varchar(150))
begin
	select *
    from safe_usuarios as u
    where
    u.estado = 'A' and
    u.correo_electronico = correo;
end; 
$$

delimiter $$
create procedure section_ObtenerMenu(in tipo_de_usuario char)
begin
	select m.cod_menu, m.nombre, m.icono, m.url
    from safe_menu as m
    join safe_menu_por_usuario as mu
    on m.cod_menu = mu.cod_menu
    join safe_usuarios u
    on mu.tipo_usuario = u.tipo_usuario
    where
    m.estado = 'A' and
    u.estado = 'A' and
    u.tipo_usuario = tipo_de_usuario
    order by m.cod_menu;
end; 
$$


delimiter $$
create procedure section_ObtenerPagina(in id_pagina int)
begin
	select *
    from safe_paginas as p
    where
    p.cod_pagina = id_pagina and
    p.estado = 'A';
end; 
$$

delimiter $$
create procedure boton_ObtenerBotones()
begin
	select *
    from safe_tipo_boton as b
    where
    b.estado = 'A';
end; 
$$

delimiter $$
create procedure boton_InsertarBoton(in codigo_usuario int, in codigo_tipo int, in latitud decimal(30,15), in longitud decimal(30,15))
begin
	insert into safe_boton_panico(cod_usuario, cod_tipo_boton, fecha_boton, lat, lon, estado)
    values(codigo_usuario, codigo_tipo, now(), latitud, longitud, 'A');
end; 
$$

delimiter $$
create procedure denuncia_InsertarDenuncia(in denuncia varchar(200), in num_documento varchar(200), in nombre_denuncia varchar(200), in ciudad_denuncia varchar(200), in sub_queja varchar(200), in direccion_queja varchar(200), in detalles_queja varchar(300), in edad_desaparecida int, in ropa varchar(200), in lugar_contacto_den varchar(200), in fecha_hora datetime, in carga_foto varchar(200), in codigo_usuario int)
begin
	insert into safe_denuncias(cod_usuario, tipo_denuncia, fecha_denuncia, sub_denuncia, documento, nombre, ciudad, direccion, url_imagen, descripcion, edad, vestimenta, lugar_contacto, fecha_hora_contacto, estado)
    values(codigo_usuario, denuncia, curdate(), sub_queja, num_documento, nombre_denuncia, ciudad_denuncia, direccion_queja, carga_foto, detalles_queja, edad_desaparecida, ropa, lugar_contacto_den, fecha_hora, 'A');
end; 
$$


