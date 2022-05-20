<?php
    include 'php/QuickLogger.php';
    require_once 'php/ConnectVars.php';
    
class Controller {
    
    protected $dbc;

    public function __construct() {
        $log = QuickLogger::GetInstance();

        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try
        {
            $this->dbc = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        }       
        catch (Exception $ex)
        {
            $log->Error($ex->getMessage());
        }
    }

    public function model($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {        
        require_once 'views/' . $view . '.php';
    }
}
?>