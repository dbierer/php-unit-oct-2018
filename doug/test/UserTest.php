<?php

// require needed classes and/or autoloader
use Application\User\User;

class UserTest  // extends what class???
{

    // define protected properties (defined in setup())
	protected $pdo;
	protected $users;
    public function setup()
    {
        // Create our dependencies (test doubles)

        // define test data
        $this->users = [
            ['id' => 1, 'email' => 'chartjes@grumpy-learning.com'],
            ['id' => 2, 'email' => 'info@example.com']
        ];

        // Define test double for PDOStatement
		$this->stmt = new class ($this->users) extends \PDOStatement 
		{
			protected $users;
			public function __construct($users)
			{
				$this->users = $users;
			}
			public function execute()
			{
				return TRUE;
			}
			public function fetchAll()
			{
				return $this->users;
			}
		};
        // Define test double for PDO
		$this->pdo = new class ($this->stmt) extends \PDO 
		{
			protected $stmt;
			public function __construct($stmt)
			{
				$this->stmt = $stmt;
			}
			public function prepare()
			{
				return $this->stmt;
			}
		};

		
    }

    /**
     * either use proper annotation or use prefix "test"
     */
    public function testFetchAllReturnsExpectedResults()
    {
        // Our PDOStatement needs an execute method that returns a boolean

        // Our PDOStatement needs a fetchAll method that returns an array

        // Our DB needs to return the PDOStatement

        /**
         * Create a new User object that takes the test double we created as
         * a constructor argument
         */
		$user = new User($this->pdo);
        // Now define an assertion that the expected response is obtained
		$this->assertEquals(TRUE, is_array($user->fetchAll()), 'Value is not an array');
		$this->assertCount(2, $user->fetchAll(), 'Unable to obtain the expected count');
    }

    /**
     * either use proper annotation or use prefix "test"
     */
    public function getAllActiveWorks()
    {

        // define test data
        $users = [
            ['id' => 1, 'email' => 'foo@bar.com', 'is_active' => 1],
            ['id' => 2, 'email' => 'bar@bar.com', 'is_active' => 0],
            ['id' => 3, 'email' => 'baz@bar.com', 'is_active' => 1]
        ];

        // define expected results
        $expected = [
            ['id' => 1, 'email' => 'foo@bar.com'],
            ['id' => 3, 'email' => 'baz@bar.com']
        ];

        // Our PDOStatement needs an "execute" method that returns true
        // Our PDOStatement needs a "fetchAll" method that returns an array $users
        // Our PDO class should expect a "prepare" method which returns a PDOStatement

        // create an instance of the class to be tested (User)

        // collect response from getAllActive()

        // assert response matches expected

    }
}
