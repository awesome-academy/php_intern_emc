$(document).ready(function() {
    $('#btn_logout').click(event => {
        event.preventDefault();
        const url = '/logout';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: url,
            success: (res) => {
                window.location.href = '/';
            },
            error: (err) => {
                alert('Has some error');
            }
        })
    });
});
