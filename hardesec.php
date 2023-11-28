<?php
//Hardesec - Hardening Web Server Security - By Ricardo Longatto
//Objective: Protects the Web Server (Apache) against web fuzzing and brute forcing of files and directories

  // Define um tamanho mínimo e máximo para a resposta
  $tamanhoMinimo = 100;
  $tamanhoMaximo = 1000;

  // Gera um tamanho aleatório entre o mínimo e o máximo
  $tamanhoResposta = rand($tamanhoMinimo, $tamanhoMaximo);

  // Gera uma string com caracteres aleatórios com o tamanho da resposta
  $resposta = '';
  for ($i = 0; $i < $tamanhoResposta; $i++) {
    // Adiciona um caracter aleatório (pode ser qualquer caractere válido)
    $resposta .= chr(rand(32, 126));
  }

  // Quebra a resposta em linhas de forma aleatória de 1 a 25
  $respostaQuebrada = wordwrap($resposta, rand(1, 25), "\n", true);

  // Array de títulos aleatórios
  $titulos = array("200 OK", "403 Forbidden", "301 Moved Permanently", "404 Not Found");

  // Seleciona um título aleatório
  $tituloAleatorio = $titulos[array_rand($titulos)];

  // Configura o cabeçalho da resposta com o código de status
  header('HTTP/1.1 ' . $tituloAleatorio);

  // Configura o tipo de conteúdo da resposta (pode ser qualquer tipo de conteúdo válido)
  header('Content-Type: text/html');

  // Configurar o tamanho da resposta
  header('Content-Length: ' . strlen($respostaQuebrada));

  // Exibe o cabeçalho do documento HTML
  echo "<!DOCTYPE html>
<html>
<head>
  <title>" . $tituloAleatorio . "</title>
</head>
<body>";

  // Exibe a resposta gerada com quebra de linha
  echo $respostaQuebrada;

  echo "</body>
</html>";
?>
