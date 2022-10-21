create database nuevo_ingreso_db;
use nuevo_ingreso_db;

create table alumnos(
AlumnoID int primary key AUTO_INCREMENT,
NombreAlumno varchar(50) not null,
ApellidoAlumno varchar(50) not null,
NieAlumno int not null,
DuiAlumno int null,
FechaNacimientoAlumno date not null,
LugarNacimientoAlumno varchar(75) not null,
EmailAlumno varchar(75) not null,
DireccionAlumno varchar(120) not null,
DepartamentoAlumno varchar(25) not null,
MunicipioAlumno varchar(50) not null,
FotoAlumno varchar(150) not null,
TelefonoAlumno int not null
);

create table encargados(
encargadoID int primary key AUTO_INCREMENT,
AlumnoID int,
NombreEncargado varchar(50) not null,
ApellidoEncargado varchar(50) not null,
LugarNacimientoEncargado varchar(75) not null,
DireccionActualEncargado varchar(75) not null,
TelefonoCasa int null,
LugarTrabajo varchar(50) not null,
TelefonoPersonal int not null,
DuiEncargado varchar(15) not null,
ParentescoEncargado varchar(25) not null,
foreign key (AlumnoID) references alumnos(AlumnoID)
);

create table preferencias (
preferenciaID int primary key AUTO_INCREMENT,
AlumnoID int, 
Grado int not null, 
Seccion char(2) not null,
Especialidad varchar(50) not null,
foreign key (AlumnoID) references alumnos(AlumnoID)
);

-- Procedimientos almacenados
use nuevo_ingreso_db;
drop procedure if exists insertar_alumnos; 
create procedure insertar_alumnos  (
	in NombreAlumno varchar(50), 
	in ApellidoAlumno varchar(50), 
	in NieAlumno int, 
	in DuiAlumno int, 
	in FechaNacimientoAlumno date, 
	in LugarNacimientoAlumno varchar(75), 
	in EmailAlumno varchar(75), 
	in DireccionAlumno varchar(120), 
	in DepartamentoAlumno varchar(25), 
	in MunicipioAlumno varchar(50), 
	in FotoAlumno varchar(50), 
	in TelefonoAlumno int
	) not deterministic contains sql sql security 
definer 
INSERT INTO alumnos
VALUES (
	NULL,
	NombreAlumno, 
	ApellidoAlumno, 
	NieAlumno, 
	DuiAlumno, 
	FechaNacimientoAlumno, 
	LugarNacimientoAlumno, 
	EmailAlumno, 
	DireccionAlumno, 
	DepartamentoAlumno, 
	MunicipioAlumno, 
	FotoAlumno, 
	TelefonoAlumno
); 

use nuevo_ingreso_db;
DROP PROCEDURE if exists obtener_id;
CREATE PROCEDURE obtener_id()
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER SELECT AlumnoID FROM alumnos ORDER BY AlumnoID DESC LIMIT 1;

use nuevo_ingreso_db;
drop procedure if exists insertar_encargado; 
create procedure insertar_encargado  (
	in AlumnoID int, 
	in NombreEncargado varchar(50), 
	in ApellidoEncargado varchar(50), 
	in LugarNacimientoEncargado varchar(75), 
	in DireccionActualEncargado varchar(75), 
	in TelefonoCasa int, 
	in LugarTrabajo varchar(50), 
	in TelefonoPersonal int, 
	in DuiEncargado varchar(15), 
	in ParentescoEncargado varchar(25)
	) not deterministic contains sql sql security 
definer 
INSERT INTO encargados
VALUES (
	NULL,
	AlumnoID, 
	NombreEncargado, 
	ApellidoEncargado, 
	LugarNacimientoEncargado, 
	DireccionActualEncargado, 
	TelefonoCasa, 
	LugarTrabajo, 
	TelefonoPersonal, 
	DuiEncargado, 
	ParentescoEncargado
); 

use nuevo_ingreso_db;
drop procedure if exists insertar_preferencia; 
create procedure insertar_preferencia (
	in AlumnoID int, 
	in Grado int, 
	in Seccion char(2), 
	in Especialidad varchar(50)
	) not deterministic contains sql sql security 
definer 
INSERT INTO preferencias
VALUES (
	NULL,
	AlumnoID, 
	Grado, 
	Seccion, 
	Especialidad
); 


use nuevo_ingreso_db;
DROP PROCEDURE if exists obtener_alumno;
CREATE PROCEDURE obtener_alumno(
	in AlumnoIDPar int
)NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER  SELECT A.AlumnoID, NombreAlumno, ApellidoAlumno, NieAlumno, DuiAlumno, FechaNacimientoAlumno, LugarNacimientoAlumno, EmailAlumno, DireccionAlumno, DepartamentoAlumno, MunicipioAlumno,	FotoAlumno, TelefonoAlumno, NombreEncargado, ApellidoEncargado, LugarNacimientoEncargado, DireccionActualEncargado, TelefonoCasa, LugarTrabajo, TelefonoPersonal, DuiEncargado, ParentescoEncargado, Grado, seccion, Especialidad 
 FROM alumnos A, encargados E, preferencias P 
 WHERE A.AlumnoID = AlumnoIDPar AND E.AlumnoID = AlumnoIDPar AND P.AlumnoID = AlumnoIDPar ORDER BY A.AlumnoID DESC LIMIT 1;

use nuevo_ingreso_db;
DROP PROCEDURE if exists mostrar_alumnos;
CREATE PROCEDURE mostrar_alumnos()
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER SELECT * FROM alumnos ORDER BY AlumnoID DESC;