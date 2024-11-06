
@extends('layouts.app')

@section('content')
<div class="card mb-4 mx-4">
    <div class="card-header">
        Input Product
    </div>
    <form action="{{ route('products.update',$product->id) }}" method="POST" class="card-body">
        @method('PUT')
        @csrf
        {{-- <input type="hidden" value="1" name="wherehouse_id" > --}}
        
            <div class="form-group">
                <label for="in_good">In Good</label>
                <input type="number" name="in_good" class="form-control" id="in_good" aria-describedby="in_goodHelp" tabIndex="2" required oninput="addFunction()">
            </div>
            <div class="form-group">
                <label for="in_bad">In Bad</label>
                <input type="number" name="in_bad" class="form-control" id="in_bad" aria-describedby="in_badHelp" tabIndex="3" required oninput="addFunction()">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" id="amount" aria-describedby="amountHelp" readonly required>
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
    $(document).on('keypress', 'input,select', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
            console.log($next.length);
            if (!$next.length) {
           $next = $('[tabIndex=1]');        }
            $next.focus() .click();
        }
    });
    </script>
@endsection

