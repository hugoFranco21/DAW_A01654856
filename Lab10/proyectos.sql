BULK INSERT a1654856.a1654856.[Proyectos]
FROM 'e:\wwwroot\a1654856\proyectos.csv'
WITH 
(
	CODEPAGE = 'ACP',
	FIELDTERMINATOR = ',',
	ROWTERMINATOR = '\n'
)

SELECT * FROM Proyectos