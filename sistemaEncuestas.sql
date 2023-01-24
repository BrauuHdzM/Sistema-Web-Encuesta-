/*Inicio diseno base de datos*/
CREATE DATABASE sistemaEncuestas;

USE sistemaEncuestas;

CREATE TABLE alumnos (
    boleta      VARCHAR(10) NOT NULL,
    curp        VARCHAR(18) NOT NULL,
    nombre	VARCHAR(60) NOT NULL,
    apellidoPaterno      VARCHAR(50) NOT NULL,
    apellidoMaterno      VARCHAR(50) NOT NULL
);

ALTER TABLE alumnos ADD CONSTRAINT alumnos_pk PRIMARY KEY ( boleta );


CREATE TABLE administradores (
    usuario      VARCHAR(20) NOT NULL,
    contrasena        VARCHAR(20) NOT NULL
);

ALTER TABLE administradores ADD CONSTRAINT administradores_pk PRIMARY KEY ( usuario );


CREATE TABLE grupos (
    idGrupo      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    grupo        VARCHAR(18) NOT NULL
);

/*ALTER TABLE grupos ADD CONSTRAINT grupos_pk PRIMARY KEY ( idGrupo );*/


CREATE TABLE materias (
    idMateria      INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomMateria        VARCHAR(50) NOT NULL
);

/*ALTER TABLE materias ADD CONSTRAINT materias_pk PRIMARY KEY ( idMateria );*/


CREATE TABLE materiaGrupo (
	idMateriaGrupo	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idMateria      INT NOT NULL ,
    idGrupo        INT NOT NULL 
);

ALTER TABLE materiaGrupo ADD CONSTRAINT materiaGrupo_un UNIQUE  ( idMateria, idGrupo );
ALTER TABLE materiaGrupo ADD CONSTRAINT materiaGrup_fk_materias FOREIGN KEY ( idMateria ) REFERENCES materias(idMateria);
ALTER TABLE materiaGrupo ADD CONSTRAINT materiaGrup_fk_grupos FOREIGN KEY ( idGrupo ) REFERENCES grupos(idGrupo);


CREATE TABLE materiaAlumno (
	idMateriaAlumno	INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    boleta      VARCHAR(10) NOT NULL,
    idMateriaGrupo      INT NOT NULL 
);

ALTER TABLE materiaAlumno ADD CONSTRAINT materiaAlumno_un UNIQUE ( boleta, idMateriaGrupo );
ALTER TABLE materiaAlumno ADD CONSTRAINT materiaAlumno_fk_alumnos FOREIGN KEY ( boleta ) REFERENCES alumnos( boleta );
ALTER TABLE materiaAlumno ADD CONSTRAINT materiaAlumno_fk_materiaGrupo FOREIGN KEY ( idMateriaGrupo ) REFERENCES materiaGrupo( idMateriaGrupo );


CREATE TABLE respuestas (
    idMateriaAlumno      INT NOT NULL PRIMARY KEY,
    q1	INT NOT NULL CHECK (q1 BETWEEN 0 and 5),
    q2	INT NOT NULL CHECK (q2 BETWEEN 0 and 5),
    q3	INT NOT NULL CHECK (q3 BETWEEN 0 and 5),
    q4	INT NOT NULL CHECK (q4 BETWEEN 0 and 5),
    q5	INT NOT NULL CHECK (q5 BETWEEN 0 and 5)
);

ALTER TABLE respuestas ADD CONSTRAINT respuestas_fk_materiaAlumno FOREIGN KEY ( idMateriaAlumno ) REFERENCES materiaAlumno( idMateriaAlumno );

CREATE TABLE comentarios(
	comentario VARCHAR(255) NOT NULL
);
/*Fin diseno base de datos*/



/*Insercion datos alumno*/
INSERT INTO alumnos VALUES('2020630039','BEVR010115HDFLRBA8','Roberto Mauricio', 'Beltran', 'Vargas');
INSERT INTO alumnos VALUES('2020630040','BEVR010115HDFLRBA8','Jose Alfonso', 'Martinez', 'Gutierrez');
INSERT INTO alumnos VALUES('2020630041','BEVR010115HDFLRBA8','Jose Alfonso', 'Martinez', 'Gutierrez');

/*Insercion datos administrados*/
INSERT INTO administradores VALUES ('admin', 'admin');

/*Insercion datos grupo*/
INSERT INTO grupos (grupo) VALUES ('3CM11'),('3CM12'),('3CM13');

/*Insercion datos materias*/
INSERT INTO materias (nomMateria) VALUES ('Analisis de Algoritmos'),('Analisis Vectorial'),('Probabilidad y Estadistica');

/*Asignar Materias a Grupos*/
insert into materiaGrupo (idMateria, idGrupo)
select m.idMateria, g.idGrupo
from materias m,grupos g
where m.nomMateria = 'Analisis de Algoritmos'
and g.grupo = '3CM12';

/*Visualizar materias asignadas a grupos*/
select idMateriaGrupo, grupo, nomMateria  from grupos g inner join materiaGrupo mg on g.idGrupo=mg.idGrupo inner join materias m on m.idMateria = mg.idMateria;

/*Asignar Materias a alumnos*/
insert into materiaAlumno (idMateriaGrupo, boleta)
select mg.idMateriaGrupo, a.boleta
from alumnos a, materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join grupos g on g.idGrupo = mg.idGrupo
where m.nomMateria = 'Analisis Vectorial'
and g.grupo = '3CM13'
and a.boleta = '2020630039';

/*Visualizar alumnos, grupos y materia*/
select a.boleta, a.curp, a.nombre, a.apellidoPaterno, a.apellidoMaterno, m.nomMateria, g.grupo
from materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join grupos g on g.idGrupo = mg.idGrupo
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join alumnos a on a.boleta = ma.boleta;

/*Insertar respuestas*/
insert into respuestas (idMateriaAlumno, q1, q2, q3, q4, q5)
select ma.idMateriaAlumno, 4, 5, 5, 5, 5
from materiaGrupo mg
inner join materias m on m.idMateria = mg.idMateria
inner join grupos g on g.idGrupo = mg.idGrupo
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join alumnos a on a.boleta = ma.boleta
where m.nomMateria = 'Analisis Vectorial'
and g.grupo = '3CM13'
and a.boleta = '2020630039';

/*Mostar tabla completa*/
select a.boleta, a.curp, a.nombre, a.apellidoPaterno, a.apellidoMaterno, m.nomMateria, g.grupo, q1, q2, q3, q4, q5
from materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join grupos g on g.idGrupo = mg.idGrupo
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join alumnos a on a.boleta = ma.boleta
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno;


/*Consultas requeridas en las vistas de administrador*/


/*-Total almnos inscritos */
SELECT COUNT(*) FROM alumnos;


/*-Cuantos alumnos han contestado*/
SELECT count(DISTINCT boleta) 
FROM materiaGrupo mg 
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno;


/*Promedio cada pregunta*/
SELECT AVG(q1) FROM respuestas;
SELECT AVG(q2) FROM respuestas;
SELECT AVG(q3) FROM respuestas;
SELECT AVG(q4) FROM respuestas;
SELECT AVG(q5) FROM respuestas;
SELECT AVG(q1),AVG(q2),AVG(q3),AVG(q4),AVG(q5) FROM respuestas;


/*-Comentarios*/
SELECT * FROM comentarios LIMIT 5;


/*-Tabla todas las materias y promedio*/
select m.idMateria, m.nomMateria, avg((q1 + q2 + q3 + q4 + q5)/5)
from materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno 
group by nomMateria;


/*-Promedio de cada pregunta de la materia*/
select avg(q1),avg(q2),avg(q3),avg(q4),avg(q5)
from materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno
WHERE m.idMateria = 1;

/*O tambien se puede buscar por nombre*/

select avg(q1),avg(q2),avg(q3),avg(q4),avg(q5)
from materiaGrupo mg 
inner join materias m on m.idMateria = mg.idMateria
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno
WHERE m.nomMateria = 'Analisis Vectorial';


/*Promedio por grupo (cada materia)*/
select g.grupo, avg((q1 + q2 + q3 + q4 + q5)/5)
from materiaGrupo mg 
inner join grupos g on g.idGrupo = mg.idGrupo
inner join materiaAlumno ma on ma.idMateriaGrupo = mg.idMateriaGrupo
inner join respuestas r on r.idMateriaAlumno = ma.idMateriaAlumno
WHERE mg.idMateria = 2
group by g.grupo;