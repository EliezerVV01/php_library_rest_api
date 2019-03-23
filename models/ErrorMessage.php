<?php
class ErrorMessage{

   //Message properties
   public $code;
   public $message;
   public $status;


   //Full Contructor
   function __construct($codeParam, $messageParam, $statusParam){

       $this->code=$codeParam;
       $this->message=$messageParam;
       $this->status=$statusParam;

   }



}
?>