SET DATEFORMAT dmy
SELECT SUM(Cantidad) as 'Total Vendido', SUM(Cantidad*Costo + Cantidad*Costo*0.01*PorcentajeImpuesto) as 'Monto'
FROM Entregan E, Materiales M
WHERE E.Clave=M.Clave AND E.Fecha BETWEEN '01/01/1997' AND '31/12/1997'

SELECT RazonSocial, count(Fecha) as 'Numero de entregas', SUM(Cantidad*Costo + Cantidad*Costo*0.01*PorcentajeImpuesto) as 'Monto'
FROM Entregan, Materiales, Proveedores
WHERE Entregan.Clave=Materiales.Clave AND Entregan.RFC=Proveedores.RFC
GROUP BY RazonSocial

CREATE VIEW InfoMateriales
as SELECT E.Clave as 'Clave', M.Descripcion as 'Descripcion', sum(Cantidad) as 'Total Vendido', min(Cantidad) as 'Venta Minima', max(Cantidad) as 'Venta maxima', count(fecha) as 'Veces Entregado'
FROM Entregan E, Materiales M
WHERE E.Clave=M.Clave
GROUP BY E.Clave, Descripcion

SELECT DISTINCT I.Clave, I.Descripcion, [Total Vendido], [Venta Minima], [Venta maxima], ([Total Vendido]*Costo+[Total Vendido]*Costo*0.01*PorcentajeImpuesto) as 'Monto'
FROM InfoMateriales I, Materiales M, Entregan E
WHERE [Total Vendido]/[Veces Entregado] > 400 AND I.Clave=M.Clave AND M.Clave=E.Clave

CREATE VIEW MatProm 
AS SELECT RFC, Clave, avg(Cantidad) as 'Cantidad Promedio'
FROM Entregan
GROUP BY Clave,RFC

SELECT P.RazonSocial, MP.Clave, M.Descripcion
FROM MatProm MP, Materiales M, Proveedores P
WHERE MP.Clave=M.Clave AND MP.RFC=P.RFC AND [Cantidad Promedio] > 450
UNION
SELECT P.RazonSocial, MP.Clave, M.Descripcion
FROM MatProm MP, Materiales M, Proveedores P
WHERE MP.Clave=M.Clave AND MP.RFC=P.RFC AND [Cantidad Promedio] < 370

SELECT *
FROM Materiales

INSERT INTO Materiales(Clave,Descripcion,Costo,PorcentajeImpuesto)
VALUES(1440,'Tubo PVC', 30, 3)

INSERT INTO Materiales(Clave,Descripcion,Costo,PorcentajeImpuesto)
VALUES(1450,'Yeso', 100, 3.1)

INSERT INTO Materiales(Clave,Descripcion,Costo,PorcentajeImpuesto)
VALUES(1460,'Tablaroca', 452, 3.2)

INSERT INTO Materiales(Clave,Descripcion,Costo,PorcentajeImpuesto)
VALUES(1470,'Plastico', 315, 3.3)

INSERT INTO Materiales(Clave,Descripcion,Costo,PorcentajeImpuesto)
VALUES(1480,'Metal', 262, 3.4)

SELECT Clave, Descripcion
FROM Materiales 
WHERE Clave NOT IN
(SELECT Clave FROM Entregan)

SELECT RazonSocial
FROM Proveedores
WHERE RFC IN
(SELECT RFC 
FROM Entregan E, Proyectos P
WHERE E.Numero=P.Numero AND P.Denominacion='Vamos Mexico')
AND RFC IN 
(SELECT RFC 
FROM Entregan E, Proyectos P
WHERE E.Numero=P.Numero AND P.Denominacion='Queretaro limpio')

SELECT Descripcion 
FROM Materiales
WHERE Clave NOT IN(
SELECT Clave 
FROM Entregan E, Proyectos P
WHERE E.Numero=P.Numero AND P.Denominacion='CIT Yucatan')

SELECT * FROM Proyectos

SELECT P.RazonSocial, avg(Cantidad) as 'Cantidad Promedio'
FROM Entregan E, Proveedores P
WHERE P.RFC=E.RFC
GROUP BY RazonSocial
HAVING avg(Cantidad) >
(SELECT avg(Cantidad)
FROM Entregan
WHERE RFC='VAGO780901'
GROUP BY RFC)

SELECT * FROM Proveedores

CREATE VIEW Cant2000
AS SELECT E.RFC as 'RFC', RazonSocial, sum(Cantidad) as 'Ventas Totales'
FROM Entregan E, Proveedores P
WHERE E.RFC=P.RFC AND fecha BETWEEN '01/01/2000' AND '31/12/2000'
GROUP BY E.RFC, RazonSocial

CREATE VIEW Cant2001
AS SELECT E.RFC as 'RFC', RazonSocial, sum(Cantidad) as 'Ventas Totales'
FROM Entregan E, Proveedores P
WHERE E.RFC=P.RFC AND fecha BETWEEN '01/01/2001' AND '31/12/2001'
GROUP BY E.RFC, RazonSocial

CREATE VIEW May00
AS SELECT C.RFC  AS 'RFC'
FROM Cant2000 C, Cant2001 D
WHERE C.RFC=D.RFC AND C.[Ventas Totales] > D.[Ventas Totales]

SELECT P.RFC, RazonSocial
FROM Proveedores P, Entregan E, Proyectos Pr
WHERE P.RFC=E.RFC AND E.Numero=Pr.Numero AND Pr.Denominacion='Infonavit Durango' AND E.RFC IN
(SELECT RFC FROM May00)