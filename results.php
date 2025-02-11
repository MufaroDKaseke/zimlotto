<?php
require_once './vendor/autoload.php';
require_once './includes/config.php';
require_once './includes/classes/db.class.php';
require_once './includes/classes/authenticate.class.php';
require_once './includes/classes/user.class.php';
require_once './includes/classes/results.class.php';

$session = new Authenticate();
$user = new User();
$results = new Results();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/custom.css">
  <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

  <div class="d-flex">
    <sidebar class="dash-sidebar flex-column bg-dark bg-light" style="height: 100vh;">
      <h4 class="p-3 text-center">ZimLotto</h4>
      <ul class="nav flex-column my-4">
        <li class="nav-item">
          <a class="nav-link" href="./dashboard.php"><i class="bi bi-house"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./tickets.php"><i class="bi bi-ticket-perforated"></i>Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./results.php"><i class="bi bi-bar-chart"></i>Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./transact.php"><i class="bi bi-cash"></i>Transact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./settings.php"><i class="bi bi-gear-wide-connected"></i>Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </li>
      </ul>
    </sidebar>
    <div class="flex-grow-1">
      <nav class="navbar navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="data:image/png;base64,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" alt="lotto" class="me-2" width="25px" height="25px">
            <small class="fw-bold" style="font-family: 'Poppins', serif;">US$ <?= $user->getUserBalance() ?></small>
          </a>
          <form class="d-flex ms-auto me-3">
            <div class="input-group">
              <input class="form-control form-control bg-transparent" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </div>
          </form>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item fw-semibold text-center">@<?= $_SESSION['username'] ?></a></li>
              <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container mt-4">
        <h1>Results</h1>
        <p>Here are the results from previous days</p>
        <div class="row">
          <div class="col-12 mb-4">
            <div class="card">
              <div class="card-header bg-primary text-white">
                Today's Result (<?= date('Y-m-d')?>)
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-around">
                  <?php
                  $todayResult = $results->getLottoResults(date('Y-m-d'));
                  $winningNumbers = [$todayResult['num_1'], $todayResult['num_2'], $todayResult['num_3'], $todayResult['num_4'], $todayResult['num_5'], $todayResult['num_6']];
                  $colors = ['#f39c12', '#e74c3c', '#8e44ad', '#3498db', '#2ecc71'];
                  foreach ($winningNumbers as $index => $number) {
                    $color = $colors[$index % count($colors)];
                    echo '<div class="lotto-ball" style="background-color: ' . $color . ';">' . $number . '</div>';
                  }
                  ?>
                </div>
                <p class="card-text">Jackpot: $1,000,000.00</p>
                <p class="card-text">Match 5 balls: $500,000.00 🤑</p>
                <p class="card-text">Match 4 balls: $100,000.00 💰</p>
                <p class="card-text">Match 3 balls: $10,000.00 🎉</p>
                <p class="card-text">Match 2 balls: $1,000.00 😎</p>
                <p class="card-text">Match 1 ball: $100.00 🤪</p>
                <p class="card-text">No match: Better luck next time! 🍀</p>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="accordion" id="resultsAccordion">
              <!-- <div class="accordion-item">
                <h2 class="accordion-header" id="heading2023-10-09">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2023-10-09" aria-expanded="false" aria-controls="collapse2023-10-09">
                    2023-10-09
                  </button>
                </h2>
                <div id="collapse2023-10-09" class="accordion-collapse collapse" aria-labelledby="heading2023-10-09" data-bs-parent="#resultsAccordion">
                  <div class="accordion-body">
                    <p>Winning Numbers: 11, 22, 33, 44, 55</p>
                    <p>Jackpot: $900,000.00</p>
                  </div>
                </div>
              </div> -->
              <?php

              foreach ($results->getAllLottoResults() as $dateResult) {
              ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?= $dateResult['draw_date'] ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $dateResult['draw_date'] ?>" aria-expanded="false" aria-controls="collapse<?= $dateResult['draw_date'] ?>">
                      <?= $dateResult['draw_date'] ?>
                    </button>
                  </h2>
                  <div id="collapse<?= $dateResult['draw_date'] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $dateResult['draw_date'] ?>" data-bs-parent="#date$dateResultsAccordion">
                    <div class="accordion-body">
                      <p>Winning Numbers: <?= $dateResult['num_1'] ?>, <?= $dateResult['num_2'] ?>, <?= $dateResult['num_3'] ?>, <?= $dateResult['num_4'] ?>, <?= $dateResult['num_5'] ?>, <?= $dateResult['num_6'] ?></p>
                      <p>Jackpot: $900,000.00</p>
                    </div>
                  </div>
                </div>
              <?php
              }

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./node_modules/jquery/dist/jquery.min.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>