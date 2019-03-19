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






