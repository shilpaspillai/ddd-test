<?php

use app\lib\Storage\Repository\User\Repository as userRepository;
use app\lib\Exceptions as userExceptions;
use app\lib\Domain\ValueObjects\User as UserValueObjects;
use app\lib\Domain\Factory\User\Factory as Userfactory;
use \Mockery as m;

class userRepositoryTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        parent::setUp();
    }

    public function tearDown() {
        parent::tearDown();
        \Mockery::close();
    }

    public function testisEmailExistByUserRepo() {
        $user_repo = new userRepository();
        $input_email = 'shyam@mail.com';
        $user = $user_repo->is_email_exist_by_user_repo($input_email);
    }

    public function testisExistingUserName() {
        $user_repo = new userRepository();
        $username = 'shyam@mail.com';
        $user = $user_repo->is_existing_username($username);
    }

    public function testgetAllUsers() {
        $user_repo = new userRepository();
        $search_key = 'shyam';
        $user = $user_repo->get_all_users($search_key);
    }

    public function testuserDetailByRepo() {
        $user_repo = new userRepository();
        $uid = '9';
        $test_name = 'shyam';
        $user = $user_repo->get_user_detail_by_repo($uid);
        $this->assertEquals($test_name, $user->username);
    }

    public function testfindUserDetail() {
        $user_repo = new userRepository();
        $current_id = '9';
        $test_name = 'shyam';
        $user = $user_repo->find_user_detail($current_id);
        $this->assertEquals($test_name, $user->username);
    }

    public function testcreate() {
        $user_repo = new userRepository();
        $user_config['password'] = new UserValueObjects\Password(UserValueObjects\Password::encrypt('shyam'));
        $user_config['email'] = new UserValueObjects\email('testname' . rand(9, 99999) . '@mail.com');
        $user_config['firstname'] = new UserValueObjects\firstname('testfirstname');
        $user_config['surname'] = new UserValueObjects\surname('testsurname');
        $user_entity = Userfactory::create($user_config);
        $user_repo->create($user_entity);
    }

    public function testsave() {
        $user_repo = new userRepository();
        $str = 'abcdef';
        $user_config['id'] = new UserValueObjects\id('28');
        $user_config['email'] = new UserValueObjects\email('testsave' . rand(9, 99999) . '@mail.com');
        $user_config['firstname'] = new UserValueObjects\firstname('testing' . str_shuffle($str) . 'username');
        $user_config['surname'] = new UserValueObjects\surname('testsurname');
        $user_entity = Userfactory::create($user_config);
        $user_repo->save($user_entity);
    }

    public function testdeleteuser() {
        $user_repo = new userRepository();
        $config['current_id'] = '31';
        $result = $user_repo->delete_user($config);
        $this->assertTrue($result);
    }

    public function testfindByPubId() {
        $user_repo = new userRepository();
        $config['current_id'] = '23';
        $name = 'testfirstname';
        $result = $user_repo->find_by_pub_id($config);
        $this->assertEquals($name, $result->username);
    }

    public function testfindById() {
        $user_repo = new userRepository();
        $uid = '23';
        $name = 'testfirstname';
        $result = $user_repo->find_by_id($uid);
        $this->assertEquals($name, $result->username);
    }

}

?>