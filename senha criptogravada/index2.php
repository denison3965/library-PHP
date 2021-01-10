<?php

$senha_db = '$2y$10$y3ZQwwR2D4Chh09OocPhBeh.4Gru/CRSFtVOs6Y7Y8iags.lMkQCy';

if (password_verify('1234', $senha_db)) {
    echo 'Senha CORRETA';   
}
else {
    echo 'Senha Incorreta';
}