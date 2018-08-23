function limparCampos() {
    $('#tipodesdescricao').val("");
}
$('#form_tipodespesa').submit(function () {

    var tipodesdescricao = $('#tipodesdescricao').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-tipodespesa/salvarTipoDespesa",
        data: {
            tipodesdescricao: tipodesdescricao
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
                console.log(resultado);
            } else {
                console.log("error retorno vazio!");
            }
        }
    });

    return false;
});

$('#form_edittipodespesa').submit(function () {

    var tipodesdescricao = $('#tipodesdescricao').val();
    var tipodescod = $('#tipodescod').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-tipodespesa/editarTipoDespesa",
        data: {
            tipodescod: tipodescod,
            tipodesdescricao: tipodesdescricao
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
                console.log(resultado);
            } else {
                console.log("error retorno vazio!");
            }
        }
    });

    return false;
});
