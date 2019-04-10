CREATE TABLE entregas(
  id int NOT NULL AUTO_INCREMENT,
  producto varchar(40),
  nombre_cliente varchar(50),
  numero_calle varchar(30),
  calle varchar(40),
  ciudad varchar(40),
  estado varchar(40),
  postal numeric(5,0),
  nombre_repartidor varchar(50),
  fecha_hora timestamp,
  CONSTRAINT pk_id PRIMARY KEY (id)
)
