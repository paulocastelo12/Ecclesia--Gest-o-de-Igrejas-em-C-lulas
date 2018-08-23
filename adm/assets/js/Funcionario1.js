$(function () {

    $("#confuntelefone").mask("(99)99999-9999");
    $("#funcpf").mask("99.999.999-99");
    $("#funrg").mask("9999999-9");

});
function limparCampos() {
    $('#funnome').val("");
    $('#funrg').val("");
    $('#funcpf').val("");
    $('#funsexo').val("Selecione");
    $('#funestadocivil').val("Selecione");
    $('#fundtnasc').val("");
    $('#fundtadmissao').val("");
    $('#funcarcod').val("Selecione");

    $('#confunemail').val("");
    $('#confuntelefone').val("");

}
$('#form_funcionario').submit(function () {
    //alert("entrou");
    //datados pessoais
    var funnome = $('#funnome').val();
    var funrg = $('#funrg').val();
    var funcpf = $('#funcpf').val();
    var funestadocivil = $('#funestadocivil').val();
    var funsexo = $('#funsexo').val();
    var fundtnasc = $('#fundtnasc').val();
    var fundtadmissao = $('#fundtadmissao').val();
    var funstatus = $('#funstatus').val();
    var funcarcod = $('#funcarcod').val();

    //contato
    var confunemail = $('#confunemail').val();
    var confuntelefone = $('#confuntelefone').val();

    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-funcionario/salvarFuncionario",
        type: "post",
        data: {
            funnome: funnome,
            funrg: funrg,
            funcpf: funcpf,
            funestadocivil: funestadocivil,
            funsexo: funsexo,
            fundtnasc: fundtnasc,
            fundtadmissao: fundtadmissao,
            funstatus: funstatus,
            funcarcod: funcarcod,

            confunemail: confunemail,
            confuntelefone: confuntelefone
        },
        beforeSend: function (resultado) {
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

$('#form_funcionario_editar').submit(function () {
    //alert("entrou");
    //datados pessoais
    var funcod = $('#funcod').val();
    var funnome = $('#funnome').val();
    var funrg = $('#funrg').val();
    var funcpf = $('#funcpf').val();
    var funestadocivil = $('#funestadocivil').val();
    var funsexo = $('#funsexo').val();
    var fundtnasc = $('#fundtnasc').val();
    var fundtadmissao = $('#fundtadmissao').val();
    var funstatus = $('#funstatus').val();
    var funcarcod = $('#funcarcod').val();

    //contato
    var confuncod = $('#confuncod').val();
    var confunemail = $('#confunemail').val();
    var confuntelefone = $('#confuntelefone').val();

    $.ajax({
        url: "http://localhost/Ecclesia/adm/controle-funcionario/editarFuncionario",
        type: "post",
        data: {
            funcod: funcod,
            funnome: funnome,
            funrg: funrg,
            funcpf: funcpf,
            funestadocivil: funestadocivil,
            funsexo: funsexo,
            fundtnasc: fundtnasc,
            fundtadmissao: fundtadmissao,
            funstatus: funstatus,
            funcarcod: funcarcod,

            confuncod: confuncod,
            confunemail: confunemail,
            confuntelefone: confuntelefone
        },
        beforeSend: function (resultado) {
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
