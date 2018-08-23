function limparCampos() {
    $('#memnome').val("");
    $('#memrg').val("");
    $('#memsexo').val("Selecione");
    $('#memestadocivil').val("Selecione");
    $('#memdatanasc').val("");
    $('#memgrupo').val("Selecione");

    $('#mememail').val("");
    $('#memtelefone').val("");

    $('#cep').val("");
    $('#bairro').val("");
    $('#cidade').val("");
    $('#uf').val("");
    $('#numero').val("");
    $('#rua').val("");
    $('#complemento').val("");

}


$('#form_membro').submit(function () {
    //datados pessoais
    var memnome = $('#memnome').val();
    var memrg = $('#memrg').val();
    var memsexo = $('#memsexo').val();
    var memestadocivil = $('#memestadocivil').val();
    var memdatanasc = $('#memdatanasc').val();
    var memgrupo = $('#memgrupo').val();

    //contato
    var mememail = $('#mememail').val();
    var memtelefone = $('#memtelefone').val();

    //endereço

    var cep = $('#cep').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var uf = $('#uf').val();
    var rua = $('#rua').val();
    var numero = $('#numero').val();
    var complemento = $('#complemento').val();

    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-membro/salvarMembro",
        type: "post",
        data: {
            memnome: memnome,
            memrg: memrg,
            memsexo: memsexo,
            memestadocivil: memestadocivil,
            memdatanasc: memdatanasc,
            memgrupo: memgrupo,

            mememail: mememail,
            memtelefone: memtelefone,

            cep: cep,
            bairro: bairro,
            cidade: cidade,
            uf: uf,
            rua: rua,
            numero: numero,
            complemento: complemento
        },
        beforeSend: function (resultado) {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados');

            $('#mode').modal('show');
        },
        success: function (resultado) {
            if (resultado == "111") {
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

$('#form_membro_editarDados').submit(function () {
    //datados pessoais
    var memcod = $('#memcod').val();
    var memnome = $('#memnome').val();
    var memrg = $('#memrg').val();
    var memsexo = $('#memsexo').val();
    var memestadocivil = $('#memestadocivil').val();
    var memdatanasc = $('#memdatanasc').val();
    var memgrupo = $('#memgrupo').val();


    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-membro/editarMembroDados",
        type: "post",
        data: {
            memcod: memcod,
            memnome: memnome,
            memrg: memrg,
            memsexo: memsexo,
            memestadocivil: memestadocivil,
            memdatanasc: memdatanasc,
            memgrupo: memgrupo
        },
        beforeSend: function (resultado) {
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

$('#form_membro_editarContato').submit(function () {

    //contato
    var memconcod = $('#memconcod').val();
    var mememail = $('#mememail').val();
    var memtelefone = $('#memtelefone').val();

    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-membro/editarMembroContato",
        type: "post",
        data: {
            memconcod: memconcod,
            mememail: mememail,
            memtelefone: memtelefone,
        },
        beforeSend: function (resultado) {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados editados');

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

$('#form_membro_editarEndereco').submit(function () {

    //endereço

    var endcod = $('#endcod').val();
    var cep = $('#cep').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var uf = $('#uf').val();
    var rua = $('#rua').val();
    var numero = $('#numero').val();
    var complemento = $('#complemento').val();

    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-membro/editarMembroEndereco",
        type: "post",
        data: {

            endcod: endcod,
            cep: cep,
            bairro: bairro,
            cidade: cidade,
            uf: uf,
            rua: rua,
            numero: numero,
            complemento: complemento
        },
        beforeSend: function (resultado) {
            $('#modal-grupo').modal('hide');
            $('#h3-modal').html('Salvando dados editados');

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

$("#bt-contato").click(function () {

    $("#bt-contato").html("<a href='' value='subir' id='bt-contato'><i class='glyphicon glyphicon-triangle-top'></i></a>");
    $('#div_contato').slideDown();

    return false;
});

$("#bt-endereco").click(function () {

    $("#bt-endereco").html("<a href='' value='subir' id='bt-contato'><i class='glyphicon glyphicon-triangle-top'></i></a>");
    $('#div_endereco').slideDown();

    return false;
});

//funcao formata telefone
$(function () {

    $("#memtelefone").mask("(99)99999-9999");
    $("#memrg").mask("99.999.999-9");
    $("#cep").mask("99999-999");

});

$(document).ready(function () {
    $('#example').DataTable({
        "language": {
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - desculpe",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ total registros)",
            "search": "Buscar:"
        },
        "lengthMenu": [[10, 20, 40, -1], [10, 20, 40, "All"]],
        "order": [[0, "desc"]]

    });
});

