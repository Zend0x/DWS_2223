DROP DATABASE carteleraPeliculas;
create database carteleraPeliculas;
USE carteleraPeliculas;

CREATE TABLE categorias(
	id int(5) primary key,
    nombre varchar(500) not null,
    descripcion varchar(500) not null
);

create table peliculas(
	id int(5) primary key,
    titulo varchar(500) not null,
    anno int default null,
    duracion int(6) not null,
    categoria int(5) not null,
    descripcion varchar(500) not null,
    votos int(10) default 0,
    imagen varchar(500) not null,
    FOREIGN KEY (categoria) REFERENCES categorias(id)
);

create table actores(
	id int(5) primary key,
    nombre varchar(30),
    apellidos varchar(60),
    genero varchar(20)
);

create table directores(
	id int(5) primary key,
    nombre varchar(30),
    apellidos varchar(60),
    genero varchar(20)
);

create table actores_peliculas(
	id_actor int(5),
    id_director int(5),
    primary key (id_actor, id_director),
    foreign key (id_actor) references actores(id),
    foreign key (id_director) references directores(id)
);


INSERT INTO categorias(id,nombre,descripcion) VALUES (1,'artes marciales','Películas de puñasos.');
INSERT INTO categorias(id,nombre,descripcion) VALUES (2,'terror','Películas de miedo.');

INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (1,'El Resplandor',1995,150,2,"1","the_shining.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (2, 'Scream',1996,111,2,"2","scream.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (3,'Umma',2022,83,2,"3","umma.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (4, 'Haunt',2019,92,2,"4","haunt.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (5,'Pesadilla en Elm Street',1984,91,2,"5","nightmare.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (6, "Wes Craven's Nightmare",2015,110,2,"6","wesCraven_nightmare.jpg"); 

INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (7,'Game of Death',1978,125,1,"Bruce Lee y Kareem Abdul Jabbar","game_of_death.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (8, 'Ip Man',2008,108,1,"Ip Man 1","ip_man_2008_poster.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (9,'Ip Man 4',2022,83,1,"Ip Man 1 pero no es la 1, es la 4","ip_man_four.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (10, 'Kickboxer',1989,103,1,"Jean Claude van DAMN","kickboxer.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (11,'Dragon Lord',1982,102,1,"Jackie Chan, Dragon Lord","dragon_lord.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (12, "The Dragon Tamers",1975,107,1,"Un chino va a Corea y le parten la madre","dragon_tamers.jpg"); 

INSERT INTO actores(id,nombre,apellidos,genero) VALUES (1,'Bruce','Lee','masculino');
INSERT INTO actores(id,nombre,apellidos,genero) VALUES (2,'Donnie','Yen','masculino');
INSERT INTO actores(id,nombre,apellidos,genero) VALUES (3,'Danny','Chan','masculino');
INSERT INTO actores(id,nombre,apellidos,genero) VALUES (4,'Jackie','Chan','masculino');
INSERT INTO actores(id,nombre,apellidos,genero) VALUES (5,'James','Tien','masculino');


UPDATE peliculas SET peliculas.votos = peliculas.votos + 1 WHERE peliculas.id=1;

/*SELECT * FROM peliculas 
INNER JOIN categorias ON peliculas.categoria=categorias.id
WHERE peliculas.categoria='1' 
ORDER BY votos DESC;*/

SELECT peliculas.id, peliculas.titulo, peliculas.imagen,
                peliculas.categoria, peliculas.duracion, peliculas.descripcion FROM peliculas
                INNER JOIN categorias ON peliculas.categoria=categorias.id
                WHERE categorias.nombre='artes marciales'
                ORDER BY votos DESC;
                
/* Query para sacar actores y sus películas
SELECT CONCAT_WS(' ',actores.nombre,actores.apellido) AS 'Nombre Completo', peliculas.titulo as 'Titulo Pelicula'
FROM actores
INNER JOIN actores_peliculas ON actores.id=actores_peliculas.id_actor
INNER JOIN peliculsa on peliculas.id=actores_peliculas.id_pelicula
WHERE pelicula.ID=$saneado_id_pelicula */

