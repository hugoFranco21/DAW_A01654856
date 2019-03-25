--------------Materiales-------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'creaMaterial' AND type = 'P')
	DROP PROCEDURE creaMaterial
GO

CREATE PROCEDURE creaMaterial
	@uclave NUMERIC(5,0),
	@udescripcion VARCHAR(50),
	@ucosto NUMERIC(8,2),
	@uimpuesto NUMERIC(6,2)
AS
	INSERT INTO Materiales VALUES(@uclave, @udescripcion, @ucosto, @uimpuesto)
GO

EXECUTE creaMaterial 5000,'Martillos Acme',250,15

SELECT * FROM Materiales

IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'modificaMaterial' AND type = 'P')
	DROP PROCEDURE modificaMaterial
GO

CREATE PROCEDURE modificaMaterial
	@uclave NUMERIC(5,0),
	@udescripcion VARCHAR(50),
	@ucosto NUMERIC(8,2),
	@uimpuesto NUMERIC(6,2)
AS
	UPDATE Materiales
	SET Descripcion=@udescripcion, Costo=@ucosto, PorcentajeImpuesto=@uimpuesto
	WHERE Clave=@uclave
GO

EXECUTE modificaMaterial 5000,'Adamantium',10000,5

-----------------------------------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'eliminaMaterial' AND type = 'P')
	DROP PROCEDURE eliminaMaterial
GO

CREATE PROCEDURE eliminaMaterial
	@uclave NUMERIC(5,0)
AS
	DELETE FROM Materiales
	WHERE Clave=@uclave
GO

EXECUTE eliminaMaterial 5000
------------------------------------------
-------------- Proveedores----------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'creaProveedor' AND type = 'P')
	DROP PROCEDURE creaProveedor
GO

CREATE PROCEDURE creaProveedor
	@uRFC VARCHAR(13),
	@uRazonSocial VARCHAR(50)
AS
	INSERT INTO Proveedores VALUES(@uRFC, @uRazonSocial)
GO

EXECUTE creaProveedor 'FAAH990821','FranCorp'

SELECT * FROM Proveedores

IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'modificaProveedor' AND type = 'P')
	DROP PROCEDURE modificaProveedor
GO

CREATE PROCEDURE modificaProveedor
	@uRFC VARCHAR(13),
	@uRazonSocial VARCHAR(50)
AS
	UPDATE Proveedores
	SET RazonSocial=@uRazonSocial
	WHERE RFC=@uRFC
GO

EXECUTE modificaProveedor FAAH990821,'Parallax'

-----------------------------------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'eliminaProveedor' AND type = 'P')
	DROP PROCEDURE eliminaProveedor
GO

CREATE PROCEDURE eliminaProveedor
	@uRFC VARCHAR(13)
AS
	DELETE FROM Proveedores
	WHERE RFC=@uRFC
GO

EXECUTE eliminaProveedor 'FAAH990821'
--------------------------------------------------
-----------Proyectos----------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'creaProyecto' AND type = 'P')
	DROP PROCEDURE creaProyecto
GO

CREATE PROCEDURE creaProyecto
	@uNumero NUMERIC(5,0),
	@uDenominacion VARCHAR(50)
AS
	INSERT INTO Proyectos VALUES(@uNumero, @uDenominacion)
GO

EXECUTE creaProyecto '1234','Avengers Iniciative'

SELECT * FROM Proyectos

IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'modificaProyecto' AND type = 'P')
	DROP PROCEDURE modificaProyecto
GO

CREATE PROCEDURE modificaProyecto
	@uNumero numeric(5,0),
	@uDenominacion VARCHAR(50)
AS
	UPDATE Proyectos
	SET Denominacion=@uDenominacion
	WHERE Numero=@uNumero
GO

EXECUTE modificaProyecto 1234,'Parallax'

-----------------------------------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'eliminaProyecto' AND type = 'P')
	DROP PROCEDURE eliminaProyecto
GO

CREATE PROCEDURE eliminaProyecto
	@uNumero numeric(5,0)
AS
	DELETE FROM Proyectos
	WHERE Numero=@uNumero
GO

EXECUTE eliminaProyecto 1234
----------------------------------------------
----------------Entregan---------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'creaEntrega' AND type = 'P')
	DROP PROCEDURE creaEntrega
GO

CREATE PROCEDURE creaEntrega
	@uClave NUMERIC(5,0),
	@uRFC VARCHAR(13),
	@uNumero NUMERIC(5,0),
	@uFecha DATETIME,
	@uCantidad NUMERIC(8,2)
AS
	INSERT INTO Entregan VALUES(@uClave, @uRFC, @uNumero, @uFecha, @uCantidad)
GO
SET DATEFORMAT dmy
EXECUTE creaEntrega 5000,'FAAH990821',1234,'21/03/2019',420

SELECT * FROM Entregan

IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'modificaEntrega' AND type = 'P')
	DROP PROCEDURE modificaEntrega
GO

CREATE PROCEDURE modificaEntrega
	@uClave NUMERIC(5,0),
	@uRFC VARCHAR(13),
	@uNumero NUMERIC(5,0),
	@uFecha DATETIME,
	@uCantidad NUMERIC(8,2)
AS
	UPDATE Entregan
	SET Cantidad=@uCantidad
	WHERE Clave=@uClave AND RFC=@uRFC AND Numero=@uNumero AND Fecha=@uFecha
GO

EXECUTE modificaEntrega 5000,'FAAH990821',1234,'21/03/2019',124

-----------------------------------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'eliminaEntrega' AND type = 'P')
	DROP PROCEDURE eliminaEntrega
GO

CREATE PROCEDURE eliminaEntrega
	@uClave NUMERIC(5,0),
	@uRFC VARCHAR(13),
	@uNumero NUMERIC(5,0),
	@uFecha DATETIME
AS
	DELETE FROM Entregan
	WHERE Clave=@uClave AND RFC=@uRFC AND Numero=@uNumero AND Fecha=@uFecha
GO

EXECUTE eliminaEntrega 5000,'FAAH990821',1234,'21/03/2019'

----------------------------------------------------------
IF EXISTS (SELECT name FROM sysobjects
	WHERE name = 'queryMaterial' AND type = 'P')
	DROP PROCEDURE queryMaterial
GO

CREATE PROCEDURE queryMaterial
	@udescripcion VARCHAR(50),
	@ucosto NUMERIC(8,2)

AS
	SELECT * FROM Materiales WHERE descripcion
	LIKE '%'+@udescripcion+'%' AND costo > @ucosto
GO

EXECUTE queryMaterial 'Lad',20 