<?php


class Session
{
    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
            return true;
        }else{
            return $_SESSION['message'] ?? '';
        }
    }

    public function clear_message(){
        unset($_SESSION['message']);
    }
}