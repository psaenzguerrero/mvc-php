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