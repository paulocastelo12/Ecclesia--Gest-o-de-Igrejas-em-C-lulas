
$('#form_membro').submit(function () {
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
            fundtdtadmissao: fundtadmissao,
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
            if (resultado == "11") {
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

