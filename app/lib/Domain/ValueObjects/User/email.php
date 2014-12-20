<?php
namespace app\lib\Domain\ValueObjects\User;
use app\lib\Exceptions\EmailNotValidException as EmailNotValidException;
class email{
    
    protected $email = '';
    
    public function __construct($email) {
        $this->check_validity($email);
        $this->email=$email;
    }
    
    private function check_validity($email)
    {
          if($email != null && $email != '')
        {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
        {
            throw new EmailNotValidException();
        }
        }
    }
    
    public function get_email()
    {
        return $this->email;
    }
}
