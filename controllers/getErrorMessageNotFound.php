<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//this include are by the level of file index.php
include 'services/ErrorMessageService.php';


//this function print the json of the array with all the books and the database plus a true value

function getAllBooksController(){
    $error_message_service=new ErrorMessageService();
   echo  json_encode($error_message_service->getErrorMessageNotFound());
   http_response_code(404);
      
}

getAllBooksController();


