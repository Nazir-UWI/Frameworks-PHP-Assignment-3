<?php

namespace framework\session_manager;

class SessionManager{
    public static function start(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return $_SESSION[$key] ?? NULL;
    }

    public static function destroy(){
        if (!session_status() == PHP_SESSION_NONE) {
            session_destroy();
        }
    }
}