DELIMITER $$
CREATE DEFINER=`hugofranco21`@`%` PROCEDURE `InsertarLugar`(
  IN loc_nombre VARCHAR(50),
  IN loc_descripcion VARCHAR(100)
)
BEGIN

INSERT INTO Lugar(nombre,descripcion) VALUES(loc_nombre,loc_descripcion);

END $$

DELIMITER ;

DELIMITER $$
CREATE DEFINER=`hugofranco21`@`%` PROCEDURE `InsertarTipo`(
  IN loc_den VARCHAR(50),
  IN loc_descripcion VARCHAR(100)
)
BEGIN

INSERT INTO Lugar(denominacion,descripcion) VALUES(loc_den,loc_descripcion);

END $$

DELIMITER ;

DELIMITER $$
CREATE DEFINER=`hugofranco21`@`%` PROCEDURE `RegistrarIncidente`(
  IN lug VARCHAR(50),
  IN tip VARCHAR(100)
)
BEGIN

INSERT INTO Incidentes(nombre,denominacion) VALUES(lug,tip);

END $$

DELIMITER ;

