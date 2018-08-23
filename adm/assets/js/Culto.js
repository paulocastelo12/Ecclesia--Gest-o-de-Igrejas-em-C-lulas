function limparCampos() {
    $('#culdescricao').val("");
    $('#culdia_semana').val("");
    $('#culhorario_inicio').val("");
    $('#culhorario_final').val("");
}
$('#form_culto').submit(function () {

    var culdescricao = $('#culdescricao').val();
    var culdia_semana = $('#culdia_semana').val();
    var culhorario_inicio = $('#culhorario_inicio').val();
    var culhorario_final = $('#culhorario_final').val();
    
    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-culto/salvarCulto",
        data: {
            culdescricao: culdescricao,
            culdia_semana: culdia_semana,
            culhorario_inicio: culhorario_inicio,
            culhorario_final: culhorario_final

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


$('#form_culto_editar').submit(function () {

    var culcod = $('#culcod').val();
    var culdescricao = $('#culdescricao').val();
    var culdia_semana = $('#culdia_semana').val();
    var culhorario_inicio = $('#culhorario_inicio').val();
    var culhorario_final = $('#culhorario_final').val();
       
    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-culto/editarCulto",
        data: {
            culcod: culcod,
            culdescricao: culdescricao,
            culdia_semana: culdia_semana,
            culhorario_inicio: culhorario_inicio,
            culhorario_final: culhorario_final

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

