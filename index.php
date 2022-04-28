<?php

declare(strict_types = 1);

use Bee\Hive;

require_once __DIR__ . '/vendor/autoload.php';

session_start();

if (isset($_SESSION['beeArray'])) {
    $hive = $_SESSION['beeArray'];
    if ($_POST['button'] === 'Submit') {
        $hive->hitRandBee();
    } else {
        $hive->reset();
    }
} else {
    define('BEES', [
        'queens' => 1,
        'workers' => 5,
        'drones' => 8
    ]);

    $hive = new Hive();

    $hive->setHive(...BEES);
}

$beeArray = $hive->getHive();

$_SESSION['beeArray'] = $hive;

require __DIR__ . '/public/bees.php';
