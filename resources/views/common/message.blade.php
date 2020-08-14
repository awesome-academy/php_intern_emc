@if (session('message'))
    <div class="alert alert-{{ session('color') }}" role="alert">
        <strong>{{ session('message') }}</strong>
    </div>
@endif
