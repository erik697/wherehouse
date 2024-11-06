
@extends('layouts.app')

@section('content')
<div class="card mb-4 mx-4">
    <div class="card-header">
        Input Wherehouse
    </div>
    <form action="{{ route('wherehouses.update',$wherehouse->id) }}" method="POST" class="card-body">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="Code">Code</label>
            <input type="code" name="code" value="{{ $wherehouse->code }}" class="form-control" id="code" aria-describedby="codeHelp" tabIndex="1" required autofocus>
        </div>
    
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" value="{{ $wherehouse->name }}" class="form-control" id="name" aria-describedby="nameHelp" tabIndex="2" required>
        </div>
        <div class="justify-end">
            
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

