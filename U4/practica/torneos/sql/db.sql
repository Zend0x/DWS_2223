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
    ganador varchar(50),
    localizacion varchar(50)
);

CREATE TABLE T_partidos(
	id_partido int(6) auto_increment,
    id_torneo int(5),
    id_jugadorA int(6),
    id_jugadorB int(6),
    id_ganador int(6),
    rondaTorneo varchar(50),
    FOREIGN KEY (id_torneo) REFERENCES T_torneos (id_torneo),
    FOREIGN KEY (id_jugadorA) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (id_jugadorB) REFERENCES T_jugadores(id_jugador),
    FOREIGN KEY (id_ganador) REFERENCES T_jugadores(id_jugador),
    primary key(id_partido,id_torneo)
);
/*
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo de la Copa Estrella del Universo','Mushroom Kingdom','2022/12/22',"finalizado","Juanito");
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Gran Torneo Interestelar de la Copa Pistón de Doc Hudson by Rust Eze','Radiador Springs','2021/06/20',"en curso"," ");
insert into T_torneos(nombre,localizacion,fecha,estado,ganador) VALUES ('Campeonato de España Absoluto','Talavera de la Reina','2023/06/25',"Pendiente"," ");
*/
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Zhi Wen','Han','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Fernando','Chui','MO');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Ukhnaagiin','Khürelsükh','MN');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Alfonso','el Africano','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Sun','Yat Sen','TW');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Alfonso','Luján','ES');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Nasruddin','Khan','UZ');
INSERT INTO T_jugadores(nombre,apellidos,nacionalidad)VALUES('Kong','Linghui','CN');

-- SELECT id_partido, id_jugadorA, id_jugadorB, id_ganador FROM T_partidos WHERE T_partidos.id_torneo=4;
-- SELECT id_jugador,nombre,apellidos,nacionalidad FROM T_jugadores WHERE id_jugador='1';
SELECT * from T_partidos ORDER BY id_torneo;
-- SELECT * from T_jugadores;
-- SELECT * from T_torneos;

-- insert into t_torneos(nombre,fecha) values('copa mundial','2022-01-03');

-- INSERT INTO T_partidos(id_partido,id_torneo) values (1,2);

/*
SELECT id_jugador,nombre,apellidos,nacionalidad,(SELECT COUNT(id_partido) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1) as partidosJugados,
(SELECT COUNT(DISTINCT(id_torneo)) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1) as torneosJugados,
(SELECT COUNT(id_partido) FROM T_partidos where id_ganador=1) as partidosGanados,
(SELECT COUNT(DISTINCT(id_torneo)) FROM T_torneos WHERE T_torneos.ganador=1) as torneosGanados
FROM T_jugadores WHERE id_jugador='1';
*/

SELECT id_partido, id_jugadorA, id_jugadorB, IFNULL(id_ganador,' ') AS id_ganador, rondaTorneo, 
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorA) as 'nombreJugadorA',
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorB) AS 'nombreJugadorB',
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_ganador) AS 'nombreGanador'
		FROM T_partidos 
		WHERE T_partidos.id_torneo=1
        ORDER BY FIELD(rondatorneo, 'cuartos','semis','final');
        
SELECT id_torneo, nombre,fecha,localizacion,
(SELECT id_ganador FROM T_partidos WHERE T_partidos.rondaTorneo="final") as id_ganador,
(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_ganador) as 'nombreJugador' 
FROM T_torneos 
GROUP BY id_torneo;

-- SELECT COUNT(id_partido) FROM T_partidos where id_jugadorA=1 OR id_jugadorB=1;

DELETE FROM T_partidos WHERE true;
DELETE FROM T_torneos WHERE true;

-- SELECT IFNULL(MAX(id_partido)+1,1) as proximoPartido FROM T_partidos WHERE id_torneo=1;

DELETE FROM T_torneos WHERE true;
SELECT * from T_torneos;

SELECT * from T_partidos;
/*
SELECT id_partido, id_jugadorA, id_jugadorB, IFNULL(id_ganador,' ') as id_ganador, 
(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorA) as 'nombreJugadorA',
(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorB) AS 'nombreJugadorB',
(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_ganador) AS 'nombreGanador'
FROM T_partidos 
WHERE T_partidos.id_torneo=1;

UPDATE T_partidos SET id_ganador=1 WHERE id_partido=3;

-- SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'T_torneos';
/*
SELECT * FROM T_partidos;
SELECT * from T_torneos;