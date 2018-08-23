
function limparCampos() {
    $('#cardescricao').val("");
}
$('#form_cargo').submit(function () {

    var cardescricao = $('#cardescricao').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-cargo/salvarCargo",
        data: {
            cardescricao: cardescricao
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

$('#form_cargo_editar').submit(function () {

    var carcod = $('#carcod').val();
    var cardescricao = $('#cardescricao').val();


    // alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-cargo/editarCargo",
        data: {
            carcod: carcod,
            cardescricao: cardescricao
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


