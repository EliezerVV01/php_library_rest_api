<?php

//Include ErroMessage model
include_once 'models/ErrorMessage.php';

class ErrorMessageService{
    
    //This method returns a errorMessage For Not Found requests
    function getErrorMessageNotFound(){
 
        $error_message=new ErrorMessage(404,"Check if the url is valid","Not Found");
        return $error_message;

    }

}

?>