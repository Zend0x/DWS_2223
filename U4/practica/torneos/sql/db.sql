DROP DATABASE IF EXISTS T_torneos;
CREATE DATABASE T_torneos;
USE T_torneos;

CREATE TABLE T_jugadores(
	id_jugador int(5) auto_increment primary key,
    nombre varchar(50) NOT NULL,
    apellidos varchar(100) NOT NULL,
    nacionalidad varchar(50)
);

CREATE TABLE T_usuarios(
	id_usuario int(6) auto_increment primary key,
    username varchar(20) UNIQUE,
    tipoUsuario ENUM('admin','normal')
);

CREATE TABLE T_torneos(
	id_torneo int(5) auto_increment primary key,
    nombre varchar(100) NOT NULL,
    fecha DATE NOT NULL,
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

insert into T_torneos(nombre,localizacion,fecha) VALUES ('Gran Torneo de la Copa Estrella del Universo','Mushroom Kingdom','2022/12/22');
insert into T_torneos(nombre,localizacion,fecha) VALUES ('Gran Torneo Interestelar de la Copa Pistón de Doc Hudson by Rust Eze','Radiador Springs','2021/06/20');

INSERT INTO T_jugadores(nombre,apellidos,nacionalidad) VALUES ('Jaime','Águilas','UZ');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad) VALUES ('Charles', 'White', 'USA');

INSERT INTO T_partidos(id_torneo,id_jugadorA,id_jugadorB,id_ganador) VALUES (1,1,2,2);

SELECT * FROM T_partidos;
SELECT * from T_torneos;
