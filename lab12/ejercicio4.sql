INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0); 

SELECT * FROM Entregan WHERE Cantidad = 0

DELETE FROM Entregan WHERE Cantidad = 0

ALTER TABLE Entregan add constraint cantidad check (Cantidad > 0)

sp_helpconstraint Entregan
sp_helpconstraint Proveedores
sp_helpconstraint Materiales
sp_helpconstraint Proyectos