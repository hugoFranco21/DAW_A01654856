INSERT INTO Materiales values(1000,'xxx',1000)

SELECT * FROM Entregan

DELETE FROM Materiales
WHERE clave = 1000 AND Costo = 1000

ALTER Table Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

INSERT INTO Materiales values(1000,'xxx',1000)

sp_helpconstraint Proyectos

ALTER Table Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER Table Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

ALTER Table Entregan add constraint llaveEntregan PRIMARY KEY (Clave,RFC,Numero, Fecha)

sp_helpconstraint Entregan

--ALTER TABLE Entregan drop constraint llaveEntreganPri

--SELECT * FROM Entregan WHERE clave = 1000