function limparCampos() {
    $('#fordescricao').val("");
}
$('#form_forpagamento').submit(function () {

    var fordescricao = $('#fordescricao').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-forpagamento/salvarForpagamento",
        data: {
            fordescricao: fordescricao
        },

        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados');

            $('#mode').modal('show');
        },

        success: function (resultado) {
            if (resultado !== "") {
                $('#mode').modal('hide');
                limparCampos();
                //alert("PPPPPPPP");
                $('#strong-msg').html('Salvo com Sucesso!');
                $('#msg').show();

                setTimeout(function () {

                    $('#msg').fadeOut(4000);
                }, 3000);
                console.log(resultado);

            } else {
                console.log("error retorno vazio!");
            }
        }
    });

    return false;
});

$('#form_editforpagamento').submit(function () {

    var fordescricao = $('#fordescricao').val();
    var forcod = $('#forcod').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-forpagamento/editarForpagamento",
        data: {
            fordescricao: fordescricao,
            forcod: forcod
        },

        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Editando dados');

            $('#mode').modal('show');
        },

        success: function (resultado) {
            if (resultado !== "") {
                $('#mode').modal('hide');
                limparCampos();
                //alert("PPPPPPPP");
                $('#strong-msg').html('Editado com Sucesso!');
                $('#msg').show();

                setTimeout(function () {

                    $('#msg').fadeOut(4000);
                }, 3000);
                console.log(resultado);

            } else {
                console.log("error retorno vazio!");
            }
        }
    });

    return false;
});

