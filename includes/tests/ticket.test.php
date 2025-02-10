<?php

require_once '../../vendor/autoload.php';
require_once '../config.php';
require_once '../classes/db.class.php';
require_once '../classes/ticket.class.php';

$ticket = new Ticket();
var_dump($ticket->purchaseTicket($_GET));
