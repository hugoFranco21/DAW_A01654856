BULK INSERT a1654856.a1654856.[Materiales]
FROM 'e:\wwwroot\a1654856\materiales.csv'
WITH 
(
	CODEPAGE = 'ACP',
	FIELDTERMINATOR = ',',
	ROWTERMINATOR = '\n'
)

SELECT * FROM Materiales