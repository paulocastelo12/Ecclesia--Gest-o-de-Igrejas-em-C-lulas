
function limparCampos() {
    $('#grunome').val("");
    $('#gruresponsavel1').val("");
    $('#gruresponsavel2').val("");
    $('#gruemail').val("");
}
$('#form_grupo').submit(function () {

    var grunome = $('#grunome').val();
    var gruresponsavel1 = $('#gruresponsavel1').val();
    var gruresponsavel2 = $('#gruresponsavel2').val();
    var gruemail = $('#gruemail').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-grupo/salvarGrupo",
        data: {
            grunome: grunome,
            gruresponsavel1: gruresponsavel1,
            gruresponsavel2: gruresponsavel2,
            gruemail: gruemail

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
                console.log(resultado);
            } else {
                console.log("error retorno vazio!");
            }
        }
    });

    return false;
});

$('#form_grupo_editar').submit(function () {

    var grucod = $('#grucod').val();
    var grunome = $('#grunome').val();
    var gruresponsavel1 = $('#gruresponsavel1').val();
    var gruresponsavel2 = $('#gruresponsavel2').val();
    var gruemail = $('#gruemail').val();

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-grupo/editarGrupo",
        data: {
            grucod: grucod,
            grunome: grunome,
            gruresponsavel1: gruresponsavel1,
            gruresponsavel2: gruresponsavel2,
            gruemail: gruemail

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
                console.log(resultado);
            } else {
                console.log("error retorno vazio!");
            }
        }
    });


    return false;
});

$( "#btdesativar" ).click(function() {
  alert("Entrou");
});


