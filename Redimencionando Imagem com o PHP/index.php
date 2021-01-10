<?php

$arquivo = 'l.jpg';
$maxWidth = 200;
$maxHeight = 200;


//Pegando os primeiros elementos do array e colocando em variaveis pelo método list do PHP  
list($originalWidth, $originalHeight) = getimagesize($arquivo);

//Pegando a proporção da imagem original
$ratio = $originalWidth / $originalHeight;

//Pegando a proporção da imagem de destino
$ratioDest = $maxWidth / $maxHeight;


//Fazendo a lógica matemática para pegar o tamanho reduzido respeitando os limites de largura e altura

// Verifica se a imagem é maior que o máximo permitido
if ( $originalWidth > $maxWidth || $originalHeight > $maxHeight) {

    //verificar se a largura é maior que a altura
    if ( $originalWidth > $originalHeight) {
        $finalWidth = $maxWidth;
        $finalHeight = round( ($finalWidth / $originalWidth) * $originalHeight);

    }
    //Verificando se a Altura é mairo que a largura
    else if ($originalHeight > $originalWidth) {
        $finalHeight = $maxHeight;
        $finalWidth = round( ($finalHeight / $originalHeight) * $originalWidth);
    }
    // altura === largura
    else 
    {
        $finalHeight = $maxHeight;
        $finalWidth = $maxWidth;
    }
}




//Criando a imagem e suas dimenssões
$imagem = imagecreatetruecolor($finalWidth, $finalHeight);

//Pegando a Imagem original
$originalImg = imagecreatefromjpeg($arquivo);

//Copiando a imagem original para a imagem com  as dimenções já reduzidas
imagecopyresampled($imagem, $originalImg, 0,0,0,0, $finalWidth, $finalHeight, $originalWidth, $originalHeight);


//Transformando o arquivo php em um arquivo de imagem para ser mostrado no navegador
header('Content-Type: image/jpeg');

//colocando a imagem para ser mopstrada
imagejpeg($imagem,null, 100);



echo $finalWidth ." - ". $finalHeight;