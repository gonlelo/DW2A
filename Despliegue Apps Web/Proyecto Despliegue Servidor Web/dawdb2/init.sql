ALTER USER 'root'@'localhost' IDENTIFIED BY '';

CREATE DATABASE IF NOT EXISTS basecita;
ALTER DATABASE basecita CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE basecita;

CREATE TABLE IF NOT EXISTS mejoresPalabrasSinTilde (
    id INT AUTO_INCREMENT PRIMARY KEY,
    palabra VARCHAR(50) NOT NULL,
    observaciones VARCHAR(100) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mejoresPalabrasSinTilde (palabra, observaciones) VALUES 
('Analfabeto', 'Palabra bonita, elegante y apta como insulto poderoso.'),
('Cantimplora', 'Las palabras que describen utensilios mundanos siempre son inmejorables'),
('Pato', 'Sin observaciones relevantes');