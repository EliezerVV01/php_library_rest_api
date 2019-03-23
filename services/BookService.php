<?php

//We include the book model
include_once 'models/Book.php';

class BookService{
    
    //Here we inject the connection to the database so that we can use it in book services.
    private $connection;
    function __construct($db_connection){
          $this->connection=$db_connection;
    }

    /*This method returns an array with all the books that are in the database 
       and false if there's nothing     */
    function getAllBooks(){
        $query="call getAllBooks()";
        //Prepare statement and  execute a stament with the previous query
        $statement=$this->connection->prepare($query);
        $statement->execute();

        //Here we check if we got at least one row as a result of the previous query executed
        $row_num=$statement->rowCount();

        if($row_num>0){
           //ew create a book array, map all the books in the result and push em into the array
           $books=array();
           while($row=$statement->fetch(PDO::FETCH_ASSOC)){
               
               extract($row);
               $book=new Book($id,$title,$author,$release_date,$book_editorial);
               array_push($books, $book);
           }
           return $books;

        }else{

            return false;

        }

    }
}

?>