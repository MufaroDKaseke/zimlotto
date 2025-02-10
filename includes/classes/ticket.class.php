<?php

class Ticket extends Database {

  public function __construct() {
    parent::__construct();
  }

  // Generate ticket number
  private function generateId() {
    $a = '';
    for ($i = 0; $i < 8; $i++) {
      $a .= mt_rand(0, 9);
    }

    return (int) $a;
  }

  // Purchase
  public function purchaseTicket($data) {
    $this->connect();

    // Prepare data
    $data['status'] = 'pending';
    $data['id'] = $this->generateId();
    $data['num_1'] = (int) $data['num_1'];
    $data['num_2'] = (int) $data['num_2'];
    $data['num_3'] = (int) $data['num_3'];
    $data['num_4'] = (int) $data['num_4'];
    $data['num_5'] = (int) $data['num_5'];
    $data['num_6'] = (int) $data['num_6'];
    $data['price'] = (float) $data['price'];
    $data['user_id'] = $_SESSION['id'];

    $stmt = mysqli_prepare($this->db_conn, "INSERT INTO tickets VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
    mysqli_stmt_bind_param($stmt, 'isiiiiiidsi', $data['id'], $data['draw_date'], $data['num_1'], $data['num_2'], $data['num_3'], $data['num_4'], $data['num_5'], $data['num_6'], $data['price'], $data['status'], $data['user_id']);
    $result = mysqli_stmt_execute($stmt);
    $this->close();
    return $result;
  }

  // Get ticket details
  public function getTicketById($id) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM tickets WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $ticket = mysqli_fetch_assoc($result);

    $this->close();
    return $ticket;
  }

  // Get tickets by user

  

}
