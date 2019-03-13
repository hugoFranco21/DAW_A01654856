SELECT * 
FROM materiales 

select * from materiales 
where clave=1000 

select clave,rfc,fecha from entregan

select * from materiales,entregan 
where materiales.clave = entregan.clave 

select * from entregan,proyectos 
where entregan.numero < = proyectos.numero 

(select * from entregan where clave=1450) 
union 
(select * from entregan where clave=1300) 

SELECT *
FROM Entregan
WHERE clave=1450 OR clave=1300

(select clave from entregan where numero=5001) 
intersect 
(select clave from entregan where numero=5018) 

(select * from entregan) 
minus 
(select * from entregan where clave=1000) 

SELECT *
FROM Entregan
WHERE clave<>1000

select * from entregan,materiales 

set dateformat dmy
SELECT DISTINCT M.descripcion
FROM Entregan E, Materiales M
WHERE E.Clave = M.Clave AND E.fecha > '31/12/1999' AND E.fecha < '01/01/2001'

SELECT P.Numero, P.Denominacion, E.Fecha, E.Cantidad
FROM Proyectos P, Entregan E
WHERE P.Numero=E.Numero
ORDER BY P.Numero,E.Fecha DESC

SELECT * FROM Materiales where Descripcion LIKE 'Si%' 

DECLARE @foo varchar(40); 
DECLARE @bar varchar(40); 
SET @foo = '¿Que resultado'; 
SET @bar = ' ¿¿¿??? ' 
SET @foo += ' obtienes?'; 
PRINT @foo + @bar; 

SELECT RFC FROM Entregan WHERE RFC LIKE '[A-D]%'; 
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%'; 
SELECT Numero FROM Entregan WHERE Numero LIKE '___6'; 

SELECT Clave,RFC,Numero,Fecha,Cantidad 
FROM Entregan 
WHERE Numero Between 5000 and 5010; 

SELECT RFC,Cantidad, Fecha,Numero 
FROM [Entregan] 
WHERE [Numero] Between 5000 and 5010 AND 
Exists ( SELECT [RFC] 
FROM [Proveedores] 
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] ) 

SELECT RFC,Cantidad, Fecha,Numero 
FROM [Entregan] 
WHERE [Numero] Between 5000 and 5010 AND 
RFC IN ( SELECT [RFC] 
FROM [Proveedores] 
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] ) 

SELECT RFC,Cantidad, Fecha,Numero 
FROM [Entregan] 
WHERE [Numero] Between 5000 and 5010 AND 
RFC NOT IN  ALL( SELECT [RFC] 
FROM [Proveedores] 
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] ) 