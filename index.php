<?php

//Including a Class that allows us to manage the routes
include dirname(__FILE__) . '/include/AltoRouter.php';

//Create a object of that route and set the path of our project in the htdocs folder
$router = new AltoRouter();
$router->setBasePath('/php_library_rest_api');

//Here we map all the routes that we are going to handle
$router->map('GET','/books', 'controllers/getAllBooks.php', 'GetAllBooks');
$router->map('GET','/books/', 'controllers/getAllBooks.php', 'GetAllBooks2');

$router->map('GET','/books/[i:id]', 'controllers/getBookById.php', 'GetBookById');
$router->map('GET','/books/[i:id]/', 'controllers/getBookById.php', 'GetBookById2');

$router->map('GET','/books/[i:id]/page/[i:page_number]/html', 
'controllers/getPageHtml.php', 'getPageHtml');
$router->map('GET','/books/[i:id]/page/[i:page_number]/html/', 
'controllers/getPageHtml.php', 'getPageHtml2');

$router->map('GET','/books/[i:id]/page/[i:page_number]/text', 
'controllers/getPageText.php', 'getPageText');
$router->map('GET','/books/[i:id]/page/[i:page_number]/text/', 
'controllers/getPageText.php', 'getPageText2');


//We match it. And if it matches, we call what matched, otherwise we call a errorMessageNotFound
$match = $router->match();

if($match){

require $match['target'];

}else{

    require 'controllers/getErrorMessageNotFound.php';
     
}



?>