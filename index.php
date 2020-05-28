<?php
//autocarga de los controladores
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'views/lyout/header.php';
require_once 'views/lyout/menu.php';
require_once 'views/lyout/lateral.php';
//comprobamos si en la url existe el parametro controller(htaccess)
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else{
    echo "La pagina no existe";
    exit();
}
//si existe dico controlador comprobamos si existe la clase y tiene el metodo
//al que hacemos referencoa en el action de la url
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        $error = new errorController();
        $error->index();
    }
}else{
    $error = new errorControler();
    $error->index();
}

require_once 'views/lyout/footer.php';
?>
<?php
/*
require_once "html/header.html";
require_once "html/menu.html";
require_once "html/lateral.html";
if(isset($_GET[contacto])){
    require_once "contacto.php";
}elseif(isset($_GET['blog'])){
    require_once "html/blog.php";
}elseif(isset($_GET['apuntesPHP'])){
    require_once "apuntesPHP.php";
}else{
    require_once "html/main.html";
}
require_once "html/footer.html";
*/
?>

