<?php

declare(strict_types = 1);

namespace Bee;

use Bee\DroneBee;
use Bee\QueenBee;
use Bee\WorkerBee;

class Hive
{
    protected array $hiveArray = [];

    public function reset()
    {
        foreach ($this->hiveArray as &$bee) {
            $bee->restartLife();
        }
    }

    public function hasGameFinished(): bool
    {
        $queen = 0;
        $otherBee = 0;
        for ($i = 0, $length = count($this->hiveArray); $i < $length; $i++) {
            if ($this->hiveArray[$i]->type() === 'Queen' && $this->hiveArray[$i]->haveLife()) {
                if ($queen === 0) {
                    $queen = 1;
                }
            } elseif ($this->hiveArray[$i]->type() !== 'Queen' && $this->hiveArray[$i]->haveLife()) {
                if ($otherBee === 0) {
                    $otherBee = 1;
                }
            }
            if ($queen === 1 && $otherBee === 1) {
                return false;
            }
        }
        return true;
    }

    public function setHive(int $queens, int $workers, int $drones): void
    {
        for ($i = 0; $i < $queens; $i++) {
            $this->hiveArray[0] = new QueenBee(100, 8);
        }
        for ($i = $queens; $i < $workers + $queens; $i++) {
            $this->hiveArray[$i] = new WorkerBee(70, 10);
        }
        for ($i = $queens + $workers; $i < $drones + $workers + $queens; $i++) {
            $this->hiveArray[$i] = new DroneBee(50, 12);
        }
    }

    public function getHive(): array
    {
        return $this->hiveArray;
    }

    public function howManyBees(): int
    {
        return count($this->hiveArray);
    }

    public function beesAlive(): array
    {
        $array = [];
        foreach ($this->hiveArray as $key => $bee) {
            if ($bee->haveLife()) {
                $array[$key] = $key;
            }
        }
        return $array;
    }

    public function hitRandBee()
    {
        if (!empty($this->beesAlive())) {
            $index = array_rand($this->beesAlive(), 1);
            $this->hiveArray[$index]->reduceLife();
        }
        $array = $this->beesAlive();
    }
}
