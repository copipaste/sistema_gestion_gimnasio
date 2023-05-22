CREATE TABLE empleados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    cedula VARCHAR(100),
    telefono VARCHAR(20),
    direccion VARCHAR(100),
    email VARCHAR(50),
    especialidad_id INT,
    fecha_ingreso DATE,
    FOREIGN KEY (especialidad_id) REFERENCES especialidades(id) ON DELETE CASCADE ON UPDATE CASCADE
);
programa3programa3programa3programa2programa2programa3programa3especialidades