
--Procedimiento para insertar lugares
DELIMITER $$
CREATE DEFINER=`hugofranco21`@`daw-a01654856` PROCEDURE `InsertarLugares`(
  IN loc_nombre VARCHAR(50),
  IN loc_descripcion VARCHAR(100)
)
BEGIN
  insert into Lugar(nombre,descripcion) VALUES(loc_nombre,loc_descripcion);

END $$

DELIMITER ;

--Procedimiento para insertar tipos

CREATE DEFINER =  `hugofranco21`@`daw-a01654856` PROCEDURE  `InsertarTipos` ( 
	IN loc_den VARCHAR( 50 ), 
	IN loc_descripcion VARCHAR( 100 ) 
) 
BEGIN 
INSERT INTO Tipo(denominacion, descripcion) VALUES (loc_nombre, loc_descripcion);

END

--Procedimiento para insertar incidentes
DELIMITER $$
CREATE DEFINER=`hugofranco21`@`%` PROCEDURE `RegistrarIncidente`(
  IN lug VARCHAR(50),
  IN tip VARCHAR(100)
)
BEGIN

INSERT INTO Incidentes(nombre,denominacion) VALUES(lug,tip);

END $$

DELIMITER ;
