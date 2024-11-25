<?php

namespace framework\session_manager;

class AuthenticationGuard{
    
    public static function check($key){
        return isset($_SESSION[$key]) && $_SESSION[$key] == true;
    }

    public static function redirectIfNotAuthenticated($key){

        if (!self::check($key)){
            header("Location: login");
        }
                
    }
}


?>