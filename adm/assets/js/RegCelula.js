function creditado(){
    alert("Valor já creditado!");
    
    return false;
}
function creditar_celula(id) {

    var regcelvalor = $('#regcelvalor'+id).maskMoney('unmasked')[0];

    $.ajax({
        type: "POST",
        url: "http://localhost/Ecclesia/adm/controle-regcelula/creditar",
        data: {
            regcelcod:id,
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

    return false;
}


