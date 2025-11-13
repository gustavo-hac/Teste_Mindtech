<?php  

function createUser($email): bool{
  require_once('conection.php');

  $succes = false;
  $pdoStatement = $pdo->prepare(query: "INSERT INTO usuarios(email, inscrito) VALUES(:email, :inscrito)");

  $pdoStatement->bindValue(param: 'email', value: $email, type: PDO::PARAM_STR);
  $pdoStatement->bindValue(param: 'inscrito', value: 1, type: PDO::PARAM_INT);
  
  try {
      $pdo->beginTransaction();

      $pdoStatement->execute();

      if($pdoStatement->rowCount() > 0){
          $pdo->commit();
          $succes = true;
      }else{
          $pdo->rollBack();
          $variaveis_da_pagina['repostas']['erro_de_formulario'] = 'Erro ao inserir conta!';
      }
  } catch (Throwable $th) {
      $pdo->rollBack();
      $variaveis_da_pagina['repostas']['erro_de_formulario'] = 'Erro de SQL';
  }

  $pdoStatement->closeCursor();
  return $succes;
}

function deleteUser($email): bool{
  require_once('conection.php');

  $succes = false;
  $pdoStatement = $pdo->prepare(query: "DELETE FROM usuarios WHERE email = :email");

  $pdoStatement->bindValue(param: 'email', value: $email, type: PDO::PARAM_STR);

  try {
      $pdo->beginTransaction();

      $pdoStatement->execute();

      if($pdoStatement->rowCount() > 0){
          $pdo->commit();
          $succes = true;
      }else{
          $pdo->rollBack();
      }
  } catch (Throwable $th) {
      $pdo->rollBack();
  }

  $pdoStatement->closeCursor();
  return $succes;
}

function updateUser($email, $inscrito): bool{
  $pdo = new PDO(dsn: "mysql:host=localhost;dbname=newslleter_mindtech_ghac;charset=utf8", username: "root", password: "");
  $succes = false;
  $pdoStatement = $pdo->prepare(query: "UPDATE usuarios SET inscrito = :inscrito WHERE email = :email");

  $pdoStatement->bindValue(param: ':email', value: $email, type: PDO::PARAM_STR);
  $pdoStatement->bindValue(param: ':inscrito', value: $inscrito, type: PDO::PARAM_INT);

  try {
      $pdo->beginTransaction();

      $pdoStatement->execute();

      if($pdoStatement->rowCount() > 0){
          $pdo->commit();
          $succes = true;
      }else{
          $pdo->rollBack();
      }
  } catch (Throwable $th) {
      $pdo->rollBack();
  }

  $pdoStatement->closeCursor();
  return $succes;
}

function selectUser($email): bool{
  require_once('conection.php');

  $pdoStatement = $pdo->prepare(query: "SELECT 1 FROM usuarios WHERE email = :email LIMIT 1");

  $pdoStatement->bindValue(param: 'email', value: $email, type: PDO::PARAM_STR);

  try {
      $pdoStatement->execute();
      return (bool) $pdoStatement->fetchColumn();
  } catch (Throwable $th) {
    $pdoStatement->closeCursor();
    return false;
  }
}

function selectSubUser($email): bool{
  require_once('conection.php');
  $succes = false;
  $pdoStatement = $pdo->prepare(query: "SELECT FROM usuarios WHERE email = :email AND inscrito = 1");

  $pdoStatement->bindValue(param: 'email', value: $email, type: PDO::PARAM_STR);

  try {
      $pdo->beginTransaction();

      $pdoStatement->execute();

      if($pdoStatement->rowCount() > 0){
          $pdo->commit();
          $succes = true;
      }else{
          $pdo->rollBack();
      }
  } catch (Throwable $th) {
      $pdo->rollBack();
  }

  $pdoStatement->closeCursor();
  return $succes;
}

function selectUnubUser($email): bool{
  require_once('conection.php');
  $succes = false;
  $pdoStatement = $pdo->prepare(query: "SELECT FROM usuarios WHERE email = :email AND inscrito = 0");

  $pdoStatement->bindValue(param: 'email', value: $email, type: PDO::PARAM_STR);

  try {
      $pdo->beginTransaction();

      $pdoStatement->execute();

      if($pdoStatement->rowCount() > 0){
          $pdo->commit();
          $succes = true;
      }else{
          $pdo->rollBack();
      }
  } catch (Throwable $th) {
      $pdo->rollBack();
  }

  $pdoStatement->closeCursor();
  return $succes;
}
?>