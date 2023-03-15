<?php

declare(strict_types=1);

namespace Frameworks\Laravel;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

final class ConsoleKernel extends Kernel
{
    protected $commands = [];

    protected function schedule(Schedule $schedule): void
    {
    }
}
