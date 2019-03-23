<?php

//We include the page model
include_once 'models/Page.php';

class PageService{
    
    //Here we inject the connection to the database so that we can use it in page services.
    private $connection;
    function __construct($db_connection){
          $this->connection=$db_connection;
    }

    /*This method returns the page with the book id and page number    */
    function getPageByIdAndNumber($book_id,$page_number){
        $query="call getPageOfBook(".$book_id.",".$page_number.")";
        //Prepare  astatement with the previous query and  execute it
        $statement=$this->connection->prepare($query);
        $statement->execute();
        
       
        //We check if there's a page with the id requested and returned, otherwise we return false           $books=array();
        if($row=$statement->fetch(PDO::FETCH_ASSOC)){

               extract($row);
               $page=new Page($id,$page_number,$content,$book_id);
               return $page;

        }else{

            return false;

        }

     }


    
}

?>