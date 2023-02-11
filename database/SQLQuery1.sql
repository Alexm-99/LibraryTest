
-- TABLA EDITORIAL
CREATE TABLE EDITORIAL(
id_editorial varchar(11) NOT null primary KEY,
nombre varchar(50) NULL

);
-- TABLA LIBROS ---------------------------------------------

CREATE TABLE LIBROS(
id_libro varchar(11) NOT NULL,
nombre varchar(50) NULL, 
detalle varchar(100) NULL,
id_editorial_fk varchar(11) NULL,

CONSTRAINT libro_pkey PRIMARY KEY (id_libro),
foreign KEY (id_editorial_fk) REFERENCES EDITORIAL(id_editorial)


);


-- TABLA GÉNERO ------------------------------------------
CREATE TABLE GENERO(
id_genero varchar(11) NOT NULL,
	genero varchar(100) NULL,
	id_libro varchar(11) NOT NULL,
	
	
	
	CONSTRAINT genero_pkey PRIMARY KEY (id_genero), -- PRIMARY KEY / LLAVE PRINCIPAL
	CONSTRAINT libro_id_fkey FOREIGN KEY (id_libro) REFERENCES LIBROS(id_libro) -- FOREING KEY / LLAVE FORANEA 


);



-- TABLA AUTOR --------------------
CREATE TABLE AUTOR(
id_autor varchar(11) NOT NULL,
nombre varchar(50) NULL,
apellido varchar(50) NULL,

id_libro_FK varchar(11) NOT NULL,
	
	
	
CONSTRAINT autor_pkey PRIMARY KEY (id_autor), -- PRIMARY KEY / LLAVE PRINCIPAL
FOREIGN KEY (id_libro_FK) REFERENCES LIBROS(id_libro) -- FOREING KEY / LLAVE FORANEA 
);







-- 
SELECT autor.nombre AS autor, autor.apellido  AS apellido , libros.nombre AS libro 
FROM autor
INNER JOIN libros ON autor.id_libro_FK  = libros.id_libro
GROUP BY libros.nombre
HAVING COUNT(autor.id_autor) = 1



-- Consulta para sql server 
SELECT MAX(autor.nombre) AS autor, MAX(autor.apellido)  AS apellido, libros.nombre AS libro 
FROM autor
INNER JOIN libros ON autor.id_libro_FK  = libros.id_libro
GROUP BY libros.nombre
HAVING COUNT(autor.id_autor) = 1






INSERT INTO editorial
(id_editorial, nombre)
VALUES('1', 'MantaEditorial EC');


INSERT INTO libros
(id_libro, nombre, detalle, id_editorial_fk)
VALUES('1', 'Pepito', 'kjbskbdks', '1');
INSERT INTO libros
(id_libro, nombre, detalle, id_editorial_fk)
VALUES('4', 'xdd', 'bzMNZ', '1');
INSERT INTO libros
(id_libro, nombre, detalle, id_editorial_fk)
VALUES('2', 'Pepito2', 'kjbskbdks', '1');
INSERT INTO libros
(id_libro, nombre, detalle, id_editorial_fk)
VALUES('3', 'LA FELICIDAD', 'sds', '1');




INSERT INTO autor
(id_autor, nombre, apellido, id_libro_FK)
VALUES('1', 'MIGUEL', 'VERA', '1');
INSERT INTO autor
(id_autor, nombre, apellido, id_libro_FK)
VALUES('2', 'Karin', 'Herrera', '1');
INSERT INTO autor
(id_autor, nombre, apellido, id_libro_FK)
VALUES('3', 'Mario ', 'VERA', '1');
INSERT INTO autor
(id_autor, nombre, apellido, id_libro_FK)
VALUES('4', 'Alex', 'Medranda', '2');
INSERT INTO autor
(id_autor, nombre, apellido, id_libro_FK)
VALUES('5', 'VALERIA', 'MENA', '4');

