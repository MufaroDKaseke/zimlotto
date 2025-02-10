<?php


class Database {
  private $db_host;
  private $db_username;
  private $db_password;
  private $db_name;
  public $db_conn;

  public function __construct() {
    $this->db_host = $_ENV["DB_HOST"];
    $this->db_username = $_ENV["DB_USERNAME"];
    $this->db_password = $_ENV["DB_PASSWORD"];
    $this->db_name = $_ENV["DB_NAME"];
  }

  // Connect Database
  public function connect() {
    // Create connection
    $this->db_conn = mysqli_connect($this->db_host, $this->db_username, $this->db_password, $this->db_name);
    // Check connection
    if (!$this->db_conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  // Close DB
  public function close() {
    return mysqli_close($this->db_conn);
  }
}
