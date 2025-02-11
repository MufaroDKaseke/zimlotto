<?php

class Results extends Database {

  public function __construct() {
    parent::__construct();
  }

  // Generate Numbers For The Day
  public function generateLottoNumbers() {
    $this->connect();

    $numbers = [];
    while (count($numbers) < 6) {
      $num = rand(1, 49);
      if (!in_array($num, $numbers)) {
        $numbers[] = $num;
      }
    }

    $draw_date = date('Y-m-d');
    $stmt = mysqli_prepare($this->db_conn, "INSERT INTO results (draw_date, num_1, num_2, num_3, num_4, num_5, num_6) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'siiiiii', $draw_date, $numbers[0], $numbers[1], $numbers[2], $numbers[3], $numbers[4], $numbers[5]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $this->close();
  }

  // Get Results For Day
  public function getLottoResults($date) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM results WHERE draw_date = ?");
    mysqli_stmt_bind_param($stmt, 's', $date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $results = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    $this->close();

    return $results;
  }

  // Get All Lotto Results
  public function getAllLottoResults() {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT * FROM results ORDER BY draw_date DESC");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $results = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $results[] = $row;
    }

    mysqli_stmt_close($stmt);
    $this->close();

    return $results;
  }

  // Get Top Winners
  public function getTopWinners($limit) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, "SELECT u.username FROM tickets t JOIN users u ON t.user_id = u.id WHERE t.status = 'won' LIMIT ?");
    mysqli_stmt_bind_param($stmt, 'i', $limit);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $winners = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $winners[] = $row['username'];
    }

    mysqli_stmt_close($stmt);
    $this->close();

    return $winners;
  }
}
?>