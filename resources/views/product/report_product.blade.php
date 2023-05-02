@extends('layout/layout')
@section('layout-title')
Report {{ $product->nama }} -
@endsection
@section('layout-content')
<div class="row page-title">
  <div class="col-md-12">
    <h2>Report {{ $product->nama }}</h2>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md-7">
    <div class="row mb-3">
      <div class="col-md-5">
        <div class="card report-card">
          <h5>Jumlah Terjual</h5>
          <h6>Keseluruhan Product Tersebut</h6>
          <div class="report-count">{{ $totalPenjualan }}</div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card report-card">
          <h5>Total Keuntungan</h5>
          <h6>Keseluruhan Product Tersebut</h6>
          <div class="report-total">{{ $totalHargaJual - $totalHargaBeli }}</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="card report-card">
          <h5>Amount Terbanyak</h5>
          <h6>Dalam 1 order</h6>
          <div class="report-count">
            @if(!empty($maxAmount))
            {{ $maxAmount->amount }}
            @else
            0
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card report-card">
          <h5>Keuntungan Terbanyak</h5>
          <h6>Dalam 1 order</h6>
          <div class="report-total">
            @if(!empty($maxAmount))
            {{ ($maxAmount->harga_jual * $maxAmount->amount) - ($maxAmount->harga_beli *
            $maxAmount->amount) }}
            @else
            0
            @endif</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card report-card">
      <h5>Grafik</h5>
      <canvas id="grafikPerbandingan"></canvas>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card report-card">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Order ID</th>
            <th scope="col" class="text-center">Amount</th>
            <th scope="col" class="text-center">HPP</th>
            <th scope="col" class="text-center">Harga Beli</th>
          </tr>
        </thead>
        <tbody>
          @if (count($transactions) === 0)
          <tr>
            <td colspan="5" align="center">Data not found</td>
          </tr>
          @endif
          @foreach ($transactions as $key => $transaction)
          <tr>
            <td align="center">{{ $key + 1 }}</td>
            <td align="center">{{ $transaction->orders_id }}</td>
            <td align="center">{{ $transaction->amount }}</td>
            <td align="center">{{ $transaction->harga_beli }}</td>
            <td align="center">{{ $transaction->harga_jual }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('layout-scripts')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
  var ctx = document.getElementById('grafikPerbandingan').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total HPP', 'Total Harga Jual'],
      datasets: [{
        label: 'Perbandingan Total HPP dan Harga Jual',
        data: [{{ $totalHargaBeli }}, {{ $totalHargaJual }}],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)'
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)'
    ],
    borderWidth: 1
  }]
        },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
    });
</script>

@endsection