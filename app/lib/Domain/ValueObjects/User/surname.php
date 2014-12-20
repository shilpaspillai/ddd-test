<?php
 namespace app\lib\Domain\ValueObjects\User;
class surname{
      protected $surname = '';
      public function __construct($surname) {
          $this->check_validity($surname);
          $this->surname = $surname;
      }
     public function check_validity($surname=null)
     {
      if(($surname == null) || ($surname == ''))   
          {throw new  SurNameNotValidException();}
     }
     
     public function get_surname()
     {
         return $this->surname;
     }
  }
  ?>