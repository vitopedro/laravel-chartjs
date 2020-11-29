<canvas id="{{ $id }}" ></canvas>

<script src="{{ asset('vitopedro/chartjs/js/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('{{ $id }}');
    var {{ $id }} = new Chart(ctx, {
        type: '{{ $type }}',
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
                    fill: {{ $fill }},
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