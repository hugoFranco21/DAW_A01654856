CREATE TABLE Lugar(
	nombre varchar(50),
	descripcion varchar(100),
	CONSTRAINT pk_lugar PRIMARY KEY (nombre)
)

CREATE TABLE Tipo(
	denominacion varchar(50),
	descripcion varchar(100),
	CONSTRAINT pk_tipo PRIMARY KEY (denominacion)
)


CREATE TABLE Incidentes(
    id_incidente int NOT NULL AUTO_INCREMENT,
	fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    nombre varchar(50),
    denominacion varchar(50),
    constraint pk_id PRIMARY KEY (id_incidente),
	constraint fk_lugar FOREIGN KEY (nombre) REFERENCES Lugar(nombre),
	constraint fk_tipo FOREIGN KEY (denominacion) REFERENCES Tipo(denominacion)
)
