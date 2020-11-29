<canvas id="{{ $id }}" ></canvas>

<script src="{{ asset('vitopedro/chartjs/js/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById('{{ $id }}');
    var {{ $id }} = new Chart(ctx, {
        type: 'pie',
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
                    backgroundColor: [
                        @for ($i = 0; $i < count($row['data']); $i++)
                            @php
                                $index = $i % count($colorPalette);
                                //echo $index;
                            @endphp
                            '{{ $colorPalette[$index]["borderColor"] }}',
                        @endfor
                    ],
                    //borderWidth: 1,
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
        }
    });
</script>