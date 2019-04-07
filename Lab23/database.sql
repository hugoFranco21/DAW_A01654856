CREATE TABLE Fruit(
  id_fruit int NOT NULL AUTO_INCREMENT,
  name varchar(40),
  units numeric(4,0),
  quantity numeric(4,0),
  price numeric(5,2),
  country varchar(40),
  CONSTRAINT pk_idfruit PRIMARY KEY (id_fruit)
)
