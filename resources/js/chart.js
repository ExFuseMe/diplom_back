import {
    Chart,
    LineController,
    LineElement,
    PointElement,
    LinearScale,
    Title,
    CategoryScale,
    Filler
} from 'chart.js';
import 'chart.js/auto';

Chart.register(LineController, LineElement, PointElement, LinearScale, Title, CategoryScale, Filler);

function createChart(ctx, { labels, data }) {
    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: false
                },
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // убираем вертикальную сетку
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#CBD5E1', // Tailwind slate-300
                        borderDash: [6, 4] // пунктир
                    }
                }
            }
        }
    });
}
window.createChart = createChart;

document.addEventListener('DOMContentLoaded', () => {
    if (window.chartData) {
        const ctx = document.getElementById('myChart').getContext('2d');
        createChart(ctx, window.chartData);
    }
});
