-- Database: egressos_db 
-- Author: Adjamilton Junior (jr@ieee.org) 
-- Created on Sat May 25 01:12:26 2019

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
  nomeCompactado VARCHAR(48) DEFAULT NULL,
  nome VARCHAR(60) NOT NULL,
  email VARCHAR(60) UNIQUE DEFAULT NULL,
  avatar VARCHAR(18) UNIQUE DEFAULT NULL,
  curso VARCHAR(48) DEFAULT NULL,
  campus VARCHAR(32) DEFAULT NULL,
  egresso BOOL NOT NULL,
  linkedin VARCHAR(256) UNIQUE DEFAULT NULL,
  github VARCHAR(256) UNIQUE DEFAULT NULL,
  facebook VARCHAR(256) UNIQUE DEFAULT NULL,
  lattes VARCHAR(256) UNIQUE DEFAULT NULL,
  researchgate VARCHAR(256) UNIQUE DEFAULT NULL,
  twitter VARCHAR(256) UNIQUE DEFAULT NULL,
  instagram VARCHAR(256) UNIQUE DEFAULT NULL
);
