<?php

// require needed classes and/or autoloader

class UserTest  // extends what class???
{

    // define protected properties (defined in setup())

    public function setup()
    {
        // Create our dependencies (test doubles)

        // Define test double for PDO

        // Define test double for PDOStatement

    }

    /**
     * either use proper annotation or use prefix "test"
     */
    public function fetchAllReturnsExpectedResults()
    {
        // define test data
        $users = [
            ['id' => 1, 'email' => 'chartjes@grumpy-learning.com'],
            ['id' => 2, 'email' => 'info@example.com']
        ];

        // Our PDOStatement needs an execute method that returns a boolean

        // Our PDOStatement needs a fetchAll method that returns an array

        // Our DB needs to return the PDOStatement

        /**
         * Create a new User object that takes the test double we created as
         * a constructor argument
         */

        // Now define an assertion that the expected response is obtained

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
