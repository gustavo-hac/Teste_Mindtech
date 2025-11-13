<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Newsletter Mindtech</title>
</head>
<body>
  <main>
    <section>
      <h1>
        Inscreva-se agora!
        <a href="./pages/confirm.html"> Teste de página</a>
      </h1>
      <p>
        Preencha o formulário abaixo para se inscrever e comece a receber nossas atualizações diretamente em sua caixa de entrada.
      </p>
      <div class="topic">
        <div class="topic_check"></div>
        <p><b>Guias e Tutorias:</b> Aprenda como implementar e otimizar soluções de IoT para sua empresa.</p>
      </div>
      <div class="topic">
        <div class="topic_check"></div>
        <p><b>Notícias e Tendências:</b> Fique por dentro das últmas novidades e avanços no mundo de IoT</p>
      </div>
      <div class="topic">
        <div class="topic_check"></div>
        <p><b>Ofertas e Promoções:</b> Receba ofertas especiais e promoções exclusivas para assinaturas da nossa newsletter</p>
      </div>
      <form class="form_subscribe" action="./php/verify_form.php" method="post">
        <div class="form_area">
          <label for="email">E-mail</label>
          <input id="input_email" name="email" type="email" placeholder="email@email.com" aria-label="E-mail para inscrição" maxlength="255">
        </div>
        <button type="submit" id="form_button_sub" name="subscribe" value="Inscrever">Inscrever-se</button>
        <button type="submit" id="form_button_unsub" name="unsubscribe" value="Desinscrever">Desinscrever</button>
        <span>
          <?php 
            if (isset($variaveis_da_pagina['email_error'])){
              echo($variaveis_da_pagina['email_error']);
            }
          ?> 
        </span>
      </form>
    </section>
    <div id="iot_image_area">
      <img id="iot_image"src="assets/images/Imagem.png" alt="Ícone do IoT">
    </div>
  </main>
</body>
</html>