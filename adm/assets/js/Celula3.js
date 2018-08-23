function limparCampos() {
    $('#celdescricao').val("");
    $('#celclassificacao').val("Selecione");
    $('#celanfitriao').val("");
    $('#celmemcod').val("");
    $('#celmemnome').val("");
}
$('#form_celula').submit(function () {

    var celdescricao = $('#celdescricao').val();
    var celclassificacao = $('#celclassificacao').val();
    var celanfitriao = $('#celanfitriao').val();
    var celmemcod = $('#celmemcod').val();
    //alert(celdescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-celula/salvarCelula",
        data: {

            celdescricao: celdescricao,
            celclassificacao: celclassificacao,
            celanfitriao: celanfitriao,
            celmemcod: celmemcod
        },
        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados');
            $('#mode').modal('show');
        },
        success: function (resultado) {
            if (resultado == "1") {
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

$('#form_celula_editar').submit(function () {

    var celcod = $('#celcod').val();
    var celdescricao = $('#celdescricao').val();
    var celclassificacao = $('#celclassificacao').val();
    var celanfitriao = $('#celanfitriao').val();
    var celmemcod = $('#celmemcod').val();
    //alert(celdescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-celula/editarCelula",
        data: {
            celcod: celcod,
            celdescricao: celdescricao,
            celclassificacao: celclassificacao,
            celanfitriao: celanfitriao,
            celmemcod: celmemcod
        },
        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados Editados');
            $('#mode').modal('show');
        },
        success: function (resultado) {
            if (resultado == "1") {
                $('#mode').modal('hide');
                limparCampos();
                //alert("PPPPPPPP");
                $('#strong-msg').html('Alterado com Sucesso!');
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


