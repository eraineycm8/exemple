function enviarDados() {
    var idExcluir = $('#id').val();
    var url = 'confirm_delete.php';

    alert("usualmente falando deu certo "+idExcluir);


    $.ajax({
        url: url,
        method: 'POST',
        data: { id: idExcluir },
        success: function(data) {
            console.log(data.message + " sei la kkkkk");
            window.location.href = url;
            // atualizar a página ou a lista de contatos
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(jqXHR.responseText);
            console.error(errorThrown);
        }
    });
}