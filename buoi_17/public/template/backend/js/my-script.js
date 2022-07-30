
    $(document).ready(function() {
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            if (confirm('are you sure?')) {
                window.location.href = $(this).attr('href');
            }
        })
    })
