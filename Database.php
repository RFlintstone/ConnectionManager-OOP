<?php


class Database
{
    private $host;
    private $db_name;
    private $db_username;
    private $db_password;

    private $debugmode = false;

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
            exit('Error Connecting To DataBase');
        }
    }

    public function debug($debugmode)
    {
        $this->debugmode = $debugmode;
    }

    public function checkdebug()
    {
        return $this->debugmode;
    }

    public function query($query)
    {
            $statement = $this->db->prepare($query);
            $statement->execute();
    }
}