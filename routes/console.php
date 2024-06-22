<?php

use Illuminate\Support\Facades\Schedule;
use Laravel\Cashier\Console\Commands\CashierRun;

Schedule::command(CashierRun::class)
    ->everyMinute()
    ->withoutOverlapping();
