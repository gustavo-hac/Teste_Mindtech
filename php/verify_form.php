<?php

global $op;

if (isset($_POST['subscribe'])){
  subcribe_user();
  header("location: ../index.php?op=$op");
}
if (isset($_POST['unsubscribe'])){
  unsubcribe_user();
  header("location: ../index.php?op=$op");
}
function subcribe_user(){
  global $op;
  if (email_is_valid()){
    require_once '../assets/dataBase/manage_users.php';
    if (createUser(email: $_POST['email'])){                  // Cadastrado com Sucesso
      $op=0;
      header("location: ../pages/confirm.html");
    }else {                                                   
      updateUser(email: $_POST['email'], inscrito: 1);       // Já existia                                      
      $op=0;
    }
  }
}
function unsubcribe_user(){
  global $op;
  if (email_is_valid()){
    require_once '../assets/dataBase/manage_users.php';
    if (selectUser(email: $_POST['email'])){
      $op=6;    
      updateUser(email: $_POST['email'], inscrito: 0);        // Descadastrado com Sucesso
    }else {
      $op=7;                                                  // Usuário não existe
    }
  }
}

function email_is_valid(): bool{ // Verifica se é um email válido OBS: Faltou o Regex do email.
  global $op;
  if (isset($_POST['email'])){
  if ( (strlen($_POST['email']) < 255) && (strlen($_POST['email']) > 5) ){
    return true;
    // require_once '../assets/dataBase/manage_users.php';

    // if (createUser(email: $_POST['email'])){                  // Sucesso
    //   $op=0;
    //   header("location: ../pages/confirm.html");
    // }else {                                                   // Já existe
    //   $op=5;
    //  //  header("location: ../index.php?op=$op");   
    // }
  }
  else {
    if ( (strlen($_POST['email']) > 255)){            // Maior que 255
      $op=4;
      //  header("location: ../index.php?op=$op");
      return false;     
    }
    else {                                                    
      if ((strlen($_POST['email'])) != 0) {           // Menor que 5  
        $op=3;                 
        //  header("location: ../index.php?op=$op");     
        return false;                                  
      }
      else {                                                  // Variável Vazia
        $op=2; 
        //  header("location: ../index.php?op=$op");  
        return false;                                           
      }
    }
  }
  }else {                                                       // Campo Vazio
    $op=1;
    //  header("location: ../index.php?op=$op");
    return false;
  }
}

die();
?>