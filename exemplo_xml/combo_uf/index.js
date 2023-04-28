$(document).ready(function(){
    $("#uf").on("change blur click" , function(){
        var estado = $(this).val();
        var option = this.selectedOptions[0];
        var uf = option.textContent;
        $("#estado").val(estado);
    });

    $("#btn-confirma").on("click", function(){
        window.location.href = "estado-selecionado.php?uf=" + $("#uf option:selected").text();
    });
});
