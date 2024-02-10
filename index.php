<?php

require_once __DIR__.'/vendor/autoload.php';

use Algorithms\ExponentialTime\Fibonacci;

$label = 'Fibonacci';
[$data_x, $data_y] = Fibonacci::getDataForGraph(10);

?>

<style>
    .canvas-container {
        width: 640px;
        height: 640px;
    }
</style>

<div class="canvas-container">
    <canvas id="chart"
            data-label="<?= $label ?>"
            data-x="<?= $data_x ?>"
            data-y="<?= $data_y ?>">
    </canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get data from PHP
    const canvas = document.getElementById('chart');
    const ctx = canvas.getContext('2d');
    const label = canvas.getAttribute('data-label');
    const x = JSON.parse(canvas.getAttribute('data-x'));
    const y = JSON.parse(canvas.getAttribute('data-y'));

    // Create chart using Chart.js
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: x,
            datasets: [{
                label: label,
                data: y,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


