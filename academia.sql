-- ============================================================
-- Script SQL – Avaliação Academia
-- ============================================================

-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS academia
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE academia;

-- Criação da tabela Alunos
CREATE TABLE IF NOT EXISTS alunos (
    codigo      INT             NOT NULL AUTO_INCREMENT,
    nome        VARCHAR(100)    NOT NULL,
    plano       VARCHAR(50)     NOT NULL,
    mensalidade DECIMAL(10, 2)  NOT NULL,
    meses       INT             NOT NULL,
    PRIMARY KEY (codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserção de alunos de teste
INSERT INTO alunos (nome, plano, mensalidade, meses) VALUES
    ('Ana Paula',     'Musculação',    120.00, 12),
    ('Carlos Silva',  'Cross Training', 180.00,  6),
    ('Mariana Costa', 'Pilates',        220.00,  3);
