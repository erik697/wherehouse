
    @extends('layouts.app')

    @section('content')
    <div class="card mb-4 mx-4">
        <div class="card-header">
            Wherehouse Management
        </div>

        <form action="{{ route('manageWherehouse.storeNewProduct') }}" method="POST" class="card-body">
            @csrf
            <input type="hidden" value="{{ $wherehouse_id }}" name="wherehouse_id" >
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" id="code" name="code" class="form-control" id="code" aria-describedby="codeHelp" tabIndex="2" required oninput="addFunction()">
            </div>
            <button id="addAction" type="button" class="btn btn-primary mb-4">Add</button>
                <div class="mx-4" id="listProduct">
                    <div class="row">
                        <div class="col-sm">
                        Nama
                        </div>
                        <div class="col-sm">
                        type
                        </div>
                        <div class="col-sm">
                        status
                        </div>
                        <div class="col-sm">
                        Amount
                        </div>
                        <div class="col-sm">
                        Action
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btn-icon-split float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Save</span>
            </button>
        </form>
    </div>


    <script type="text/javascript">
let i = 1;
    function getProduct(){
        let code = document.getElementById("code").value;
                let data = {
                    "_token": "{{ csrf_token() }}",
                    "code" : code
                }
                    $.ajax({
                        url: `{{ route('manageWherehouse.getProduct') }}`,
                        'method': 'POST',
                        data: data,
                    }).done(function (data) {
                        if(data.products){
                            console.log(data)
                            $("#listProduct").append(`<div id="product`+i+`" class="row mt-4">
                                 <input type="hidden" name="product_id[]" value=`+data.products.id+` >
              <div class="col-sm">
                <input type="text" value=`+data.products.name+` class="form-control" id="product_id" aria-describedby="in_goodHelp"">
              </div>
               <div class="col-sm">
              <select class="form-control" name="type[]">
                    <option value="in">In</option>
                    <option value="out">Out</option>
              </select>
                </div>
             <div class="col-sm">
                <select class="form-control" name="status[]">
                    <option value="good">Good</option>
                    <option value="bad">Bad</option>
                </select>
            </div>
              <div class="col-sm">
                <input type="number" name="amount[]" class="form-control" id="product_id" aria-describedby="in_goodHelp"">
              </div>
              <div class="col-sm">
                <button type="button" class="btn btn-danger" onclick="removeRow(`+i+`)">Hapus</button>
              </div>
            </div>`);
                        }
                        else{
                            alert('Product tidak ditemukan!, cek data product pada menu product')
                        }
                    }).fail(function (data) {
                        console.log("🚀 ~ file: list.js ~ line 10 ~ data", data)
                    });
                
    }

        function removeRow(n){
            $('#product'+i).remove();
            
        }
        $(document).on('keypress', 'input,select', function (e) {
            if (e.which == 13) {
                e.preventDefault();
                getProduct()
            }
        });

        $(document).ready(function(){
            $("#addAction").click(function(){
               getProduct()
            });
            });
        
        </script>
    @endsection

