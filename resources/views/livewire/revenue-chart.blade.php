<div>
    <div class="card">
        <div class="card-body">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <script>
        var revenueChart = document.getElementById("revenueChart");

        new Chart(revenueChart, {
            type: 'bar',
            data: {
                labels: {{ Js::from($dates) }},
                datasets: [{
                    label: 'Doanh thu trong 7 ngày gần nhất',
                    data: {{ Js::from($revenue) }},
                    fill: false,
                    borderColor: '#2196f3',
                    backgroundColor: '#2196f3',
                    borderWidth: 1
                }]
            }
        });
    </script>
</div>



