<?php

class User extends Database {
   
  // Get All Tickets
  public function getAllTickets($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM tickets WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $tickets = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $this->close();
    return $tickets;
  }

  // Get All Transactions
  public function getAllTransactions($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM transactions WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    $this->close();
    return $transactions;
  }

  // Get User Balance
  public function getUserBalance($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT balance FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $balance = mysqli_fetch_assoc($result)['balance'];

    $this->close();
    return $balance;
  }
}

?>