<?php
class Page{

   //Page properties
   public $id;
   public $page_number;
   public $content;
   public $book_id;

   //Full Contructor
   function __construct($idParam, $page_numberParam, 
                       $contentParam, $book_IdParam){

       $this->id=$idParam;
       $this->page_number=$page_numberParam;
       $this->content=$contentParam;
       $this->book_id=$book_IdParam;

   }


}
?>