<?php

use app\lib\Domain\ValueObjects\User as UserValueObjects;
use app\lib\Domain\Entity\User\Entity as uEntity;
use app\lib\Services\ApplicationServices\UserService as UserService;
use app\lib\Domain\Factory\User\Factory as Userfactory;
use app\lib\Exceptions as userExceptions;
use \Mockery as m;

class userServiceTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        parent::setUp();
    }

    public function tearDown() {
        parent::tearDown();
        \Mockery::close();
    }

    public function testprocessLogin() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('process_login_credentials')
                ->once()
                ->withAnyArgs()
                ->andReturn(FALSE);
        $this->setExpectedException('app\lib\Exceptions\CredentialNotValidException');
        $user_service = new UserService($repo_mock);
        $user_service->process_login(array('email' => 'shilpa', 'password' => 'shilpa'));
    }

    public function testisEmailExistByUserService() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('is_email_exist_by_user_repo')
                ->once()
                ->withAnyArgs()
                ->andReturn(FALSE);
        $user_service = new UserService($repo_mock);
        $result = $user_service->is_email_exist_by_user_service('abc@mail.com');
        $this->assertFalse($result);
    }

    public function testprocessRegisterUser() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('create')
                ->once()
                ->withAnyArgs()
                ->andReturn(TRUE);
        $user_config['password'] = UserValueObjects\Password::encrypt('shilpa');
        $user_config['email'] = 'testuser@mail.com';
        $user_config['firstname'] = 'testfirstname';
        $user_config['surname'] = 'testsurname';
        $user_service = new UserService($repo_mock);
        $result = $user_service->process_regiser_user($user_config);
        $this->assertTrue($result);
    }

    public function testupdateUser() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $entity_mock = \Mockery::mock('app\lib\Domain\Entity\User\Entity');

        $repo_mock->shouldReceive('find_user_detail')
                ->once()
                ->withAnyArgs()
                ->andReturn($entity_mock);
        $repo_mock->shouldReceive('save')
                ->once()
                ->withAnyArgs();
        $user_config['firstname'] = 'testfirstname';
        $user_config['surname'] = 'testsurname';
        $user_config['email'] = 'testuser@mail.com';
        $user_config['current_id'] = '5';
        $user_service = new UserService($repo_mock);
        $result = $user_service->update_user_detail($user_config);
        $this->assertTrue($result);
    }

    public function testdeleteUserById() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('delete_user')
                ->once()
                ->withAnyArgs()
                ->andReturn(TRUE);
        $user_config['current_id'] = '5';
        $user_service = new UserService($repo_mock);
        $result = $user_service->delete_user_by_id($user_config);
        $this->assertTrue($result);
    }

    public function testlistUsersByUserService() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('get_all_users')
                ->once()
                ->withAnyArgs()
                ->andReturn(12345);
        $search_key = 'testfirstname';
        $user_service = new UserService($repo_mock);
        $result = $user_service->list_users_by_user_service($search_key);
        $this->assertEquals($result, 12345);
    }

    public function testgetUserDetailById() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('get_user_detail_by_repo')
                ->once()
                ->withAnyArgs()
                ->andReturn(12345);
        $uid = '5';
        $user_service = new UserService($repo_mock);
        $result = $user_service->get_user_detail_by_id($uid);
        $this->assertEquals($result, 12345);
    }

    public function testSearchByUserService() {
        $repo_mock = m::mock('app\lib\Storage\Repository\User\Repository');
        $repo_mock->shouldReceive('get_name_by_repo')
                ->once()
                ->withAnyArgs()
                ->andReturn(12345);
        $input_name = 'shilpa';
        $user_service = new UserService($repo_mock);
        $result = $user_service->search_by_user_service($input_name);
        $this->assertEquals($result, 12345);
    }
}

?>
