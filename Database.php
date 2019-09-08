<?php


class Database
{
    private $host;
    private $db_name;
    private $db_username;
    private $db_password;

    private $debugmode = false; //Debugmode is off by default.

    /**
     * @var PDO
     */
    private $db;

    /**
     * Database constructor.
     * @param $host
     * @param $db_name
     * @param $db_username
     * @param $db_password
     */
    public function __construct($host, $db_name, $db_username, $db_password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
    }

    public function connect()
    {
        try
        {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->db_username, $this->db_password);
        }
        catch (PDOException $e)
        {
            //This will be displayed when the script can not connect to one or multiple databases, even when debug mode is disabled
            exit('Error connecting to one or multiple databases. Please check your database credentials.');
        }
    }

    public function dbdebug($debugmode)
    {
        if (is_bool($debugmode)) {
            $this->debugmode = $debugmode; //Sets debugmode to either true or false

            if ($this->db && $debugmode == true) {
                echo 'Connected!'; //Only will be displayed when debugmode is enabled
            }
        } else {
            echo 'Debug mode must be either True or false';
        }
    }

    public function query($query)
    {
            $statement = $this->db->prepare($query);
            $statement->execute();
    }
}