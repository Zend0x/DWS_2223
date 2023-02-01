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
/*
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo de la Copa Estrella del Universo','Mushroom Kingdom','2022/12/22',"finalizado","Juanito");
/*
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo Interestelar de la Copa Pistón de Doc Hudson by Rust Eze','Radiador Springs','2021/06/20',"en curso"," ");
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Campeonato de España Absoluto','Talavera de la Reina','2023/06/25',"Pendiente"," ");
*/
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Fernando','Chui','MO');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ukhnaagiin','Khürelsükh','MN');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Alfonso','el Africano','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ildefonso','de Sacristán','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Alfonso','Luján','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Nasruddin','Khan','UZ');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Kong','Linghui','CN');

<<<<<<< HEAD
SELECT id_partido, CONCAT_WS(' ',T_jugadores.nombre,T_jugadores.apellidos) as 'nombreJugadorA', id_ganador 
FROM T_partidos 
INNER JOIN T_jugadores ON T_partidos.id_jugadorA = T_jugadores.id_jugador
WHERE id_jugadorA=3;
=======
-- SELECT id_partido, id_jugadorA, id_jugadorB, id_ganador FROM T_partidos WHERE T_partidos.id_torneo=4;
>>>>>>> 0ce14d326e1196eb7b9a70f59e1b05d2828677b7
-- SELECT id_jugador,nombre,apellidos,nacionalidad FROM T_jugadores WHERE id_jugador='1';
SELECT * from T_partidos;
-- SELECT * from T_jugadores;
-- SELECT * from T_torneos;
/*
SELECT id_jugador,nombre,apellidos,nacionalidad,(SELECT COUNT(id_partido) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1) as partidosJugados,
(SELECT COUNT(DISTINCT(id_torneo)) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1) as torneosJugados,
(SELECT COUNT(id_partido) FROM T_partidos where id_ganador=1) as partidosGanados,
(SELECT COUNT(DISTINCT(id_torneo)) FROM T_torneos WHERE T_torneos.ganador=1) as torneosGanados
FROM T_jugadores WHERE id_jugador='1';
*/
-- SELECT COUNT(id_partido) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1;


SELECT IFNULL(MAX(id_torneo),0)+1 AS 'id_torneo' FROM T_torneos;

DELETE FROM T_partidos WHERE true;
DELETE FROM T_torneos WHERE true;

-- SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'T_torneos';

/*
INSERT INTO T_torneos(nombre,fecha,estado)VALUES("Copa guay","2023-01-31","Finalizado");

INSERT INTO T_partidos(id_torneo,id_jugadorA,id_jugadorB) VALUES (1,1,2);
/*
SELECT * FROM T_partidos;
SELECT * from T_torneos;
