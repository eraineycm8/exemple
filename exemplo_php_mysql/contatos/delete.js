function enviarDados() {
    var idExcluir = $('#id').val();
    var url = 'delete.php';
    var dados = {id: idExcluir};
    $.post(url,dados, function (result, status) {
        if(status=='success' && result==1){
            $("#message").html("Registro excluído com sucesso!");
            console.log(status);
            console.log(result);
            alert("Contato excluído com sucesso");
            window.location.href = "index.php";
        }else{
            alert(result);
            $("#message").html(result);
        }
    }).fail(function () {
        alert("Não foi possível excluír o contato! Verifique se todos os dados estão corretos.")
    });
}