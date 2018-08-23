$(function () {
    $('#regculvalor').maskMoney();

    var num = $('#regdizvalor').maskMoney('unmasked')[0];
    //alert('type: '+ typeof(num) + ', value: ' + num);
});

function limparCampos() {
    $('#regculvalor').val("");
    $('#regculcod').val("Selecione");
}

$('#form_cadregculto').submit(function () {

    var regculdata = $('#regculdata').val();
    var regculcod = $('#regculcod').val();
    var regculvalor = $('#regculvalor').maskMoney('unmasked')[0];

    //alert(cardescricao);

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-regculto/salvarRegCulto",
        data: {
            regculdata: regculdata,
            regculcod: regculcod,
            regculvalor: regculvalor
        },

        beforeSend: function () {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados');

            $('#mode').modal('show');
        },

        success: function (resultado) {
            if (resultado != "") {
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
            url: "http://localhost/Ecclesia/adm/controle-regculto/excluirRegCulto",
            data: {
                regculcod: id
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

