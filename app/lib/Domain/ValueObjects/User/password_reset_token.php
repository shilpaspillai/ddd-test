<?php
 namespace app\lib\Domain\ValueObjects\User;
class password_reset_token{
      protected $password_reset_token = '';
      public function __construct($password_reset_token) {
          $this->check_validity($password_reset_token);
          $this->password_reset_token = $password_reset_token;
      }
     public function check_validity($password_reset_token=null)
     {
      if(($password_reset_token == null) || ($password_reset_token == ''))   
          {throw new  password_reset_tokenNotValidException();}
     }
     
     public function get_password_reset_token()
     {
         return $this->password_reset_token;
     }
  }
  ?>