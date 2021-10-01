@extends("errors.layout_error")
@section("middleContent")
    <div id="error-page-content"><h1>403!</h1><h4>{{ $exception->getMessage()  }}</h4>

        <p>The page you are looking for might have been removed or unavailable.</p>

        <p><a href={{ route("deshboard") }}>Return home</a> or please come back in a while.</p>
        <p><a href={{ route("admin.login") }}>Login Again</a> or please come back in a while.</p>

    </div>
@endsection
