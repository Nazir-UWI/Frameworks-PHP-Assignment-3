<?php

namespace framework\session_manager;

class FormHandler{
    public static function handleSubmission(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
                die ('Invalid CSRF Token');
            }
            unset($_SESSION['csrf_token']);
        }
    }
}