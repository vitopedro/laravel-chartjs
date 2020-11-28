<canvas id="{{ $id }}" ></canvas>

<script src="{{ asset('vitopedro/chartjs/js/Chart.min.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script> -->
<script>
    var ctx = document.getElementById('{{ $id }}');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                @foreach ($labels as $label)
                    '{{ $label }}',
                @endforeach
            ],
            datasets: [
                @php
                    $i = 0;
                @endphp
                @foreach ($series as $row)
                {
                    label: '{{ $row['label'] }}',
                    data: [
                        @foreach ($row['data'] as $value)
                            {{ $value }},
                        @endforeach
                    ],
                    backgroundColor: '{{ $colorPalette[$i]['backgroundColor'] }}',
                    borderColor: '{{ $colorPalette[$i]['borderColor'] }}',
                    borderWidth: 1,
                    fill: false,
                },
                @php
                    $i++;
                    if ($i > count($colorPalette)) {
                        $i = 0;
                    }
                @endphp
                @endforeach
            ]
        },
        options: {
            title: {
                text: "{{ $title }}",
                display: {{ $hasTitle ? "true" : "false" }},
                fontSize: 16,
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>