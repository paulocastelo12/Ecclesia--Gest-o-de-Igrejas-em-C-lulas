
$(function () {
    $('#regdizvalor').maskMoney();

    var num = $('#regdizvalor').maskMoney('unmasked')[0];
    //alert('type: '+ typeof(num) + ', value: ' + num);
});

function limparCampos() {
    $('#regdizvalor').val("");
    $('#regdizformapag').val("Selecione");
    $('#regdizmemcod').val("");
    $('#regdizmemnome').val("");
}

$('#form_cadregdizimo').submit(function () {

    var regdizdata = $('#regdizdata').val();
    var regdizformapag = $('#regdizformapag').val();
    var regdizvalor = $('#regdizvalor').maskMoney('unmasked')[0];
    var regdizmemcod = $('#regdizmemcod').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-regdizimo/salvarRegDizimo",
        data: {
            regdizdata: regdizdata,
            regdizformapag: regdizformapag,
            regdizvalor: regdizvalor,
            regdizmemcod: regdizmemcod
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


function excluir(id) {
    decisao = confirm("         Deseja realmente deletar esse Registro? \n" +
            "\n                          Código do Registro: " + id + "\n" +
            "\n Registros excluidos nao poderão ser recuperados");
    if (decisao) {

        $.ajax({
            type: "POST",
            url: "http://localhost/Ecclesia/adm/controle-regdizimo/excluirRegDizimo",
            data: {
                regdizcod: id
            },

            beforeSend: function () {
                $('#modal-grupo').modal('hide');
                $('#h3-modal').html('Excluindo dados');

                $('#mode').modal('show');
            },

            success: function (resultado) {
                if (resultado != "") {
                    $('#mode').modal('hide');
                    limparCampos();
                    //alert("PPPPPPPP");

                    alert("Registro deletado com sucesso!");

                    //location.reload(); 
                    console.log(resultado);
                } else {
                    console.log("error retorno vazio!");
                }
            }
        });

        return false;
    }


}

$('#form_editregdizimo').submit(function () {
    
    var dizcod = $('#dizcod').val();
    var regdizformapag = $('#regdizformapag').val();
    //alert(regdizformapag);
    var regdizmemcod = $('#regdizmemcod').val();

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-regdizimo/editarRegDizimo",
        data: {
            dizcod: dizcod,
            regdizforcod: regdizformapag,
            regdizmemcod: regdizmemcod
        },

        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Editando dados');

            $('#mode').modal('show');
        },

        success: function (resultado) {
            if (resultado != "") {
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

