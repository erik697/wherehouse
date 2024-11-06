
@extends('layouts.app')

@section('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        @foreach ($wherehouses as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('manageWherehouse.index',['id'=>$item->id]) }}">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $item->name }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item->amount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        @endforeach
        <input type="hidden" value="{{ $listProductBad }}" id="badName"> 
        <input type="hidden" value="{{ $listProductBadC }}" id="badCount"> 
        <input type="hidden" value="{{ $listProductGood }}" id="goodName"> 
        <input type="hidden" value="{{ $listProductGoodC }}" id="goodCount"> 
        <div class="row">
            <div class="col-md-6">
                <canvas id="goodChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="badChart"></canvas>
            </div>

        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const ctb = document.getElementById('badChart');
  const badName = document.getElementById('badName').value;
  const badCount = document.getElementById('badCount').value;
  new Chart(ctb, {
    type: 'bar',
    data: {
      labels: JSON.parse(badName),
      datasets: [{
        label: 'Most Product in Bad',
        data: JSON.parse(badCount),
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

<script>
    const ctg = document.getElementById('goodChart');
    const goodName = document.getElementById('goodName').value;
    const goodCount = document.getElementById('goodCount').value;
    new Chart(ctg, {
      type: 'bar',
      data: {
        labels: JSON.parse(goodName),
        datasets: [{
          label: 'Most Product in Good',
          data: JSON.parse(goodCount),
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
    <!-- /.container-fluid -->
@endsection

