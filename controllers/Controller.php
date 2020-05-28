<?php

class Controller extends Database{

    protected static $vars = [];

    public static $message;


    public static function CreateView($viewName, $data = []) {

        foreach ($data as $key => $value) {
            self::$vars[$key] = $value;
        }
        extract(self::$vars);
       
        require_once("./views/$viewName.php");

    }

    protected function isEmptyFields($page,$fields) {
        foreach($fields as $field) 
            (empty($_POST["'".$field]."'")) ? Controller::redirect($page."message=EmptyFields_$field"): '';
    }
    
    public static function redirect($path) {
        header("Location: $path");
        exit();
    }
}