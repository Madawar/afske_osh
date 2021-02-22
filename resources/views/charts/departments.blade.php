@section('jquery')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($incidents as $incident)
                       '{{$incident->department->name}}',
                       @endforeach
                ],
                datasets: [{
                    label: 'Assigned Per Department',
                    data: [
                        @foreach($incidents as $incident)
                             {{$incident->total}},
                         @endforeach
                    ],
                    backgroundColor: [
                        <?php
                        function random_color_part() {
                            return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
                        }
                        ?>
                        @foreach($incidents as $incident)
                        'rgba({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}}, 0.5)',
                         @endforeach
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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
@endsection
