

create table visitante (
  id int auto_increment not null primary key,
  nombres varchar(60) not null,
  email varchar(255),
  genero char(30)
);

create table mensaje (
  id int auto_increment not null primary key,
  visitante_id int not null,
  mensaje varchar(255) not null
);

create table guitarra (
  id int auto_increment not null primary key,
  nombre varchar(30) not null,
  enlace_imagen varchar(255) not null,
  precio double
);

create table guitarra_caracteristica (
  id int auto_increment not null primary key,
  guitarra_id int not null,
  caracteristica varchar(255) not null
);

create table video (
  id int auto_increment not null primary key,
  titulo varchar(120) not null,
  enlace_video varchar(255) not null
);

insert into guitarra(nombre, enlace_imagen, precio) values ('Electro-acústica', 'images/electroacustica.png', 3500);
insert into guitarra(nombre, enlace_imagen, precio) values ('Clásica', 'images/clasica.png', 1000);
insert into guitarra(nombre, enlace_imagen, precio) values ('Gibson 50s', 'images/gibson50.png', 3500);

insert into guitarra_caracteristica(guitarra_id, caracteristica) values (1, 'Estilo vintage');
insert into guitarra_caracteristica(guitarra_id, caracteristica) values (1, 'Sonido de alta calidad');
insert into guitarra_caracteristica(guitarra_id, caracteristica) values (1, 'Incluye un estuche de metal');
insert into guitarra_caracteristica(guitarra_id, caracteristica) values (2, 'Estilo vintage');
insert into guitarra_caracteristica(guitarra_id, caracteristica) values (2, 'Madera pura');
insert into guitarra_caracteristica(guitarra_id, caracteristica) values (2, 'Empieza tu camino como estrella');

insert into video(titulo, enlace_video) values ('Guitarra gibson 50s classic', 'video/acustica-demo.mp4');
insert into video(titulo, enlace_video) values ('Guitarra epiphone acústica classic', 'video/standar50gibsondemo.mp4');