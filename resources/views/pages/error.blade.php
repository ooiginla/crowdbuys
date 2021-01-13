<div>
    @if(request()->session()->has('susmsg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ request()->session()->get('susmsg') }} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(request()->session()->has('errmsg'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ request()->session()->get('errmsg') }} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>