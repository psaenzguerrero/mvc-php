<?php
    function set_cookie(String $nom, $val){
        setcookie($nom, $val, time()+(86400*30));
    }
    function unset_coockie(String $nom){
        $comp = false ;
        if (isset($_COOKIE[$nom])) {
            setcookie($nom, '',time()-30);
            $comp = true;
        }
        return $comp;
    }
    function set_session(String $nom, $val){
        start_session();
        $_SESSION[$nom]=$val;
    }
    function get_session(String $nom){
        start_session();
        return $_SESSION[$nom];
    }
    function unset_session(){
        start_session();
        session_unset();
        session_destroy();
    }
    function start_session(){
        if ((session_status()=== PHP_SESSION_NONE)) {
            session_start();
        }
    }
    function is_session(String $nom){
        start_session();
        $isset = isset($_SESSION[$nom]);
        return $isset;
    }
?>