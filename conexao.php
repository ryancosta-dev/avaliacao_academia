<?php

/**
 * Conexão com o banco de dados academia via PDO.
 */

$host   = 'localhost';
$dbname = 'academia';
$user   = 'root';
$pass   = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    // Encerra a execução e exibe mensagem de erro amigável
    die('<p style="color:red;">Erro ao conectar ao banco de dados: ' . $e->getMessage() . '</p>');
}
