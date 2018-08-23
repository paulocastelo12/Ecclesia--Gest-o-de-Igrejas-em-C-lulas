function limparCampos() {
    $('#forneidt').val("");
    $('#fornedescricao').val("");
}
$('#form_fornecedor').submit(function () {

    var forneidt = $('#forneidt').val();
    var fordescricao = $('#fornedescricao').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-fornecedor/salvarFornecedor",
        data: {
            forneidt: forneidt,
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

$('#form_fornecedor_editar').submit(function () {

    var fornecod = $('#fornecod').val();
    var forneidt = $('#forneidt').val();
    var fornedescricao = $('#fornedescricao').val();

    // alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-fornecedor/editarFornecedor",
        data: {
            fornecod: fornecod,
            forneidt: forneidt,
            fornedescricao: fornedescricao
        },

        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados editados');

            $('#mode').modal('show');
        },

        success: function (resultado) {
            if (resultado !== "") {
                $('#mode').modal('hide');
                limparCampos();
                //alert("PPPPPPPP");
                $('#strong-msg').html('Alterado com Sucesso!');
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

