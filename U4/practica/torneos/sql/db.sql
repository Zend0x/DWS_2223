DROP DATABASE IF EXISTS torneosTenisMesaDB;
CREATE DATABASE torneosTenisMesaDB;
USE torneosTenisMesaDB;

CREATE TABLE T_jugadores(
	id_jugador int(5) auto_increment primary key,
    nombre varchar(50) NOT NULL,
    apellidos varchar(100) NOT NULL,
    nacionalidad varchar(50)
);

CREATE TABLE T_usuarios(
    username varchar(20) primary key,
    contrasena varchar(255) NOT NULL,
    tipoUsuario varchar(50)
);

CREATE TABLE T_torneos(
	id_torneo int(5) auto_increment primary key,
    nombre varchar(100) NOT NULL,
    fecha DATE NOT NULL,
    estado VARCHAR(50) NOT NULL,
    ganador varchar(50),
    localizacion varchar(50)
);

CREATE TABLE T_partidos(
	id_partido int(6) auto_increment primary key,
    id_torneo int(5),
    id_jugadorA int(6),
    id_jugadorB int(6),
    id_ganador int(6),
    FOREIGN KEY (id_torneo) REFERENCES T_torneos (id_torneo),
    FOREIGN KEY (id_jugadorA) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (id_jugadorB) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (id_ganador) REFERENCES T_jugadores(id_jugador)
);

insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo de la Copa Estrella del Universo','Mushroom Kingdom','2022/12/22',"finalizado","Juanito");
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo Interestelar de la Copa Pistón de Doc Hudson by Rust Eze','Radiador Springs','2021/06/20',"en curso"," ");
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Campeonato de España Absoluto','Talavera de la Reina','2023/06/25',"Pendiente"," ");

INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Fernando','Chui','MO');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ukhnaagiin','Khürelsükh','MN');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Alfonso','el Africano','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');

SELECT id_partido, id_jugadorA, id_jugadorB, id_ganador FROM T_partidos WHERE T_partidos.id_torneo=4;

SELECT * from T_partidos;
SELECT * from T_jugadores;


DELETE FROM T_partidos WHERE true;
DELETE FROM T_torneos WHERE true;

/*
SELECT * FROM T_partidos;
SELECT * from T_torneos;
