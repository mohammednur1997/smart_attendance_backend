@extends("errors.layout_error")
@section("middleContent")
    <div id="error-page-content"><h1>500!</h1><h4>Internal Server Error</h4>

        <p>The website cannot display the page</p>

        <p><a href={{ route("deshboard") }}>Return home</a> or please come back in a while.</p>


    </div>
@endsection
