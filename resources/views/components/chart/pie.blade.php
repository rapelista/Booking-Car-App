<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-pie pt-4">
            <canvas id="{{ $id }}"></canvas>
        </div>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Solar
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Pertalite
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Pertamax Turbo
            </span>
            <span class="mr-2">
                <i class="fas fa-circle text-warning"></i> Dexlite
            </span>
        </div>
    </div>
</div>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    (Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = "#858796";

    // Pie Chart Example
    var ctx = document.getElementById("{{ $id }}");
    var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: [
                @foreach ($labels as $label)
                    '{{ $label }}',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach ($values as $value)
                        {{ $value }},
                    @endforeach
                ],
                backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#EEC458"],
                hoverBackgroundColor: ["#2e59d9", "#17a673", "#2c9faf", "#C89D3A"],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            cutoutPercentage: 80,
        },
    });
</script>
