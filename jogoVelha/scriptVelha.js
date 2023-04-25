const velhaA1   = document.getElementById("a1");
const velhaA2   = document.getElementById("a2");
const velhaA3   = document.getElementById("a3");
const velhaB1   = document.getElementById("b1");
const velhaB2   = document.getElementById("b2");
const velhaB3   = document.getElementById("b3");
const velhaC1   = document.getElementById("c1");
const velhaC2   = document.getElementById("c2");
const velhaC3   = document.getElementById("c3");

const scoreX    = document.getElementById("placarX");
const scoreDraw = document.getElementById("placarDraw");
const scoreO    = document.getElementById("placarO");

var ultimaJogada = "O";
var placarX = 0, placarDraw = 0, placarO = 0;
var emJogo = true;

function hasWinner() {
    var bWinner = "ZZ";
    if (velhaA1.textContent != "" && velhaA1.textContent == velhaA2.textContent && velhaA2.textContent == velhaA3.textContent) bWinner = "A1";
    if (velhaB1.textContent != "" && velhaB1.textContent == velhaB2.textContent && velhaB2.textContent == velhaB3.textContent) bWinner = "B2";
    if (velhaC1.textContent != "" && velhaC1.textContent == velhaC2.textContent && velhaC2.textContent == velhaC3.textContent) bWinner = "C3";

    if (velhaA1.textContent != "" && velhaA1.textContent == velhaB1.textContent && velhaB1.textContent == velhaC1.textContent) bWinner = "A1";
    if (velhaA2.textContent != "" && velhaA2.textContent == velhaB2.textContent && velhaB2.textContent == velhaC2.textContent) bWinner = "B2";
    if (velhaA3.textContent != "" && velhaA3.textContent == velhaB3.textContent && velhaB3.textContent == velhaC3.textContent) bWinner = "C3";

    if (velhaA1.textContent != "" && velhaA1.textContent == velhaB2.textContent && velhaB2.textContent == velhaC3.textContent) bWinner = "B2";
    if (velhaA3.textContent != "" && velhaA3.textContent == velhaB2.textContent && velhaB2.textContent == velhaC1.textContent) bWinner = "B2";

    return bWinner;    
}

function addSpan() {
    if (emJogo){
        console.log(this.getAttribute("id"));
        if (this.textContent == ""){
            if (ultimaJogada=="O"){
                ultimaJogada = "X";
            }else{
                ultimaJogada = "O";
            }
    
            this.textContent = ultimaJogada;
        }
        refreshScore();
    }

    /*
    if (!this.querySelector("span")) {
        const span = document.createElement("span");
        if (ultimaJogada=="O"){
            ultimaJogada = "X";
        }else{
            ultimaJogada = "O";
        }
        span.innerText = ultimaJogada;
        this.appendChild(span)
    } 
    refreshScore();   */
}

function getScore(){
    placarX    = scoreX.textContent;
    placarDraw = scoreDraw.textContent;
    placarO    = scoreO.textContent;
}

function refreshScore(){
    var winner = hasWinner();
    console.log(winner);
    if(winner==="B2"){
        emJogo = false;
        if(velhaB2.textContent === "X"){
            placarX = placarX + 1;
        }else{
            placarO = placarO +1;
        }
    }else if (winner==="A1"){
        emJogo = false;
        if(velhaA1.textContent === "X"){
            placarX = placarX + 1;
        }else{
            placarO = placarO +1;
        }
    }else if(winner==="C3"){
        emJogo = false;
        if(velhaC3.textContent === "X"){
            placarX = placarX + 1;
        }else{
            placarO = placarO +1;
        }
    }else if (winner==="ZZ"){
        if (velhaA1.textContent!="" &&velhaA2.textContent!="" &&velhaA3.textContent!="" &&velhaB1.textContent!="" &&velhaB2.textContent!="" &&velhaB3.textContent!="" &&velhaC1.textContent!="" &&velhaC2.textContent!="" &&velhaC3.textContent!=""){
            emJogo = false;
            placarDraw = placarDraw +1;
        }
    }
    updateScore();
}

function updateScore() {
    scoreX.textContent    = placarX;
    scoreDraw.textContent = placarDraw;
    scoreO.textContent    = placarO;
}

function newGame() {
    velhaA1.textContent = "";
    velhaA2.textContent = "";
    velhaA3.textContent = "";
    velhaB1.textContent = "";
    velhaB2.textContent = "";
    velhaB3.textContent = "";
    velhaC1.textContent = "";
    velhaC2.textContent = "";
    velhaC3.textContent = "";
    emJogo = true;

    /*
    var span = velha11.querySelector("span");
    if (span) velha11.removeChild(span);*/
}

function resetScore() {
    placarX = 0;
    placarDraw = 0;
    placarO = 0;
    updateScore();
    newGame();
}

velhaA1.addEventListener("click", addSpan);
velhaA2.addEventListener("click", addSpan);
velhaA3.addEventListener("click", addSpan);
velhaB1.addEventListener("click", addSpan);
velhaB2.addEventListener("click", addSpan);
velhaB3.addEventListener("click", addSpan);
velhaC1.addEventListener("click", addSpan);
velhaC2.addEventListener("click", addSpan);
velhaC3.addEventListener("click", addSpan);

