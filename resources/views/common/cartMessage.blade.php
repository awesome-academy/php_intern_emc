@if (session('successOrder'))
    <p class="buySuccess">
        {{ session('successOrder') }}
    </p>
@endif

@if (session('errorOrder'))
    <p class="errCart">
        {{ session('errorOrder') }}
    </p>
@endif
