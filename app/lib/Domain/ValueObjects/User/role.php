<?php
 namespace app\lib\Domain\ValueObjects\User;
class role{
      protected $role = '';
      public function __construct($role) {
          $this->check_validity($role);
          $this->role = $role;
      }
     public function check_validity($role=null)
     {
      if(($role == null) || ($role == ''))   
          {throw new  roleNotValidException();}
     }
     
     public function get_role()
     {
         return $this->role;
     }
  }
  ?>