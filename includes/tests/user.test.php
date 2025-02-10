<?php

require_once '../../vendor/autoload.php';
require_once '../config.php';
require_once '../classes/db.class.php';
require_once '../classes/user.class.php';

$user = new User();
var_dump($user->getUserBalance(1));
