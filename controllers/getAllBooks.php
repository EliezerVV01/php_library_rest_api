<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//this include are by the level of file index.php
include 'services/BookService.php';
include 'config/Database.php';

//this function print the json of the array with all the books and the database plus a true value

function getAllBooksController(){

    /*We create a object of the database and get the connection so that we
     can pass it to the book service constructor for the injection*/
    $database=new Database();
    $db_connection=$database->connect();
    $book_service=new BookService($db_connection);

    /*Get all the book array services and turned it into json*/
    $all_books=$book_service->getAllBooks();
    echo json_encode($all_books);
      
    return true;
}


//If we made it send a OK(200) http_reponse
if(getAllBooksController()){

    http_response_code(200);

}




?>