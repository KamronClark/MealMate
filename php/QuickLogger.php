<?php
// A quick and lightweight logger.
class QuickLogger {
    private $hostname = null;
    private $databasename = null;
    private $tablename = null;
    private $username = null;
    private $password = null;

    private static $instance;
    private static $connection;

/*
    the log levels are (most to least verbose)
    Debug: 0
    Info: 1
    Warning: 2
    Error: 3
*/

    private function __construct()
    {
        $this->LoadSettings();

        // Set up connection to the database.
        self::$connection = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);

        if(mysqli_connect_error()) {
            throw new Exception("connection failed");
        }
    }
    

    private function LoadSettings() {
        $settings = parse_ini_file("LogSettings.ini");
        $this->hostname = $settings["hostname"];
        $this->databasename = $settings["databasename"];
        $this->tablename = $settings["tablename"];
        $this->username = $settings["username"];
        $this->password = $settings["password"];
    }

    public static function GetInstance(): QuickLogger {
        if(self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function WriteMessage($message, $logLevel) {
        if($statement = self::$connection->prepare("INSERT INTO $this->tablename (Message, LogLevel) VALUES(?,?)")) {
            $statement->bind_param('si', $message, $logLevel);
            $statement->execute();
        }

        else {
            throw new Exception("Failed to insert logging record");
        }
    }

    public function Debug($message) {
        self::WriteMessage($message, 0);
    }
        
    public function Info($message) {
        self::WriteMessage($message, 1);
    }

    public function Warning($message) {
        self::WriteMessage($message, 2);
    }

    public function Error($message) {
        self::WriteMessage($message, 3);
    }
}
?>