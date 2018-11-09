<?php
namespace CompletedTest\User;

use PDO;
use PDOStatement;
use Completed\User\Service\User as UserService;
use Completed\User\Entity\User as UserEntity;

use Prophecy\ {Prophet,Argument};
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    protected $mockPDO;
    protected $mockStmt;

    public function setup()
    {

        $prophet = new Prophet();

        // Our PDOStatement mock object needs an execute method that returns a boolean
        $this->mockStmt = $prophet->prophesize(PDOStatement::class);
        $this->mockStmt->execute()->willReturn(TRUE);
        $this->mockStmt->setFetchMode(PDO::FETCH_CLASS, UserEntity::class)->willReturn(TRUE);
        
        // Our DB mock object needs to return the PDOStatement
        $this->mockPDO = $prophet->prophesize(PDO::class);

    }

    /**
     * @test
     */
    public function fetchAllReturnsExpectedResults()
    {
        // test data which will be returned by the mock object
        $users = [
            new UserEntity(['id' => 1, 'email' => 'chartjes@grumpy-learning.com']),
            new UserEntity(['id' => 2, 'email' => 'info@example.com'])
        ];
        
        // set up mock objects
        $this->mockStmt->fetchAll()->willReturn($users);
        $this->mockPDO
             ->prepare(Argument::containingString('SELECT * FROM users'))
             ->willReturn($this->mockStmt->reveal());        
        $db = $this->mockPDO->reveal();

        /**
         * Create a new Service\User object that takes the test double we created as
         * a constructor argument
         */
        $service = new UserService($db);
        $response = $service->getAll();

        // run assertion
        $this->assertEquals($users, $response);
    }

    /**
     * @test
     */
    public function getAllActiveWorks()
    {
        
        // test data which will be returned by the mock PDO object
        $users = [
            new UserEntity(['id' => 1, 'email' => 'foo@bar.com', 'isActive' => 1]),
            new UserEntity(['id' => 2, 'email' => 'bar@bar.com', 'isActive' => 0]),
            new UserEntity(['id' => 3, 'email' => 'baz@bar.com', 'isActive' => 1])
        ];
        // expected results
        $expected = [
            new UserEntity(['id' => 1, 'email' => 'foo@bar.com']),
            new UserEntity(['id' => 3, 'email' => 'baz@bar.com'])
        ];

        // set up mock objects
        $this->mockStmt->fetchAll()->willReturn($users);
        $this->mockPDO
             ->prepare(Argument::containingString('SELECT * FROM users'))
             ->willReturn($this->mockStmt->reveal());        
        $db = $this->mockPDO->reveal();

        // set up actual object to be tested
        $service = new UserService($db);
        $response = $service->getAllActive();

        // run assertion
        $this->assertEquals($expected, $response);
    }
}
