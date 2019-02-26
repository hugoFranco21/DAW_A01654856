BULK INSERT a1654856.a1654856.[Proveedores]
FROM 'e:\wwwroot\a1654856\proveedores.csv'
WITH 
(
	CODEPAGE = 'ACP',
	FIELDTERMINATOR = ',',
	ROWTERMINATOR = '\n'
)

SELECT * FROM Proveedores