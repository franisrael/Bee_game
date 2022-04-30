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
        'queens' => ['qty' => 1, 'life' => 100, 'hit' => 8],
        'workers' => ['qty' => 5, 'life' => 70, 'hit' => 10],
        'drones' => ['qty' => 8, 'life' => 50, 'hit' => 12]
    ]);

    $hive = new Hive(...BEES);
}

$beeArray = $hive->getHive();

$_SESSION['beeArray'] = $hive;

require __DIR__ . '/public/bees.php';
