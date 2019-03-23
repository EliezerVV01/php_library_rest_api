<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//this include are by the level of file index.php
include 'services/BookService.php';
include 'config/Database.php';


/*this function print in json the book that matchs with the specific id plus a true value
or false if ther's no*/

function getBookById($id){

    /*We create a object of the database and get the connection so that we
     can pass it to the book service constructor for the injection*/
    $database=new Database();
    $db_connection=$database->connect();
    $book_service=new BookService($db_connection);

    /*Get the book with the id*/
    $book=$book_service->getBookById($id);
  
    /*If there's no we call a Error Message Not Found and if there's we return it in json*/ 
    if($book==false){
        require 'controllers/getErrorMessageNotFound.php';
    }else{

        echo json_encode($book);
        return true;
    }

}


/*We call the previous function with the id from the router
and if we made it send a OK(200) http_reponse*/
$id=$match['params']['id'];
if(getBookById($id)){

    http_response_code(200);

}




?>