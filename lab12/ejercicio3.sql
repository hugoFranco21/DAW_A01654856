SELECT * from Materiales
SELECT * from Proveedores
SELECT * from Proyectos
SELECT * from Entregan

INSERT INTO Entregan values (0, 'xxx', 0, '1-jan-02', 0) 

Delete from Entregan where Clave = 0 

ALTER TABLE Entregan add constraint cfentreganclave 
  foreign key (Clave) references Materiales(Clave); 

ALTER TABLE Entregan add constraint cfentreganrfc 
  foreign key (RFC) references Proveedores(RFC); 

ALTER TABLE Entregan add constraint cfentregannumero 
  foreign key (Numero) references Proyectos(Numero); 

sp_helpconstraint Entregan