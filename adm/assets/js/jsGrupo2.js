/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    load();

    function load() {
        $("#div").load("http://localhost/Ecclesia/adm/controle-grupo/teste");
    }


    $('#bt-salvar').click(function () {

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
                    load();

                    $('#strong-salvar').html('Salvo com Sucesso!');
                    $('#alert-salvar').show();

                    setTimeout(function () {

                        $('#alert-salvar').fadeOut(3000);
                    }, 3000);
                    //alert("PPPPPPPP");
                    console.log(resultado);
                } else {
                    console.log("error retorno vazio!");
                }
            }
        });


    });
});