<?php
session_start();
define('URL', 'http://localhost/Ecclesia/adm/');

define('CONTROLER', 'controle-login');
define('METODO', 'login');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'ecclesia');

function __autoload($Class) {
    $dirName = array(
        'controllers',
        'entidade',
        'models',
        'models/helper',
        'assets/fpdf',
        'views',
        'config'
    );
    foreach ($dirName as $diretorios) {
        if (file_exists("{$diretorios}/{$Class}.php")):
            require("{$diretorios}/{$Class}.php");        
        endif;
    }
    
}
