<?php
namespace app\lib\Domain\ValueObjects\User;
use app\lib\Exceptions\IdNotValidException as IdNotValidException;
class id{
    protected $id = '';
    public function __construct($id) {
        $this->validate($id);
        $this->id=$id;
    }
    
    public function validate($id)
    {
        if(($id == null) ||($id == ''))     
        {
       throw new IdNotValidException();
        }
   }
   public function get_id()
   {
      return $this->id;
   }
}

?>

