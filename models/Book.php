<?php
class Book{

   //Book properties
   public $id;
   public $title;
   public $author;
   public $release_date;
   public $book_editorial;

   //Full Contructor
   function __construct($idParam, $titleParam, 
                       $authorParam, $release_dateParam, 
                        $book_editorialParam){
       $this->id=$idParam;
       $this->title=$titleParam;
       $this->author=$authorParam;
       $this->release_date=$release_dateParam;
       $this->book_editorial=$book_editorialParam;
   }


}
?>