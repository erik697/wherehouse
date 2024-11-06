
    @extends('layouts.app')

    @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">{{ $product->name }} | {{ rupiah($product->price) }}</h1>

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $product->name }}</h6>
                </div>
                <div class="card-body">
                {{-- add button start --}}
                    <a href="{{ route('manageWherehouse.createNewProduct') }}" class="btn btn-primary btn-icon-split mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add</span>
                    </a>
                {{-- add button end --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($logs as $item )
                                <tr>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->wherehouseProduct ? date('Y-m-d', strtotime($item->wherehouseProduct->register)) : '' }}</td>
                                    
                                </tr>        
                                @endforeach
                               
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    @endsection

