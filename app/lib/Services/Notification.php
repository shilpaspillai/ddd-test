<?php
namespace app\lib\Services;
Class Notification {
    public $errors = array(
        '200' => 'Action Successfull',
        '300' => 'Updated Successful',
        '500' => 'Unknown Error!! contact Admin',
        '1000' =>'email not valid',
        '1001' => 'id not valid',
        '1002' => 'password is required and more than 6 characters',
        '1003' => 'password Invalid',
        '1004' => 'User Entity not valid',
        '1005' => 'Invalid username',
        '1006' => 'Invalid surname',
        '1007' => 'Username Already Exist',
        '1008' => 'Invalid Credentials',
        '1009' => 'Username Existing',
        
    );
    

    public function __construct() {
        return $this;
    }

    public function throwSuccess($error_code, $message = '') {
        return $this->throwError($error_code, $message);
    }
        public function throwError($error_code, $message = '') {
        ob_clean();
        if (isset($this->errors[$error_code])) {
            return array(
                'Code' => $error_code,
                'Message' => ($message != '') ? $message : $this->errors[$error_code]
            );
        } else {
            return array(
                'Code' => 500,
                'Message' => $this->errors[500]
            );
        }
    }
    
}
?>
