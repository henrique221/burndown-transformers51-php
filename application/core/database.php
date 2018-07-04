<?php
class Database
{
    private $dbConfig = array();
    private $connection = null;

    private function __construction()
    {
        global $db;
        $this->dbConfig = $db;
    }

    private function connect()
    {
        $this->connection = new mysqli($this->dbConfig['host'],
            $this->dbConfig['user'], $this->dbConfig['password'], $this->dbConfig['schema']) or die('FAILED TO CONNECT');
    }

    public function executeNonQuery($query)
    {
        $this->connect();
        $this->connection->query($query);
        $this->closeConnection();
    }

    public function executeReader()
    {
        $this->connect();
        $query = $this->connection->query($query);
        $responseArray = $query->fetch_all(MYSQLI_ASSOC);
        $this->closeConnection();
        return $responseArray;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}

/*
$servername = 'mysql';
$username = 'root';
$password = 'admin';
$database = 'burndown';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
*/
