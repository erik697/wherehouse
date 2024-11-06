
    @extends('layouts.app')

    @section('content')
         <!-- Begin Page Content -->
         <div class="container-fluid">

            <!-- Page Heading -->
            <div class="h3 mb-2 text-gray-800">
                <form action="{{ route('manageWherehouse.index') }}" class="row ">
                <select class="custom-select col-md-11" name="id">
                    <option selected disabled>-- Wherehouse --</option>
                    @foreach($wherehouses as $item)
                        <option value="{{ $item->id }}" @if($id==$item->id) selected @endif>{{ $item->code }} | {{ $item->name }}</option>
                    @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary btn-icon-split mx-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-search"></i>
                    </span>
                    <span class="text">Search</span>
                </button>

                </form>
            </div>

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
                    <h6 class="m-0 font-weight-bold text-primary">List Product</h6>
                </div>
                <div class="card-body">
                {{-- add button start --}}
                    <a href="{{ route('manageWherehouse.createNewProduct', ['wherehouse_id'=>$id]) }}" class="btn btn-primary btn-icon-split mb-2">
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
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Good</th>
                                    <th>Bad</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Good</th>
                                    <th>Bad</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($products as $item )
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->good }}</td>
                                    <td>{{ $item->bad }}</td>
                                    <td>{{ rupiah($item->amount) }}</td>
                                    <td>
                                        <a href="{{ route('manageWherehouse.listLogs', ['id'=>$item->id]) }}" class="btn btn-warning mb-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                        </a>
                                        
                                        
                                    </td>
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

