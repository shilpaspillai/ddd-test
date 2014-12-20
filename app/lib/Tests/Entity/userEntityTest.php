<?php

use app\lib\Domain\ValueObjects\User as UserValueObjects;
use app\lib\Domain\Entity\User\Entity as uEntity;

class userEntityTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        parent::setUp();
    }

    public function testFirstnameAttr() {
        $firstname = "shyam";
        $user_entity = new uEntity();
        $user_entity->firstname = UserValueObjects\firstname($firstname);
        $this->assertEquals($user_entity->get_firstname(), $firstname);
    }

    public function testSurnameAttr() {
        $surname = "achuthan";
        $user_entity = new uEntity();
        $user_entity->surname = UserValueObjects\surname($surname);
        $this->assertEquals($user_entity->get_surname(), $surname);
    }

    public function testEmailAttr() {
        $email = "shyam@mail.com";
        $user_entity = new uEntity();
        $user_entity->$email = UserValueObjects\email($email);
        $this->assertEquals($user_entity->get_email(), $email);
    }

    public function testPasswordAttr() {
        $password = UserValueObjects\Password::encrypt("shyam");
        $user_entity = new uEntity();
        $user_entity->$password = UserValueObjects\Password($password);
        $this->assertEquals($user_entity->get_password(), $password);
    }

    public function testGetter() {
        $user_entity = new UserEntity();
        $user_entity->non_attr;
        $this->assertTrue(true);
    }

    public function tearDown() {
        parent::tearDown();
    }

}
?>



