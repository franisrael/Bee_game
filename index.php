<?php

declare(strict_types = 1);

use Bee\Hive;

require_once __DIR__ . '/vendor/autoload.php';

session_start();

if (isset($_SESSION['beeArray'])) {
    $hive = $_SESSION['beeArray'];
    // var_dump($bees);
    // echo $hive->howManyBees();
    // echo $_POST['button'];
    // echo $hive->hasGameFinished();
    if ($_POST['button'] === 'Submit') {
        $hive->hitRandBee();
    } else {
        $hive->reset();
    }
    // foreach ($bees as $bee) {
    //     var_dump($bee);
    // }
} else {
    define('QUEENS', 1);
    define('WORKERS', 5);
    define('DRONES', 8);
    
    $hive = new Hive();

    $hive->setHive(QUEENS, WORKERS, DRONES);
}

$beeArray = $hive->getHive();

$_SESSION['beeArray'] = $hive;
// session_unset();
// session_destroy();

require __DIR__ . '/public/bees.php';
