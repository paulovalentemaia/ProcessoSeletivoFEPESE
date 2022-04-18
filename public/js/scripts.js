//Formulário Estado
$(function () {
    $("#inscricao-form").on('submit', function (e) {
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
                    $('#inscricao-form')[0].reset();

                    window.location.href = "/inscricao/comprovante/"+data.inscricao;
                    alert(data.message);
                }
            }
        })
    });
});

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
function deleteForm(id) {
    if (confirm("Tem certeza que deseja deletar o estado?")) {
        $.ajax({
            //console.log(id);
            url: '/api/estado/' + id,
            type: 'DELETE',
            data: {
                _token: $("input[name=_token]").val()
            },
            success:function (response)
            {
                $("#sid"+id).remove();
                window.location.href = "/estado";
            },
        });
    }
}
