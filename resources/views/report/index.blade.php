@extends('layout/layout')
@section('layout-title')
Report -
@endsection
@section('layout-style')
<style type="text/css">
  @media print {

    .print-btn,
    .layout-sidebar,
    header,
    .page-title {
      display: none;
    }

    .row-print {
      margin-bottom: 0 !important;
    }

    .col-print {
      margin-bottom: 12px;
    }

    .grafik {
      width: 560px !important;
    }

    @page {
      margin-top: 2cm;
    }
  }
</style>
@endsection
@section('layout-content')
<div class="row page-title">
  <div class="col-md-8">
    <h2>Report All Product Item</h2>
  </div>
  <div class="col-md-4 text-right">
    <button class="btn btn-primary print-btn" id="print-btn">Print Report</button>
  </div>
</div>
<div class="row mb-5">
  <div class="col-md-7">
    <div class="row mb-3 row-print">
      <div class="col-md-5 col-print">
        <div class="card report-card">
          <h5>Jumlah</h5>
          <h6>Keseluruhan Transaksi</h6>
          <div class="report-count">{{ $orders}}</div>
        </div>
      </div>
      <div class="col-md-7 col-print">
        <div class="card report-card">
          <h5>Total Keuntungan</h5>
          <h6>Keseluruhan Transaksi</h6>
          <div class="report-total">{{ $totalHargaJual - $totalHargaBeli }}</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 col-print">
        <div class="card report-card">
          <h5>Product Terlaris</h5>
          <h6><b>{{ $terlaris->product->nama }}</b>
            <br>Dengan total terjual sebanyak
          </h6>
          <div class="report-count">
            {{ $terlaris->total_amount}}
          </div>
        </div>
      </div>
      <div class="col-md-7 col-print">
        <div class="card report-card">
          <h5>Product Andalan</h5>
          <h6><b>{{ $andalan->product->nama }}</b>
            <br>Dengan total keuntungan sebanyak
          </h6>
          <div class="report-total">
            {{ $andalan->keuntungan }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card report-card text-center">
      <h5>Grafik</h5>
      <canvas id="grafikPerbandingan" class="grafik"></canvas>
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
            <th scope="col" class="text-center">Nama Produk</th>
            <th scope="col" class="text-center">Total Terjual</th>
            <th scope="col" class="text-center">Total HPP</th>
            <th scope="col" class="text-center">Total Harga Jual</th>
            <th scope="col" class="text-center">Total Keuntungan</th>
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
            <td align="center">{{ $transaction->product->nama }}</td>
            <td align="center">{{ $transaction->total_amount }}</td>
            <td align="center">{{ $transaction->total_harga_beli }}</td>
            <td align="center">{{ $transaction->total_harga_jual }}</td>
            <td align="center">{{ $transaction->keuntungan }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('layout-scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#print-btn').click(function () {
      window.print();
    });
  });
</script>
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