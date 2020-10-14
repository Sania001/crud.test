<template>
    <div class="container">
        <canvas id="myChart" width="400" height="400"></canvas>

    </div>
</template>

<script>
    import Chart from 'chart.js'
    export default {
        data() {
            return {
                dataRating: []
            }
        },
        methods: {
            ratingData: function () {
                this.dataRating = {
                    datasets: [{
                        label: 'First dataset',
                        data: [0, 20, 40, 50, 30, 15, 65, 45],
                        backgroundColor: 'transparent',
                        borderColor: 'red'
                    }, {
                        label: 'S dataset',
                        data: [5, 20, 35, 60, 75, 55, 50, 35],
                        backgroundColor: 'transparent',
                        borderColor: 'green'
                    }],
                    labels: ['January', 'February', 'March', 'April']
                };
            }
        },
        mounted() {
            this.ratingData();
            console.info(this.dataRating);
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = Chart.Line(ctx, {
                type: 'line',
                data: this.dataRating,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title: {
                        display: true,
                        text: 'Test Rating chart for points'
                    },
                    scales: {
                        yAxes: [{

                        }],
                    }
                }
            });
        }
    }
</script>
