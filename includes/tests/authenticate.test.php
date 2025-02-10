<?php

require_once '../../vendor/autoload.php';
require_once '../config.php';
require_once '../classes/db.class.php';
require_once '../classes/authenticate.class.php';
var_dump($_ENV);
$session = new Authenticate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<p><?=$_SESSION;?></p>
</body>
</html>