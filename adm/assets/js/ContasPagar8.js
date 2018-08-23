
function limparCampos() {
    $('#pagfornecod').val("Selecione");
    $('#pagdatavenc').val("");
    $('#pagnumdoc').val("");
    $('#pagclassificacao').val("Variaveis");
    $('#pagtipodespesa').val("Selecione");
    $('#pagstatus').val("Pendente");
    $('#pagvalor').val("");
    $('#pagforcod').val("Selecione");
    $('#condpagamento').val("Selecione");
    $('#pagparcela').val("1");
    $('#pagobservacao').val("");
}

$(function () {
    $('#pagvalor').maskMoney();

    var num = $('#regdizvalor').maskMoney('unmasked')[0];
    //alert('type: '+ typeof(num) + ', value: ' + num);
});

$("#condpagamento").change(function () {
    var condpagamento = $('#condpagamento').val();
    //alert(condpagamento);

    var pagvalor = $('#pagvalor').maskMoney('unmasked')[0];
    var pagvalor2 = $('#pagvalor').val();
    var pagparcela = $('#pagparcela').val();
    var parcela = parseFloat(pagvalor / pagparcela).toFixed(2).replace(".", ",");

    if (condpagamento == 2) {

        if (pagvalor == 0) {
            alert("Por favor descreva um valor!");
        } else {

            $("#pagparcela").prop("disabled", false);
            $("#divpagparcela").slideDown();
            var resultado = pagparcela + "x de  R$ " + parcela + "<br> Total  de  R$ " + pagvalor2;

            $('#valorprazo').html("<span  style='font-size: 18px'>" + resultado + "</span>");
        }

    } else if (condpagamento == 1) {
        //alert('paulo');
        if (pagvalor == 0) {
            alert("Por favor descreva um valor!");
        } else {
            $("#pagparcela").val("1");
            $("#pagparcela").prop("disabled", true);
            $("#divpagparcela").slideDown();
            var resultado = "1x de  R$ " + pagvalor2 + "<br> Total  de  R$ " + pagvalor2;

            $('#valorprazo').html("<span  style='font-size: 18px'>" + resultado + "</span>");
        }
    } else {
        $("#divpagparcela").slideUp();
        $('#valorprazo').html("<span></span>");
    }
});

$('#pagparcela').change(function () {

    var pagvalor = $('#pagvalor').maskMoney('unmasked')[0];
    var pagvalor2 = $('#pagvalor').val();
    var pagparcela = $('#pagparcela').val();
    var parcela = parseFloat(pagvalor / pagparcela).toFixed(2).replace(".", ",");
    var resultado = pagparcela + "x de R$ " + parcela + "<br> Total de R$ " + pagvalor2;

    $('#valorprazo').html("<span style='font-size: 18px'>" + resultado + "</span>");
});


$('#form_contaPagar').submit(function () {

    var pagfornecod = $('#pagfornecod').val();
    var pagdatavenc = $('#pagdatavenc').val();
    var pagnumdoc = $('#pagnumdoc').val();
    var pagclassificacao = $('#pagclassificacao').val();
    var pagtipodespesa = $('#pagtipodespesa').val();
    var pagstatus = $('#pagstatus').val();
    var pagvalor = $('#pagvalor').maskMoney('unmasked')[0];
    var pagforcod = $('#pagforcod').val();
    var pagparcela = $('#pagparcela').val();
    var pagobservacao = $('#pagobservacao').val();


    //alert(pagobservacao);

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-contaPagar/salvarContaPagar",
        data: {
            pagfornecod: pagfornecod,
            pagdatavenc: pagdatavenc,
            pagnumdoc: pagnumdoc,
            pagclassificacao: pagclassificacao,
            pagtipodespesa: pagtipodespesa,
            pagstatus: pagstatus,
            pagvalor: pagvalor,
            pagforcod: pagforcod,
            pagparcela: pagparcela,
            pagobservacao: pagobservacao
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

function debitado() {
    alert("Valor já debitado!");

    return false;
}

function editar() {
    alert("                Não é possivel editar.\n" +
            "\nProcedimento de baixa já foi realizado.");

    return false;
}

function debitar_conta(id) {

    var pagvalor = $('#pagvalor' + id).maskMoney('unmasked')[0];
    var pagvalortext = $('#pagvalor' + id).val();

    decisao = confirm("                             Deseja realmente debitar esse valor? \n" +
            "\n                                          Valor a ser debitar: " + pagvalortext + "\n" +
            "\n Valores debitados no caixa não poderam ser alterados ou excluidos");
    if (decisao) {

        $.ajax({
            type: "POST",
            url: "http://localhost/Ecclesia/adm/controle-contapagar/debitar",
            data: {
                pagcod: id,
                pagvalor: pagvalor
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

$('#form_contaPagar_editar').submit(function () {

    var pagcod = $('#pagcod').val();
    var pagfornecod = $('#pagfornecod').val();
    var pagdatavenc = $('#pagdatavenc').val();
    var pagnumdoc = $('#pagnumdoc').val();
    var pagclassificacao = $('#pagclassificacao').val();
    var pagtipodespesa = $('#pagtipodespesa').val();
    var pagstatus = $('#pagstatus').val();
    var pagvalor = $('#pagvalor').maskMoney('unmasked')[0];
    var pagforcod = $('#pagforcod').val();
    var pagobservacao = $('#pagobservacao').val();


    //alert(pagobservacao);

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-contaPagar/editarContaPagar",
        data: {
            pagcod: pagcod,
            pagfornecod: pagfornecod,
            pagdatavenc: pagdatavenc,
            pagnumdoc: pagnumdoc,
            pagclassificacao: pagclassificacao,
            pagtipodespesa: pagtipodespesa,
            pagstatus: pagstatus,
            pagvalor: pagvalor,
            pagforcod: pagforcod,
            pagobservacao: pagobservacao
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

