@extends('layouts.app')

@section('title', 'Статистика')

@section('main_content')
<canvas id="activityChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('activityChart').getContext('2d');
    const data = @json($clickByHour);
    const labels = data.map(item => item.hour + ':00');
    const counts = data.map(item => item.count);
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Клики по часам',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>


@endsection
