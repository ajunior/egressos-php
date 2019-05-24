CREATE DATABASE egressos_db;

USE egressos_db;

CREATE TABLE IF NOT EXISTS users (
  user_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(48) NOT NULL UNIQUE,
  passwd VARCHAR(256) NOT NULL
);

INSERT INTO users 
  VALUES (DEFAULT, 'jr@ieee.org', md5('12345')),
		 (DEFAULT, 'adjamilton.junior@academico.ifpb.edu.br', md5('ifpb'));

CREATE TABLE IF NOT EXISTS egressos (
  id VARCHAR(12) NOT NULL PRIMARY KEY,
  nomeCompactado VARCHAR(32),
  nome VARCHAR(60) NOT NULL,
  email VARCHAR(48) NOT NULL UNIQUE,
  avatar VARCHAR(18) UNIQUE,
  curso VARCHAR(48),
  campus VARCHAR(32),
  egresso BOOL NOT NULL,
  linkedin VARCHAR(256) UNIQUE,
  github VARCHAR(256) UNIQUE,
  facebook VARCHAR(256) UNIQUE,
  lattes VARCHAR(256) UNIQUE,
  researchgate VARCHAR(256) UNIQUE,
  twitter VARCHAR(256) UNIQUE,
  instagram VARCHAR(256) UNIQUE
);

