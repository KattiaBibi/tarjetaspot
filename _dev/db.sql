DROP TABLE IF EXISTS empresa;
CREATE TABLE IF NOT EXISTS empresa (
  id int AUTO_INCREMENT,
  nombre varchar(100) not null,
  slug varchar(255) not null,
  logo varchar(255) not null,
  background_color varchar(20) not null,
  estado boolean not null default 1,
  PRIMARY KEY(id),
  UNIQUE(slug)
)ENGINE=INNODB;

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario (
  id int AUTO_INCREMENT,
  id_empresa int null,
  email varchar(30) not null,
  password_hash varchar(255) not null,
  rol enum('administrador', 'usuario') not null default 'usuario',
  created_at datetime not null,
  updated_at datetime not null,
  estado boolean not null default 1,
  PRIMARY KEY(id),
  FOREIGN KEY(id_empresa) REFERENCES empresa(id),
  UNIQUE(email)
)ENGINE=INNODB;

DROP TABLE IF EXISTS datos_usuario;
CREATE TABLE IF NOT EXISTS datos_usuario (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  slug varchar(255) not null,
  nombres varchar(100) not null,
  apellidos varchar(100) not null,
  puesto varchar(255) not null,
  pagina_web varchar(255) not null,
  fecha_nacimiento date,
  genero enum('M', 'F'),
  url_foto_de_perfil varchar(255) not null,
  acerca_de_mi text not null,
  inicio text not null,
  horarios_atencion text not null,
  educacion text not null,
  experiencia text not null,
  servicios text not null,
  PRIMARY KEY(id),
  UNIQUE(id_usuario),
  UNIQUE(slug),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

DROP TABLE IF EXISTS datos_empresa;
CREATE TABLE IF NOT EXISTS datos_empresa (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  url_imagen varchar(255) not null,
  descripcion text not null,
  PRIMARY KEY(id),
  UNIQUE(id_usuario),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

DROP TABLE IF EXISTS tipo_localizacion;
CREATE TABLE IF NOT EXISTS tipo_localizacion (
  id int AUTO_INCREMENT,
  descripcion varchar(255) not null,
  PRIMARY KEY(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS tipo_red_social;
CREATE TABLE IF NOT EXISTS tipo_red_social (
  id int AUTO_INCREMENT,
  descripcion varchar(255) not null,
  PRIMARY KEY(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS tipo_correo_electronico;
CREATE TABLE IF NOT EXISTS tipo_correo_electronico (
  id int  AUTO_INCREMENT,
  descripcion varchar(255) not null,
  PRIMARY KEY(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS tipo_telefono;
CREATE TABLE IF NOT EXISTS tipo_telefono (
  id int  AUTO_INCREMENT,
  descripcion varchar(255) not null,
  PRIMARY KEY(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS localizaciones;
CREATE TABLE IF NOT EXISTS localizaciones (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  id_tipo_localizacion int not null,
  direccion varchar(550) not null,
  iframe text not null,
  link text not null,
  link_como_llegar text not null,
  es_publico boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
  FOREIGN KEY(id_tipo_localizacion) REFERENCES tipo_localizacion(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS redes_sociales;
CREATE TABLE IF NOT EXISTS redes_sociales (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  id_tipo_red_social int not null,
  url text not null,
  es_publico boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
  FOREIGN KEY(id_tipo_red_social) REFERENCES tipo_red_social(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS correos_electronicos;
CREATE TABLE IF NOT EXISTS correos_electronicos (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  id_tipo_correo_electronico int not null,
  url text not null,
  es_principal boolean not null default 0,
  es_publico boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
  FOREIGN KEY(id_tipo_correo_electronico) REFERENCES tipo_correo_electronico(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS telefonos;
CREATE TABLE IF NOT EXISTS telefonos (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  id_tipo_telefono int not null,
  prefijo varchar(10) not null,
  numero varchar(255) not null,
  es_wsp boolean not null  default 0,
  msg_wsp varchar(255) not null,
  es_publico boolean not null default 0,
  es_principal boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE,
  FOREIGN KEY(id_tipo_telefono) REFERENCES tipo_telefono(id)
)ENGINE=INNODB;

DROP TABLE IF EXISTS documentos;
CREATE TABLE IF NOT EXISTS documentos (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  url varchar(255) not null,
  descripcion varchar(255) not null,
  es_publico boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

DROP TABLE IF EXISTS imagenes;
CREATE TABLE IF NOT EXISTS imagenes (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  url varchar(255) not null,
  descripcion varchar(255) not null,
  orden varchar(3) not null,
  es_publico boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

DROP TABLE IF EXISTS videos;
CREATE TABLE IF NOT EXISTS videos (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  url text not null,
  titulo varchar(100) not null,
  descripcion varchar(255) not null,
  orden varchar(3) not null,
  es_publico boolean not null default 0,
  es_principal boolean not null default 0,
  PRIMARY KEY(id),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

DROP TABLE IF EXISTS apariencia;
CREATE TABLE IF NOT EXISTS apariencia (
  id int AUTO_INCREMENT,
  id_usuario int not null,
  color_primario varchar(20) not null,
  ruta_banner varchar(255) not null,
  PRIMARY KEY(id),
  UNIQUE(id_usuario),
  FOREIGN KEY(id_usuario) REFERENCES usuario(id) ON DELETE CASCADE
)ENGINE=INNODB;

-- ALTER TABLE usuario ADD COLUMN id_empresa INT DEFAULT NULL AFTER id;
-- ALTER TABLE usuario ADD CONSTRAINT FOREIGN KEY(id_empresa) REFERENCES empresa(id) ON DELETE SET NULL;

-- USER: kidsalud_tarjetadigital
-- PASSWORD: =T99F%Xv4ugj
-- DB: kidsalud_tarjetadigital

-- USER: tarjetit_tarjetadigital
-- PASSWORD: M=.G}xkQau3m
-- DB: tarjetit_tarjetadigital


-- password='waldir2021'
-- ADMINSTRADOR
INSERT INTO `usuario` (`id`, `id_empresa`, `email`, `password_hash`, `rol`, `created_at`, `updated_at`, `estado`) VALUES (NULL, NULL, 'jrivas@compusistel.com', '$2y$10$6yubEnbMLhC7cxYuDj8PxO1goZvx31HOI6Vyj1o7D9A7zUMxQeR.y', 'administrador', NOW(), NOW(), 1);

INSERT INTO `datos_usuario` (`id`, `id_usuario`, `slug`, `nombres`, `apellidos`, `puesto`, `pagina_web`, `fecha_nacimiento`, `genero`, `url_foto_de_perfil`, `acerca_de_mi`, `inicio`, `horarios_atencion`, `educacion`, `experiencia`, `servicios`) VALUES (NULL, '1', 'janina-rivas-cabrejos', 'Janina', 'Rivas Cabrejos', '', '', NULL, NULL, '', '', '', '', '', '', '');

INSERT INTO `tipo_localizacion` (`id`, `descripcion`) VALUES (NULL, 'TRABAJO'), (NULL, 'CASA');

INSERT INTO `tipo_red_social` (`id`, `descripcion`) VALUES (NULL, 'Facebook'), (NULL, 'Instagram'), (NULL, 'Twitter'), (NULL, 'Linkedin'), (NULL, 'Youtube');

INSERT INTO `tipo_correo_electronico` (`id`, `descripcion`) VALUES (NULL, 'Outlook'), (NULL, 'Gmail'), (NULL, 'Yahoo!'), (NULL, 'Hotmail');

INSERT INTO `tipo_telefono` (`id`, `descripcion`) VALUES (NULL, 'Teléfono Central'), (NULL, 'Móvil');

-- DB: tarjetaspot_app
-- USER: tarjetaspot_app
-- PASSWORD: O$bn@ckP62QD

CREATE TABLE categoria_multimedia (
  id int AUTO_INCREMENT,
  descripcion varchar(100) not null,
  PRIMARY KEY(id)
)engine=innoDB;

ALTER TABLE imagenes ADD COLUMN id_categoria_multimedia int NOT NULL;
ALTER TABLE imagenes ADD CONSTRAINT FOREIGN KEY(id_categoria_multimedia) REFERENCES(categoria_multimedia.id)

ALTER TABLE videos ADD COLUMN id_categoria_multimedia int NOT NULL;
ALTER TABLE videos ADD CONSTRAINT FOREIGN KEY(id_categoria_multimedia) REFERENCES(categoria_multimedia.id)