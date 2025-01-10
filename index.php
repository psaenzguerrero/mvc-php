<?php

    function inicio(){
        if (isset($_POST["fIni"])) {
            require_once('class.db.php');
            require_once('modelo.php');

            $db = new db();

            if (!isset($_POT["rec"])) {
                unset_coockie("usuario");
            }

            if ($db->compCredenciales($_POST["nom"],$_POST["psw"])) {

                if (isset($_POST["rec"])) {
                    set_cookie("usuario", $_POST["nom"]);
                }
                set_session('usu', $_POST["nom"]);
                $nUsu = $_POST["nom"];
                require_once('bienvenida.php');

            }else{
                require_once('login.php');
            }
        }
    }
    function cerrar(){
        require_once('modelo.php');
        unset_session();
        header("Location: index.php");
    }

    function registrar(){
        if (isset($_POST['fReg'])) {
            require_once('class.db.php');
            $db = new db();

            if (strcmp($_POST['psw'], $_POST['psw2']) == 0) {
                if(!$db->checkUsuario($_POST['nom'])){
                    if ($db->registrarUsu($_POST['nom'], $_POST['psw'])) {
                        header('Location: index.php');
                    }else{
                        header('Location: index.php?action=registro');
                    }
                }else{
                    $err = "<p style='color:red'>El usuario ya esta en uso</p>";
                }
            }else{
                $err = "<p style='color:red'>La contraseña no coincide</p>";
            }
            require_once('cabecera.html');
            require_once('registro.php');
            require_once('pie.html');
        }
    }
    function registro(){
        require_once('cabecera.html');
        require_once('registro.php');
        require_once('pie.html');
    }
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
        $action();
    }else{
        require_once('modelo.php');
        if (is_session('usu')) {
            $nUsu = get_session('usu');
            require_once('bienvenida.php');
        }else{
            header("Location: login.php");
        }
       
    }
?>