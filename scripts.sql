CREATE TABLE empleado (
    id int primary key not null AUTO_INCREMENT,
    fecha_ingreso date not null,
    nombre varchar(50) not null,
    salario numeric(10.5) not null
);

CREATE TABLE solicitud (
    id int primary key not null AUTO_INCREMENT,
    codigo varchar(50) not null,
    descripcion varchar(50) not null,
    resumen varchar(50) not null,
    id_empleado int not null
);

ALTER TABLE solicitud ADD FOREIGN KEY (id_empleado) REFERENCES empleado (id);