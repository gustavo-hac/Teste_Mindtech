<?php 
try {
    $pdo = new PDO(dsn: "mysql:host=localhost;dbname=newslleter_mindtech_ghac;charset=utf8", username: "root", password: "");
} catch(PDOException $e) {
    echo('Erro ao conectar com o banco de dados');
    echo($e->getMessage());
    die();
}
// echo('Conected to: newslleter_mindtech_ghac');
?>