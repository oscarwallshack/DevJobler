@if (session('status'))

    <div class="col-12 justify-content-center">

        <div class="alert alert-success">
            <button class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            {{ session('status') }}
        </div>
    </div>
@endif
