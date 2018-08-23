
function creditado() {
    alert("Valor já creditado!");

    return false;
}

function editar() {
    alert("                Não é possivel editar.\n" +
            "\nProcedimento de baixa já foi realizado.");

    return false;
}

function creditar_celula(id) {

    var regcelvalor = $('#regcelvalor' + id).maskMoney('unmasked')[0];
    var regcelvalortext = $('#regcelvalor' + id).val();

    decisao = confirm("                             Deseja realmente creditar esse valor? \n" +
            "\n                                          Valor a ser creditado: " + regcelvalortext + "\n" +
            "\n Valores creditados no caixa não poderam ser alterados ou excluidos");
    if (decisao) {

        $.ajax({
            type: "POST",
            url: "http://localhost/Ecclesia/adm/controle-regcelula/creditar",
            data: {
                regcelcod: id,
                regcelvalor: regcelvalor
            },

            beforeSend: function () {
                $('#modal-grupo').modal('hide');
                $('#h3-modal').html('Creditando dados');

                $('#mode').modal('show');
            },

            success: function (resultado) {
                if (resultado !== "") {
                    $('#mode').modal('hide');

                    //alert("PPPPPPPP");
                    $('#strong-msg').html('Creditado com Sucesso!');
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

    } else {
        return false;
    }

    return false;
}

$("#regcelstatus_registro").change(function () {
    var regstatus_registro = $('#regcelstatus_registro').val();
    if (regstatus_registro === 'Não-houve') {
        $("input").prop("disabled", true);
    } else {
        $("input").prop("disabled", false);
    }
});

$(function () {
    $('#regcelvalor').maskMoney();

    var num = $('#regcelvalor').maskMoney('unmasked')[0];
    //alert('type: '+ typeof(num) + ', value: ' + num);
});

function limparCampos() {
    $('#regcelcelulacod').val("");
    $('#regcelceluladescricao').val("");
    $('#regcellider').val("");
    $('#regcelvalor').val("");
    $('#regcelgrupo').val("");
    $('#regceldata_registro').val("");
    $('#regceldata_realizacao').val("");
    $('#regcelstatus_registro').val("");
    $('#regcelqtd_participantes').val("");
    $('#regcelqtd_conversoes').val("");
}

function validarSelect() {
    var regcelstatus_registro = $('#regcelstatus_registro').val();

    if (regcelstatus_registro == 'Selecione') {
        alert("Selecione o Status!");
        return false;
    } else {
        return true;
    }
}
$('#form_cadregcelula').submit(function () {

    if (validarSelect()) {

        var regcelcelulacod = $('#regcelcelulacod').val();
        var regceldata_registro = $('#regceldata_registro').val();
        var regceldata_realizacao = $('#regceldata_realizacao').val();
        var regcelstatus_registro = $('#regcelstatus_registro').val();
        var regcelqtd_participantes = $('#regcelqtd_participantes').val();
        var regcelqtd_conversoes = $('#regcelqtd_conversoes').val();
        var regcelvalor = $('#regcelvalor').maskMoney('unmasked')[0];


        //alert(regcelvalor);

        $.ajax({
            type: "POST",
            url: "http://localhost/Ecclesia/adm/controle-regcelula/salvarRegCelula",
            data: {
                regcelcelulacod: regcelcelulacod,
                regceldata_registro: regceldata_registro,
                regceldata_realizacao: regceldata_realizacao,
                regcelstatus_registro: regcelstatus_registro,
                regcelqtd_participantes: regcelqtd_participantes,
                regcelqtd_conversoes: regcelqtd_conversoes,
                regcelvalor: regcelvalor
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

    }
    
     return false;
});

$('#form_editregcelula').submit(function () {

    var regcelcod = $('#regcelcod').val();
    var regcelcelulacod = $('#regcelcelulacod').val();
    var regceldata_registro = $('#regceldata_registro').val();
    var regceldata_realizacao = $('#regceldata_realizacao').val();
    var regcelstatus_registro = $('#regcelstatus_registro').val();
    var regcelqtd_participantes = $('#regcelqtd_participantes').val();
    var regcelqtd_conversoes = $('#regcelqtd_conversoes').val();
    var regcelvalor = $('#regcelvalor').maskMoney('unmasked')[0];

    //alert(regcelvalor);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-regcelula/editarRegCelula",
        data: {
            regcelcod: regcelcod,
            regcelcelulacod: regcelcelulacod,
            regceldata_registro: regceldata_registro,
            regceldata_realizacao: regceldata_realizacao,
            regcelstatus_registro: regcelstatus_registro,
            regcelqtd_participantes: regcelqtd_participantes,
            regcelqtd_conversoes: regcelqtd_conversoes,
            regcelvalor: regcelvalor
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


