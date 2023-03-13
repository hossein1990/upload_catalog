<?php
namespace Hossein\Task1\inc;

use mysqli;
require_once "config.php";
class  Database 
{
    protected $connection = null;

    public function __construct()

    {

        try {

            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

    	

            if ( mysqli_connect_errno()) {

                throw new Exception("Could not connect to database.");   

            }

        } catch (Exception $e) {

            throw new Exception($e->getMessage());   

        }			

    }
    public function executeStatement($query = "")

    {

        try {
            $stmt = $this->connection->query( $query );
            if($stmt === false) {

                throw New Exception("Unable to do prepared statement: " . $query);

            }

             return $stmt;

        } catch(Exception $e) {

            throw New Exception( $e->getMessage() );

        }	

    }

    public function insert($query = "")

    {

        try {
            $stmt = $this->connection->query( $query );
            if($stmt === false) {

                throw New Exception("Unable to do prepared statement: " . $query);

            }

             return $this->connection;

        } catch(Exception $e) {

            throw New Exception( $e->getMessage() );

        }	

    }

}