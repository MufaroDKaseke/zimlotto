<?php

require_once '../../vendor/autoload.php';
require_once '../config.php';
require_once '../classes/db.class.php';
require_once '../classes/transaction.class.php';

$transact = new Transaction();
var_dump($transact->deposit(1, 32, 'Ecocahe'));