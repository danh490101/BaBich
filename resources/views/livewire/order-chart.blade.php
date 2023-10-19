<div>
    <div class="card">
        <div class="card-body">
            <canvas id="orderChart"></canvas>
        </div>
    </div>

    <script>
        var orderChart = document.getElementById("orderChart");

        new Chart(orderChart, {
                    type: 'line',
                    data: {
                    labels: {{ Js::from($dates) }},
                    datasets: [{
                    label: 'Số lượng đơn hàng trong 7 ngày gần nhất',
                    data: {{ Js::from($counts) }},
                    fill: false,
                    borderColor: '#2196f3',
                    backgroundColor: '#2196f3',
                    borderWidth: 1
                }]
            }
        });
    </script>
</div>



