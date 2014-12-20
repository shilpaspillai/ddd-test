<?php
 namespace app\lib\Domain\ValueObjects\User;
 use  app\lib\Exceptions\PasswordNotValidException as PasswordNotValidException;
 use  Illuminate\Support\Facades\Hash as Hash;



class Password {
   
    public function __construct($password){
        $this->check_validity($password);
        $this->password=$password;
    }
    
    public static function encrypt($password){
        return Hash::make($password);
    }
    
    public function check_validity($password=null)
    {
         if ($password == null || strlen($password) < 6) {
         
            throw new PasswordNotValidException();}
    }
    
    public function get_password()
    {
        return $this->password;
    }
    
} 
?>