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

  // Get Number of Tickets
  public function getNumberOfTickets($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT COUNT(*) as ticket_count FROM tickets WHERE user_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $ticketCount = mysqli_fetch_assoc($result)['ticket_count'];
  
    $this->close();
    return $ticketCount;
  }

  // Get Number of Won Tickets
  public function getNumberOfWonTickets($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT COUNT(*) as won_ticket_count FROM tickets WHERE user_id = ? AND status = 'won'");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $wonTicketCount = mysqli_fetch_assoc($result)['won_ticket_count'];
  
    $this->close();
    return $wonTicketCount;
  }

  // Get Number of Lost Tickets
  public function getNumberOfLostTickets($userId = null) {
    $this->connect();
    if (is_null($userId)) {
      $userId = $_SESSION['id'];
    }
    $stmt = mysqli_prepare($this->db_conn, "SELECT COUNT(*) as lost_ticket_count FROM tickets WHERE user_id = ? AND status = 'lost'");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $lostTicketCount = mysqli_fetch_assoc($result)['lost_ticket_count'];
  
    $this->close();
    return $lostTicketCount;
  }
}


?>