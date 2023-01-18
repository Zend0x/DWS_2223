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
    localizacion varchar(50)
);

CREATE TABLE T_partidos(
	id_partido int(6) auto_increment primary key,
    id_torneo int(5),
    idJugadorA int(6),
    idJugadorB int(6),
    idGanador int(6),
    FOREIGN KEY (id_torneo) REFERENCES T_torneos (id_torneo),
    FOREIGN KEY (idJugadorA) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (idJugadorB) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (idGanador) REFERENCES T_jugadores(id_jugador)
);
