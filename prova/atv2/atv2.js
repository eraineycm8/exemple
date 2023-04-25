

 function validarFormulario() {
    iDia = document.getElementById("dia").value;
    iMes = document.getElementById("mes").value;
    iAno = document.getElementById("ano").value;    

    if((iDia=="") || (iMes=="") || (iAno=="")){
        alert("Por favor, preencha todos os campos s");
        return false;
    }
    if (isNaN(iDia) || isNaN(iMes) || isNaN(iAno)){
        alert("Por favor, informe apenas números");
        return false;
    }
    if (iDia <1 || iDia>31){
        alert("Informe um dia válido entre 1 e 31");
        return false;
    }
    if(iMes<1 || iMes>12){
        alert("Informe um mês válido entre 1 e 12");
        return false;
    }
    if(iAno<1900 || iAno> new Date().getFullYear()){
        alert("Informe um ano entre 1900 e o ano atual");
        return false;
    }

    dataString = iMes + "-" + iDia + "-" + iAno;
    dataValida = new Date(dataString);
    alert(dataValida);
    if (isNaN(dataValida)){
        alert("Data invalida");
        return false;
    }    

    return true;
}