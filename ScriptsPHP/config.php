<?php
    $host = 'localhost';
    $db = 'y2k';
    $user = 'admin';
    $pass = 'admin123';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erro na conexão: ' . $e->getMessage();
    }
?>
