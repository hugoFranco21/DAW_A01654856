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

SELECT E.RFC, Cantidad, Fecha, Numero
FROM Entregan E, Proveedores P
WHERE RazonSocial LIKE 'LA%' AND E.RFC = P.RFC AND
Numero NOT IN(SELECT Numero
FROM Entregan 
WHERE Numero < 5000 or Numero > 5010)

SELECT DISTINCT RFC
FROM Entregan
WHERE Numero = ANY(
SELECT Numero 
FROM Proyectos) 

SELECT TOP 2 * FROM Proyectos 

SELECT TOP 1 Numero FROM Proyectos

ALTER TABLE materiales ADD PorcentajeImpuesto NUMERIC(6,2);

UPDATE materiales SET PorcentajeImpuesto = 2*clave/1000;

SELECT * 
FROM Entregan

SELECT Descripcion, Cantidad+(Cantidad*0.01*PorcentajeImpuesto) as 'Monto'
FROM Entregan, Materiales
WHERE Entregan.Clave=Materiales.Clave

CREATE VIEW Primeros_dos
as select TOP 2 * from Proyectos

SELECT * FROM Primeros_dos

CREATE VIEW Mat_si
as SELECT * FROM Materiales where Descripcion LIKE 'Si%' 

SELECT * FROM Mat_si

CREATE VIEW Costos
as SELECT Descripcion, Cantidad+(Cantidad*0.01*PorcentajeImpuesto) as 'Monto'
FROM Entregan, Materiales
WHERE Entregan.Clave=Materiales.Clave

SELECT * FROM Costos

CREATE VIEW Descripciones2000
AS SELECT DISTINCT M.descripcion
FROM Entregan E, Materiales M
WHERE E.Clave = M.Clave AND E.fecha > '31/12/1999' AND E.fecha < '01/01/2001'

SELECT * FROM Descripciones2000

CREATE VIEW EnP0_10
AS SELECT Clave,RFC,Numero,Fecha,Cantidad 
FROM Entregan 
WHERE Numero Between 5000 and 5010

SELECT * FROM EnP0_10

SELECT M.Clave, Descripcion
FROM Materiales M, Entregan E
WHERE M.clave = E.clave AND Numero IN
(SELECT Numero
FROM Proyectos
WHERE Denominacion='Mexico sin ti no estamos completos')

SELECT M.Clave, Descripcion
FROM Materiales M, Entregan E
WHERE M.clave = E.clave AND RFC IN
(SELECT RFC
FROM Proveedores
WHERE RazonSocial='Acme tools')

SELECT RFC
FROM Entregan
WHERE fecha between '01/01/2000' AND '31/12/2000'
GROUP BY RFC
HAVING AVG(Cantidad) >= 300

SELECT M.Descripcion, SUM(Cantidad) as 'Total'
FROM Entregan E, Materiales M
WHERE fecha between '01/01/2000' AND '31/12/2000' AND E.Clave=M.Clave
GROUP BY M.Descripcion

SELECT Clave
FROM Materiales
WHERE Clave IN (
SELECT TOP 1 Clave
FROM Entregan
WHERE FECHA between '01/01/2001' AND '31/12/2001'
GROUP BY Clave
ORDER BY SUM(Cantidad) DESC
)


SELECT TOP 1 Clave, Sum(Cantidad) as 'Unidades vendidas'
FROM Entregan
WHERE FECHA between '01/01/2001' AND '31/12/2001'
GROUP BY Clave 
ORDER BY Sum(Cantidad) DESC

SELECT * 
FROM Materiales
WHERE Descripcion LIKE '%ub%'

SELECT Denominacion, SUM(Costo*Cantidad+Costo*Cantidad*0.01*PorcentajeImpuesto) as 'Total a pagar'
FROM Entregan E, Proyectos P, Materiales M
WHERE E.Clave=M.Clave AND P.Numero=E.Numero
GROUP BY denominacion

CREATE VIEW ApoyoTelevisa
AS SELECT DISTINCT Denominacion, E.RFC, RazonSocial
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Televisa en acción'

CREATE VIEW ApoyoCoahuila
AS SELECT DISTINCT Denominacion, E.RFC, RazonSocial
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Educando en Coahuila'

SELECT *
FROM ApoyoTelevisa 
WHERE RFC NOT IN (
SELECT RFC
FROM ApoyoCoahuila)

SELECT DISTINCT Denominacion, E.RFC, RazonSocial
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Televisa en acción' AND E.RFC NOT IN
(SELECT DISTINCT E.RFC
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Educando en Coahuila')

SELECT DISTINCT Descripcion, Costo
FROM Proyectos P, Entregan E, Materiales M, Proveedores Pr
WHERE E.Clave=M.Clave AND P.Numero=E.Numero AND Pr.RFC=E.RFC AND Denominacion='Televisa en acción' AND E.RFC IN
(SELECT DISTINCT E.RFC
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Educando en Coahuila')

SELECT DISTINCT Descripcion, Costo
FROM Proyectos P, Entregan E, Materiales M, Proveedores Pr
WHERE E.Clave=M.Clave AND P.Numero=E.Numero AND Pr.RFC=E.RFC AND Denominacion='Televisa en acción' AND E.RFC NOT IN
(SELECT E.RFC
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND E.RFC NOT IN (
SELECT E.RFC
FROM Proveedores P, Proyectos Pr, Entregan E
WHERE E.RFC=P.RFC AND Pr.Numero=E.Numero AND Denominacion='Educando en Coahuila'))

CREATE VIEW NumEntregasC
AS SELECT Materiales.Clave, count(fecha) as 'Numero de Entregas'
FROM Materiales, Entregan
WHERE Materiales.Clave=Entregan.Clave
GROUP BY Materiales.Clave

CREATE VIEW MaterialEntregado
AS SELECT Clave, sum(Cantidad) as 'Cantidad Total'
FROM Entregan 
GROUP BY Clave

CREATE VIEW PagoMaterial
AS SELECT Q.Clave, ([Cantidad Total]*Costo+[Cantidad Total]*Costo*0.01*PorcentajeImpuesto) as 'Total a Pagar'
FROM Materiales M, MaterialEntregado Q
WHERE Q.Clave=M.Clave

SELECT Descripcion, [Numero de Entregas], [Total a pagar]
FROM NumEntregasC NC, PagoMaterial P, Materiales M
WHERE M.Clave=P.Clave AND M.Clave=NC.Clave
ORDER BY Descripcion
