DROP DATABASE carteleraPeliculas;
create database carteleraPeliculas;
USE carteleraPeliculas;

CREATE TABLE categorias(
	id int(5) primary key,
    nombre varchar(500) not null,
    imagen varchar(200) not null,
    descripcion varchar(500) not null
);

create table peliculas(
	id int(5) primary key,
    titulo varchar(500) not null,
    anno int default null,
    duracion int(6) not null,
    categoria int(5) not null,
    descripcion varchar(1000) not null,
    votos int(10) default 0,
    imagen varchar(500) not null,
    FOREIGN KEY (categoria) REFERENCES categorias(id)
);

create table actores(
	id int(5) primary key AUTO_INCREMENT,
    nombre varchar(30),
    apellidos varchar(60),
    genero varchar(20)
);

create table directores(
	id int(5) primary key AUTO_INCREMENT,
    nombre varchar(30),
    apellidos varchar(60),
    genero varchar(20)
);

create table actores_peliculas(
	id_actor int(5),
    id_pelicula int(5),
    primary key (id_actor, id_pelicula),
    foreign key (id_actor) references actores(id),
    foreign key (id_pelicula) references peliculas(id)
);

create table directores_peliculas(
	id_director int(5),
    id_pelicula int(5),
    primary key (id_director, id_pelicula),
    foreign key (id_director) references directores(id),
    foreign key (id_pelicula) references peliculas(id)
);

INSERT INTO categorias(id,nombre,imagen,descripcion) VALUES (1,'Artes Marciales','martialArts_icon.png','Películas de puñasos.');
INSERT INTO categorias(id,nombre,imagen,descripcion) VALUES (2,'Terror','terror_icon.png','Películas de miedo.');

INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (1,'El Resplandor',1995,150,2,
"Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales."
,"the_shining.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (2, 'Scream',1996,111,2,
"Un año después del asesinato de su madre, Sidney vuelve a vivir una situación angustiosa: mientras un terrible psicópata tiene aterrorizado al barrio, su padre está siempre ausente y su novio está a punto de romper con ella.",
"scream.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (3,'Umma',2022,83,2,
"Amanda y su hija viven una vida tranquila en una granja estadounidense, pero cuando los restos de su madre separada llegan de Corea, Amanda se ve obsesionada por el temor de convertirse en su propia madre."
,"umma.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (4, 'Haunt',2019,92,2,
"Harper, una adolescente que acaba de romper con su novio, decide salir de fiesta con sus amigas en Halloween. Aunque la noche no pinta demasiado bien, pronto entabla conversación con un atractivo joven que despierta su interés. Se juntarán así varios jóvenes que deciden entrar en una casa encantada que promete ofrecer una experiencia extrema a base de explotar sus miedos más profundos. La noche se volverá mortal cuando se den cuenta de que algunos monstruos son reales."
,"haunt.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (5,'Pesadilla en Elm Street',1984,91,2,
"Varios jóvenes de una pequeña localidad tienen habitualmente pesadillas en las que son perseguidos por un hombre deformado por el fuego y que usa un guante terminado en afiladas cuchillas. Algunos de ellos comienzan a ser asesinados mientras duermen por este ser que resulta ser Freddy Krugger, un hombre con un pasado abominable"
,"nightmare.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (6, "Pesadilla en Elm Street (El origen)",2010,102,2,
"Versión contemporánea del clásico del cine de terror. Un grupo de adolescentes de los suburbios empiezan a ser perseguidos por Freddy Krueger, un asesino de aspecto terrible y con el rostro quemado que trata de acabar con ellos mientras duermen. Necesitan, pues, permanecer despiertos para protegerse mutuamente. Pero, si duermen, no hay escapatoria."
,"wesCraven_nightmare.jpg"); 

INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (7,'Juego con la Muerte',1978,125,1,
"Película que fue estrenada tras el fallecimiento de Bruce Lee, que no llegó a terminarla: sólo se rodaron 54 minutos que se completaron con material de archivo. Es el legado del mayor icono de las artes marciales de todos los tiempos. Lee encarna a su alter ego Billy Lo, una superestrella del cine de acción coaccionada por un sindicato del crimen para que trabaje para ellos. Tras la negativa de Lo, los mafiosos deciden deshacerse de él haciendo que le disparen en medio de un rodaje con un arma que se suponía de fogueo. La muerte de Lo conmociona al mundo entero, pero en realidad él ha sobrevivido y planea su revancha. En un final épico, Lee se enfrenta, uno tras otro, a diferentes adversarios con distintos estilos de lucha hasta encontrarse cara a cara con el enemigo final."
,"game_of_death.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (8, 'Ip Man',2008,108,1,
"Foshan, años treinta. Ip Man, respetado maestro de Wing Chun, combina el estudio de las artes marciales con los combates ocasionales a los que se ve forzado por parte de sus admiradores. Son tiempos de prosperidad a los que la guerra con Japón amenaza con poner fin. Con la ocupación estallará la tragedia e Ip Man se verá obligado a defender el honor de su pueblo. Ip Man (o también conocido como Yip Man), fue maestro y mentor de Bruce Lee. "
,"ip_man_2008_poster.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (9,'Campeón de Campeones',2005,102,1,
"Chok Dee está inspirada en la historia real de Dida, once veces campeón de Thai boxing. El protagonista, un delincuente de poca monta, acaba en prisión. Allí conoce a Jean, un antiguo campeón de boxeo, quien le adentra en uno de los deportes más violentos del mundo, el Thai boxing, en el que también convergen una serie de valores morales. Al salir de la cárcel Dida marcha a Tailandia y pronto descubre que el aprendizaje de este deporte resulta inaccesible para los extranjeros. Pero su constancia le lleva a aceptar un primer combate cuyo precio es la humillación. Su segundo combate en cambio será muy distinto."
,"chokdee.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (10, 'Kickboxer',1989,103,1,
"Cuando Tong Po, el sanguinario campeón de Kickboxing, deja paralítico a su hermano, Eric jura vengarse del hombre a quienes todos consideran invencible, aunque le cueste la vida."
,"kickboxer.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (11,'El Maestro de los Dragones',1982,102,1,
"Dragón y Cowboy son dos jóvenes amigos cuyo único propósito en la vida es participar en demenciales competiciones deportivas para impresionar a la muchacha más bella de su aldea. Al menos hasta que un buen día Dragón trata de llevar una carta de amor hasta su amada y acaba accidentalmente en el escondite de una banda de contrabandistas que venden antiguos tesoros nacionales a potencias extranjeras frente a sus propias narices. Los dos impulsivos amigos no quieren desaprovechar la oportunidad de convertirse en verdaderos héroes, pero la situación no tardará en superarles por completo."
,"dragon_lord.jpg"); 
INSERT INTO peliculas(id,titulo,anno,duracion,categoria,descripcion, imagen) VALUES (12, "The Dragon Tamers",1975,107,1,
"Un estudiante de artes marciales procedente de China llega a Corea con la intención de enfrentarse a un maestro de Taekwondo. Al poco de su llegada, conoce a varios personajes pertenecientes a las diversas escuelas de artes marciales que existen en la zona, y que están sufriendo el ataque de un misterioso grupo interesado en hacerse con el control de las mismas. En una de estas escuelas, el estudiante encontrará a un maestro de artes marciales que le ayudará a convertirse en un auténtico experto. "
,"dragon_tamers.jpg"); 

/*El Resplandor*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Jack','Nicholson','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Shelley','Duvall','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Danny','Lloyd','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Scatman','Crothers','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Stanley','Kubrick','masculino');
/*Scream*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Neve','Campbell','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('David','Arquette','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Courteney','Cox','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Matthew','Lillard','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Wes','Craven','masculino');
/*Umma*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Sandra','Oh','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Dermot','Mulroney','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Odeya','Rush','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Fivel','Stewart','femenino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Iris K','Shim','femenino');
/*Haunt*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Katie','Stevens','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Will','Brittain','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Lauryn Alisa','McClain','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Andrew','Caldwell','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Scott','Beck','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Bryan','Woods','masculino');
/*Pesadilla en Elm Street*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Heather','Langenkamp','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Robert','Englund','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Johnny','Depp','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('John','Saxon','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Wes','Craven','masculino');
/*Pesadilla en Elm Street (El Origen)*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Jackie Earle','Haley','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Kyle','Gallner','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Rooney','Mara','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Katie','Cassidy','femenino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Samuel','Bayer','masculino');

/*Juego con la Muerte*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Bruce','Lee','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Kyle','Gallner','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Rooney','Mara','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Katie','Cassidy','femenino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Robert','Clouse','masculino');
/*Ip Man*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Donnie','Yen','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Simon','Yam','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Fan','Siu-wong','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Lynn','Hung','femenino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Wilson','Yip','masculino');
/*Chok Dee*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Dida','Diafat','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Bernard','Giraudeau','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Florence','Faivre','femenino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Lakshantha','Abenayake','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Xavier','Durringer','masculino');
/*Kickboxer*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Jean-Claude','Van Damme','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Dennis','Alexio','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Michel','Qissi','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Dennis','Chan','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Mark','DiSalle','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('David','Worth','masculino');
/*El Maestro ed los Dragones*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Jackie','Chan','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Cheung','Wing-fat (Mars)','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Paul','Chang','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Fung','Fung','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('Jackie','Chan','masculino');
/*The Dragon Tamers*/
INSERT INTO actores(nombre,apellidos,genero) VALUES ('James','Tien','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Carter','Wong','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Yeung','Wai','masculino');
INSERT INTO actores(nombre,apellidos,genero) VALUES ('Ji','Han-jae','masculino');
INSERT INTO directores(nombre,apellidos,genero)VALUES('John','Woo','masculino');

/*El Resplandor*/
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (1,1);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (2,1);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (3,1);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (4,1);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (5,2);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (6,2);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (7,2);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (8,2);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (9,3);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (10,3);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (11,3);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (12,3);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (13,4);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (14,4);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (15,4);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (16,4);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (17,5);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (18,5);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (19,5);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (20,5);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (21,6);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (22,6);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (23,6);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (24,6);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (25,7);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (26,7);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (27,7);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (28,7);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (29,8);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (30,8);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (31,8);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (32,8);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (33,9);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (34,9);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (35,9);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (36,9);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (37,10);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (38,10);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (39,10);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (40,10);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (41,11);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (42,11);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (43,11);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (44,11);

INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (45,12);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (46,12);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (47,12);
INSERT INTO actores_peliculas(id_actor,id_pelicula) VALUES (48,12);

INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (1,1);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (2,2);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (3,3);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (4,4);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (5,4);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (6,6);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (7,7);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (8,8);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (9,9);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (10,10);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (11,10);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (12,10);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (13,11);
INSERT INTO directores_peliculas(id_director,id_pelicula) VALUES (14,12);

/*SELECT * FROM peliculas 
INNER JOIN categorias ON peliculas.categoria=categorias.id
WHERE peliculas.categoria='1' 
ORDER BY votos DESC;*/

/*SELECT peliculas.id, peliculas.titulo, peliculas.imagen, peliculas.categoria, peliculas.duracion, peliculas.descripcion FROM peliculas
INNER JOIN categorias ON peliculas.categoria=categorias.id
WHERE categorias.nombre='artes marciales'
ORDER BY votos DESC;*/
                
/* Query para sacar actores y sus películas
SELECT CONCAT_WS(' ',actores.nombre,actores.apellido) AS 'Nombre Completo', peliculas.titulo as 'Titulo Pelicula'
FROM actores
INNER JOIN actores_peliculas ON actores.id=actores_peliculas.id_actor
INNER JOIN peliculsa on peliculas.id=actores_peliculas.id_pelicula
WHERE pelicula.ID=$saneado_id_pelicula

SELECT CONCAT_WS(' ',actores.nombre,actores.apellidos) as 'nombreCompleto' FROM actores 
            INNER JOIN actores_peliculas ON actores.id=actores_peliculas.id_actor
            INNER JOIN peliculas ON actores_peliculas.id_pelicula=peliculas.id
            WHERE peliculas.id=1;
*/
