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

