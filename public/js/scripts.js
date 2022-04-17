//Formulário Estado
$(function () {
    $("#estado-form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(document).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.status == false) {
                    $.each(data.message, function (prefix, val) {
                        $('span.' + prefix + '-error').text(val[0]);
                    });
                } else {
                    $('#estado-form')[0].reset();

                    window.location.href = "/estado";
                    alert(data.message);
                }
            }
        })
    });
});

//Estado Delete
$(function (){
    $("#estado-delete").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',

            success: function (data) {
                $('#estado-delete')[0].reset();

                window.location.href = "/estado";
                alert(data.message);
            }
        })
    });
});
