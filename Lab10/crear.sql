CREATE TABLE Materiales
(
  Clave numeric(5),
  Descripcion varchar(50),
  Costo numeric(8,2)
)

CREATE TABLE Proveedores
(
  RFC varchar(13),
  RazonSocial varchar(50)
)

CREATE TABLE Proyectos
(
  Numero numeric(5),
  Denominacion varchar(50)
)

CREATE TABLE Entregan
(
  Clave numeric(5),
  RFC varchar(13),
  Numero numeric(5),
  Fecha DATETIME,
  Cantidad numeric(8,2)
)
