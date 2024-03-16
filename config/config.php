<?php
session_start();
if(($_SERVER['HTTP_HOST']==='localhost') || ($_SERVER['HTTP_HOST']==='127.0.0.1')){
    define("BASE_URL", "http://127.0.0.1/klakar/lms/");
    define("DIR_URL", $_SERVER['DOCUMENT_ROOT']."/klakar/lms/");
    define("SERVER_NAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "mal");
}else{

}

?>