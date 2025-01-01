<template>
    <div class="">
        <p class="h-600px text-xl font-bold">
            Total Website Visits in the last 6 months
        </p>
        <LineChart :data="chartData" :options="chartOptions" />

        <p class="mt-8 text-xl font-bold">Distribution of Content Types</p>
        <div class="flex h-[300px] justify-center">
            <PieChart :data="pieChartData" :options="pieChartOptions" />
        </div>
    </div>
</template>

<script>
import {
    ArcElement,
    CategoryScale,
    Chart as ChartJS,
    Legend,
    LinearScale,
    LineElement,
    PointElement,
    Title,
    Tooltip,
} from 'chart.js';
import { Line, Pie } from 'vue-chartjs'; // Import Pie chart

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    PointElement,
    CategoryScale,
    LinearScale,
    ArcElement, // Register ArcElement for Pie chart
);

export default {
    components: {
        LineChart: Line,
        PieChart: Pie, // Register Pie component
    },
    data() {
        return {
            // Dummy data for user graph
            chartData: {
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                ],
                datasets: [
                    {
                        label: 'Users',
                        data: [65, 59, 80, 81, 56, 55], // Example data points (e.g., number of users)
                        borderColor: '#42A5F5',
                        backgroundColor: 'rgba(66, 165, 245, 0.2)',
                        fill: true,
                    },
                ],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
            // Pie chart data for Blogs, Events, Services
            pieChartData: {
                labels: ['Blogs', 'Events', 'Services'],
                datasets: [
                    {
                        data: [10, 15, 6],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    },
                ],
            },
            pieChartOptions: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        };
    },
};
</script>

<style scoped>
div {
    width: 100%; /* Make the width full */
    height: 600px;
    margin: 0 auto;
}
</style>
