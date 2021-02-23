@section('jquery')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($incidents as $incident)
                    @if($incident->finalized == 0)
                       'Open',
                       @else
                       'Closed'
                    @endif
                    @endforeach
                ],
                datasets: [{
                    label: 'Open Vs Closed',
                    data: [
                        @foreach($incidents as $incident)
                             {{$incident->total}},
                         @endforeach
                    ],
                    backgroundColor: [

                        @foreach($incidents as $incident)
                        'rgba({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}}, 0.5)',
                         @endforeach
                    ],
                    borderColor: [
                        @foreach($incidents as $incident)
                        'rgba({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}}, 0.5)',
                         @endforeach
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
