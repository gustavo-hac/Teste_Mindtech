<?php

// $_POST['sucess'] = false;
global $variaveis_da_pagina;
$variaveis_da_pagina = 
[
  'email_error' => null,
  'form_error' => null,
  'sql_error' => null
];

if (isset($_GET['op'])){
  switch ($_GET['op']) {
    case 0:
      header("location: ./pages/confirm.html");
    case 1:
      $variaveis_da_pagina['email_error'] = 'Erro na requisição';
      break;
    case 2:
      $variaveis_da_pagina['email_error'] = 'Escreva seu e-mail';
      break;
    case 3:
      $variaveis_da_pagina['email_error'] = 'E-mail precisam ter mais do que 5 caracteres';
      break;
    case 4:
      $variaveis_da_pagina['email_error'] = 'E-mail precisa ter menos do que 255 caracteres';
      break;
    case 5:
      $variaveis_da_pagina['email_error'] = 'E-mail já está cadastrado';
      break;
    case 6:
      $variaveis_da_pagina['email_error'] = 'E-mail descadastrado'; // Talvez seria melhor nem falar nada
      break;
    case 7:
      $variaveis_da_pagina['email_error'] = 'E-mail não existe'; // Talvez seria melhor nem falar nada
      break;
    default:
      // echo("algo");
      break;
  }
}

require_once './pages/index.php';
// require_once './pages/index.php';
// if (isset($_GET['sucess'])){
//   if ($_GET['sucess'] == true){
//     require_once './pages/confirm.html';
//   }
//   else {
//     require_once './pages/home_error.html';
//   }
// }else{
//     require_once './pages/index.php';
// }
?>