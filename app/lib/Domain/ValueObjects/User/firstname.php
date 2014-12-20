<?php
 namespace app\lib\Domain\ValueObjects\User;
 
 use app\lib\Exceptions\UserNameNotValidException as UserNameNotValidException;
 
 class firstname{
 
    protected $firstname = '';
    
      public function __construct($firstname) {
           $this->check_validity($firstname);
           $this->firstname = $firstname;
      }
     public function check_validity($firstname=null)
     {   
      if(($firstname == null) || ($firstname == ''))   
      {throw new UserNameNotValidException();}
     }
     
     public function get_firstname()
     {
         return $this->firstname;
     }
  }
  ?>

