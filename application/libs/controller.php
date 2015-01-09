<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;
    
    public static $message = null;

    /**
     * Whenever a controller is created, open a database connection too. The idea behind is to have ONE connection
     * that can be used by multiple models (there are frameworks that open one connection per model).
     */
    function __construct()
    {
        Session::init();
//        if (!isset($_SESSION['user_logged_in'])) {
//            header('location: ' . URL . 'login');
//        }
        $this->openDatabaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS,$options);
    }

    /**
     * Load the model with the given name.
     * loadModel("SongModel") would include models/songmodel.php and create the object in the controller, like this:
     * $songs_model = $this->loadModel('SongsModel');
     * Note that the model class name is written in "CamelCase", the model's filename is the same in lowercase letters
     * @param string $model_name The name of the model
     * @return object model
     */
    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        // return new model (and pass the database connection to the model)
        return new $model_name($this->db);
    }
    
    /**
     * Renderiza mensagem paa o usupario 
     * @param string $mesagem mensagem para ser exibida
     * @param array $option option atributos html
     */
    public function setflash($message, $options)
    {
        Session::init();
        if (isset($message) && isset($options)){
             $html = '<div class="'. $options['class'] . '">' . $message . '</div>';
             $_SESSION['message'] = $html;
         
        }
        
    }
  
    public function getFlash(){
        if (isset($_SESSION['message'])){
 
            print_r($_SESSION['message']);
           $_SESSION['message'] = null;
        }
        
        //unset($_SESSION['message']);
    }

    public  function resirect($options, $parans)
    {
        $url = URL;
        foreach ($options as $key => $value){
            if ($key == 'controller'){
                $url .= $value;
            }           
            if ($key == 'action'){
                $url .= $value;
            }
        }
        
        foreach ($parans as $param){
            $url .= "/$param";
        }
    }
}
