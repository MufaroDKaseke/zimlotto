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

$results->generateLottoNumbers();

?>