
<div class="col-lg-12">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="note note-danger">
                <h4 class="box-heading">{{ $error }}</h4>
            </div>
        @endforeach
    @endif
</div>
