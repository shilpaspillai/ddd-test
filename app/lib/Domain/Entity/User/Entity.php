<?php
namespace app\lib\Domain\Entity\User;
use app\lib\Exceptions as Exceptions;
use app\lib\Domain\ValueObjects\User as UserValueObjects;
class Entity {
 public function __construct(){
        
    }
  public function __set($name, $value){
      switch($name)
      {
                case 'firstname':
                if (!($value instanceof UserValueObjects\firstname))
                    throw new Exceptions\UserNameNotValidException();
                break; 
                case 'surname' :
                    if(!($value instanceof UserValueObjects\surname))
                        throw new Exceptions\SurNameNotValidException();
                     break;
               case 'id':
                if (!($value instanceof UserValueObjects\id))
                    throw new Exceptions\IdNotValidException();
                break;
                  case 'email':
                if (!($value instanceof UserValueObjects\email))
                    throw new Exceptions\EmailNotValidException();
                break; 
                 case 'password':
                if (!($value instanceof UserValueObjects\password))
                   throw new Exceptions\PasswordNotValidException();
                break;
      }
      $this->$name = $value;
    }
    public function __get($name) {
        return isset($this->$name) ? $this->$name : FALSE;
    }
   
}
?>
