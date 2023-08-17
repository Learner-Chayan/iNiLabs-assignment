<?php 


//interface
interface Logger {
    public function log($msg);
}

class FileLogger implements Logger {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function log($msg) {
        $msgWithDate = date('Y-m-d H:i:s') . " - $msg"."\n";
        file_put_contents($this->filePath, $msgWithDate, FILE_APPEND);
    }
}

class DBLogger implements Logger {
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function log($msg) {
        $modifiedMsg = date('Y-m-d H:i:s') . " - $msg";
        $query = "INSERT INTO info(name,message) VALUES ('Database log','$modifiedMsg')";
        $this->conn->query($query);
    }
}




$fileLogger = new FileLogger(dirname(__FILE__).'/fileLogs.txt');
$fileLogger->log('File log message');

$dbLogger = new DBLogger('localhost', 'root', '', 'logs_data');
$dbLogger->log('Database log message');

echo "Check your database and file for the log messages";



/*
Usage : 

In the provided PHP code, the main purpose of using an interface
is to define  a set of methods that classes implementing
the interface must be fixed. Interfaces provide a way to ensure that 
classes follow a specific structure and provide specific functionality.
In this case our interface is ' Logger ' and their given a single method 
that is 'log'.  FileLogger and DBLogger class should be have the log function 
as they implements the "Logger" interface.

*/