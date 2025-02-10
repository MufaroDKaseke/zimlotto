<?php


class Database {
  private $db_host;
  private $db_username;
  private $db_password;
  private $db_name;
  public $db_conn;

  public function __construct() {
  }

  // Connect Database
  public function connect() {
    // Create connection
    $this->db_conn = mysqli_connect($_ENV["DB_HOST"], $_ENV['DB_USERNAME'], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);
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
