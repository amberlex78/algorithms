<?php

namespace Algorithms\ExponentialTime;

class Fibonacci
{
    public static function fibonacci($n): mixed
    {
        if ($n <= 1) {
            return $n;
        }

        return self::fibonacci($n - 1) + self::fibonacci($n - 2);
    }

    public static function getDataForGraph(int $n): array
    {
        // Generate Fibonacci sequence
        $fibonacciSequence = array_map(fn ($i) => self::fibonacci($i), range(0, $n));

        // Create data for Chart.js
        $x = range(0, count($fibonacciSequence));
        $y = $fibonacciSequence;

        // Prepare data for passing to JavaScript and return
        return [json_encode($x), json_encode($y)];
    }
}
