CREATE DATABASE sistema_pj;

USE sistema_pj;

CREATE TABLE setor(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
);

CREATE TABLE engenharia(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(200) NOT NULL
);

CREATE TABLE associado(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	login VARCHAR(30) NOT NULL,
	senha VARCHAR(30) NOT NULL,
	id_setor INT NOT NULL,
	id_engenharia INT NOT NULL,
	FOREIGN KEY (id_setor) REFERENCES setor (id),
	FOREIGN KEY (id_engenharia) REFERENCES engenharia (id)
);

CREATE TABLE historicoassociado(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	datadesassociacao DATE DEFAULT (CURRENT_DATE),
	id_setor INT NOT NULL,
	id_engenharia INT NOT NULL,
	FOREIGN KEY (id_setor) REFERENCES setor (id),
	FOREIGN KEY (id_engenharia) REFERENCES engenharia (id)
);

CREATE TABLE grupousuario(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL
);

CREATE TABLE permissao(
	id INT PRIMARY KEY AUTO_INCREMENT,
	codigo INT NOT NULL,
	nome VARCHAR(200)
);

CREATE TABLE permissao_grupousuario(
	id_permissao INT NOT NULL,
	id_grupousuario INT NOT NULL,
	FOREIGN KEY (id_permissao) REFERENCES permissao (id),
	FOREIGN KEY (id_grupousuario) REFERENCES grupousuario (id)
);

CREATE TABLE tipofalta(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL
);

CREATE TABLE motivofalta(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	peso FLOAT,
	id_tipofalta INT NOT NULL,
	FOREIGN KEY (id_tipofalta) REFERENCES tipofalta (id)
);

CREATE TABLE falta(
	id INT PRIMARY KEY AUTO_INCREMENT,
	data DATE DEFAULT (CURRENT_DATE),
	id_motivofalta INT,
	FOREIGN KEY (id_motivofalta) REFERENCES motivofalta (id)
);
