<?php
/**
 * User: lufei
 * Date: 2020/9/4
 * Email: lufei@swoole.com
 */

namespace App\JsonRpc;


interface CalculatorServiceInterface
{
    public function add(int $a, int $b): int;
}