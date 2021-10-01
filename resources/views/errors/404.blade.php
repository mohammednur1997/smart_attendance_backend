@extends("errors.layout_error")
@section("middleContent")
    <div id="error-page-content"><h1>404!</h1><h4>The page you are looking for has not been found!</h4>

        <p>The page you are looking for might have been removed or unavailable.</p>

        <p><a href={{ route("deshboard") }}>Return home</a> or try the search bar below.</p>

    </div>
@endsection

