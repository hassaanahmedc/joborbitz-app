<?php
    $host = '127.0.0.1';
    $data = 'job_orbitz';
    $user = 'root';
    $pass = '123456789';
    $chrs = 'utf8mb4';
    $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
    $opts = 
    [
        PDO:: ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION,
        PDO:: ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
        PDO:: ATTR_EMULATE_PREPARES      => false,
    ];  

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    
?>