<?php

namespace Bee;

interface BeeInterface
{
    public function deducePoints(): bool;

    public function restartPoints(): bool;

    public function havePoints(): bool;
}
