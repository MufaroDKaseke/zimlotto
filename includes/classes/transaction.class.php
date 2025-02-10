<?php
class Transaction extends Database {
  
  public function deposit($user_id, $amount, $method) {
  $this->connect();

  $type = 'deposit';
  $stmt = mysqli_prepare($this->db_conn, "INSERT INTO transactions (type, amount, method, user_id) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, 'sisi', $type, $amount, $method, $user_id);
  mysqli_stmt_execute($stmt);

  $transaction_id = mysqli_insert_id($this->db_conn);

  if ($transaction_id) {
    $update_stmt = mysqli_prepare($this->db_conn, "UPDATE users SET balance = balance + ? WHERE id = ?");
    mysqli_stmt_bind_param($update_stmt, 'ii', $amount, $user_id);
    mysqli_stmt_execute($update_stmt);
  }

  $this->close();
  return $transaction_id;
  }

  public function withdraw($user_id, $amount, $method) {
  $this->connect();

  $type = 'withdraw';
  $stmt = mysqli_prepare($this->db_conn, "INSERT INTO transactions (type, amount, method, user_id) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, 'sisi', $type, $amount, $method, $user_id);
  mysqli_stmt_execute($stmt);

  $transaction_id = mysqli_insert_id($this->db_conn);

  if ($transaction_id) {
    $update_stmt = mysqli_prepare($this->db_conn, "UPDATE users SET balance = balance - ? WHERE id = ?");
    mysqli_stmt_bind_param($update_stmt, 'ii', $amount, $user_id);
    mysqli_stmt_execute($update_stmt);
  }

  $this->close();
  return $transaction_id;
  }
}
?>