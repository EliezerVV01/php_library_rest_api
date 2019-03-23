<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: plain/text');

//this include are by the level of file index.php
include 'services/PageService.php';
include 'config/Database.php';


/*this function print in html the page that matchs with the specific id and number plus a true value
or false if ther's no*/

function getPageHtml($book_id,$page_number){

    /*We create a object of the database and get the connection so that we
     can pass it to the page service constructor for the injection*/
    $database=new Database();
    $db_connection=$database->connect();
    $page_service=new PageService($db_connection);

    /*Get the page with the id and number*/
    $page=$page_service->getPageByIdAndNumber($book_id,$page_number);
    /*If there's no we call a Error Message Not Found and if there's we return it in json*/ 
    if($page==false){
        echo 'Page not found';
    }else{

        echo  strip_tags($page->content);
        return true;
    }

}


/*We call the previous function with the id and number from the router
and if we made it send a OK(200) http_reponse*/
$book_id=$match['params']['id'];
$page_number=$match['params']['page_number'];
if(getPageHtml($book_id , $page_number)){

    http_response_code(200);

}




?>