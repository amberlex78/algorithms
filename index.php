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
    function getDataFromCanvas() {
        const canvas = document.getElementById('chart');
        return {
            canvas: canvas,
            ctx: canvas.getContext('2d'),
            label: canvas.getAttribute('data-label'),
            x: JSON.parse(canvas.getAttribute('data-x')),
            y: JSON.parse(canvas.getAttribute('data-y'))
        };
    }

    function createChart(data) {
        return new Chart(data.ctx, {
            type: 'line',
            data: {
                labels: data.x,
                datasets: [{
                    label: data.label,
                    data: data.y,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
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
    }

    const chartData = getDataFromCanvas();
    const myChart = createChart(chartData);
</script>


