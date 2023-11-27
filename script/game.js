let textGame;
let x = 0
let score = 0;



document.addEventListener('keypress', function(event) {
    let letter = event.key
    validateLetter(letter)
});

const scoreText = document.getElementById("score");
scoreText.textContent = score;

function generateLoremIpsum(wordsPerParagraph) {
    const loremIpsumWords = [
      "Lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit",
      "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore",
      "magna", "aliqua", "Ut", "enim", "ad", "minim", "veniam", "quis", "nostrud",
      "exercitation", "ullamco", "laboris", "nisi", "ut", "aliquip", "ex", "ea", "commodo",
      "consequat", "Duis", "aute", "irure", "dolor", "in", "reprehenderit", "in", "voluptate",
      "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla", "pariatur", "Excepteur",
      "sint", "occaecat", "cupidatat", "non", "proident", "sunt", "in", "culpa", "qui",
      "officia", "deserunt", "mollit", "anim", "id", "est", "laborum"
    ];
  
    let loremIpsumText = "";

    for (let w = 0; w < wordsPerParagraph; w++) {
    const randomIndex = Math.floor(Math.random() * loremIpsumWords.length);
    const word = loremIpsumWords[randomIndex];
    loremIpsumText += word + " ";
    }
    

    textGame = loremIpsumText

    generateLoremInterface(loremIpsumText)
}
  
generateLoremIpsum(20);

function generateLoremInterface(lorem) {
    const gameDiv = document.getElementById("game");
    let currentWordDiv = null;

    for (let x = 0; x < lorem.length; x++) {
        let caracter = lorem[x];

        if (caracter === ' ') {
            if (currentWordDiv) {
                currentWordDiv.appendChild(createSpaceElement(caracter));
                gameDiv.appendChild(currentWordDiv);
                currentWordDiv = null;
            }
        } else {
            if (!currentWordDiv) {
                currentWordDiv = document.createElement("div");
                currentWordDiv.className = "word";
            }
            currentWordDiv.appendChild(createLetterElement(caracter));
        }
    }

    if (currentWordDiv) {
        gameDiv.appendChild(currentWordDiv);
    }

    const optionSpan = gameDiv.getElementsByTagName("p")[0];
    optionSpan.style.color = "#3295db";
    const letterStyle = gameDiv.getElementsByClassName("letter")[0]
    letterStyle.style.borderColor = "#3295db"
}

function createSpaceElement(character) {
    const spaceDiv = document.createElement("div");
    spaceDiv.className = "letter";
    const spaceSpan = document.createElement("p");
    spaceSpan.textContent = character;
    spaceDiv.appendChild(spaceSpan);
    return spaceDiv;
}

function createLetterElement(character) {
    const div = document.createElement("div");
    div.className = "letter";

    const span = document.createElement("p");
    span.textContent = character;

    div.appendChild(span);
    return div;
}

function validateLetter(letter){

    if(textGame.length == (x + 1)){
        if(textGame[x] == letter){
            setScrore()
            setColorsResult(true)
        } else {
            setColorsResult(false)
        }

        resetGame()

        return;
        
    } else {
        const gameDiv = document.getElementById("game");
        const optionSpan = gameDiv.getElementsByTagName("p")[x + 1];
        optionSpan.style.color = "#3295db";
        const letterStyle = gameDiv.getElementsByClassName("letter")[x + 1]
        letterStyle.style.borderColor = "#3295db"
    }

    if(textGame[x] == letter){
        setScrore()
        setColorsResult(true)
    } else {
        setColorsResult(false)
    }


    if(textGame.length == x){
        console.log('fim')
    }
    x++
}

function setColorsResult(result){
    const gameDiv = document.getElementById("game");
    const optionSpan = gameDiv.getElementsByTagName("p")[x];
    optionSpan.style.backgroundColor = result ? "#edf7e7" : "#d55b60";
    optionSpan.style.color = result ? "#95c590" : "#ce3e44";
    const letterStyle = gameDiv.getElementsByClassName("letter")[x];
    letterStyle.style.borderColor = "#FFFFFF";
}

function setScrore(){
    score ++;
    const scoreText = document.getElementById("score");
    scoreText.textContent = score;
}

function resetGame(){
    x = 0
    const gameDiv = document.getElementById("game");
    gameDiv.innerHTML = "";
    generateLoremIpsum(20);
}

let tempoRestante = 60;
const cronometroElement = document.getElementById("cronometro");
cronometroElement.textContent = tempoRestante;
const intervalId = setInterval(function() {
    tempoRestante--;
    cronometroElement.textContent = tempoRestante;

    if (tempoRestante === 0) {
        clearInterval(intervalId);

        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('id_U');
        const xhttp = new XMLHttpRequest();
        
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                console.log("Score enviado!");
            }
        };
        const params = "score=" + score + "&id_U=" + userId;

        xhttp.open("POST", "../php/score.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);

        x = 0;
        const gameDiv = document.getElementById("game");
        gameDiv.innerHTML = "";
    }
}, 1000);