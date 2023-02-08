DROP DATABASE IF EXISTS ipsDB;
CREATE DATABASE ipsDB;
USE ipsDB;

CREATE TABLE direcciones_ip(
	ip_binaria varchar(255) PRIMARY KEY
);

CREATE TABLE direcciones_ip_bloqueadas(
	ip_binaria varchar(255) PRIMARY KEY
);

CREATE TABLE direcciones_ip_validas(
	ip_binaria varchar(255) PRIMARY KEY
);

INSERT INTO direcciones_ip(ip_binaria) VALUES ('1111.1111.1111.0000');
INSERT INTO direcciones_ip(ip_binaria) VALUES('1111.1111.0000.0000');
INSERT INTO direcciones_ip_bloqueadas(ip_binaria)VALUES('1111.1111.1111.0000');

SELECT ip_binaria
FROM direcciones_ip;

SELECT ip_binaria FROM direcciones_ip_bloqueadas;