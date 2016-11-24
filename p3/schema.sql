/************************
*		SQL Schema		*
*		Grupo 19		*
*************************/

/* TO-DO
		NOT NULLS?
		UNIQUE PKS?
		DATE vs. DATETIME vs. TIMESTAMP -- triple threat
		NUMERIC SIZE?? LIMITAR NA APP vs LIMITAR NA BD
*/

CREATE TABLE User (
    nif INT,
    nome VARCHAR(255),
    telefone INT,
    PRIMARY KEY (nif)
);

CREATE TABLE Fiscal (
    id INT,
    empresa VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE Edificio (
    morada VARCHAR(255),
    PRIMARY KEY (morada)
);

CREATE TABLE Alugavel (
	morada VARCHAR(255),
	codigo INT,
	foto VARCHAR(255),
	PRIMARY KEY (morada, codigo),
	FOREIGN KEY (morada) REFERENCES Edificio(morada)
);

CREATE TABLE Arrenda (
	morada VARCHAR(255),
	codigo INT,
	nif INT,
	PRIMARY KEY (morada, codigo),
	FOREIGN KEY (morada, codigo) REFERENCES Alugavel(morada, codigo),
	FOREIGN KEY (nif) REFERENCES User(nif)
);

CREATE TABLE Fiscaliza (
	id INT,
	morada VARCHAR(255),
	codigo INT,
	PRIMARY KEY (id, morada, codigo),
	FOREIGN KEY (id) REFERENCES Fiscal(id),
	FOREIGN KEY (morada, codigo) REFERENCES Arrenda(morada, codigo)
);

CREATE TABLE Espaco (
	morada VARCHAR(255),
	codigo INT,
	PRIMARY KEY (morada, codigo),
	FOREIGN KEY (morada, codigo) REFERENCES Alugavel(morada, codigo)
);

CREATE TABLE Posto (
	morada VARCHAR(255),
	codigo INT,
	codigo_espaco INT,
	PRIMARY KEY (morada, codigo),
	FOREIGN KEY (morada, codigo) REFERENCES Alugavel(morada, codigo),
	FOREIGN KEY (morada, codigo_espaco) REFERENCES Espaco(morada, codigo)
);

CREATE TABLE Oferta (
	morada VARCHAR(255),
	codigo INT,
	data_inicio DATE,
	data_fim DATE,
	tarifa NUMERIC(12, 2),
	PRIMARY KEY (morada, codigo, data_inicio),
	FOREIGN KEY (morada, codigo) REFERENCES Alugavel(morada, codigo)
);

CREATE TABLE Reserva (
	numero INT,
	PRIMARY KEY (numero)
);

CREATE TABLE Aluga (
	morada VARCHAR(255),
	codigo INT,
	data_inicio DATE,
	nif INT,
	numero INT,
	PRIMARY KEY (morada, codigo, data_inicio, nif, numero),
	FOREIGN KEY (morada, codigo, data_inicio) REFERENCES Oferta(morada, codigo, data_inicio),
	FOREIGN KEY (nif) REFERENCES User(nif),
	FOREIGN KEY (numero) REFERENCES Reserva(numero)
);

CREATE TABLE Paga (
	numero INT,
	data DATE,
	metodo VARCHAR(255),
	PRIMARY KEY (numero),
	FOREIGN KEY (numero) REFERENCES Reserva(numero)
);

CREATE TABLE Estado (
	numero INT,
	time_stamp TIMESTAMP,
	estado VARCHAR(255),
	PRIMARY KEY (numero, time_stamp),
	FOREIGN KEY (numero) REFERENCES Reserva(numero)
);

