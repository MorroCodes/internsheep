let vibeSelector = document.querySelector(".vibe-check");
let sizeSelector = document.querySelector(".size-check");
let ageSelector = document.querySelector(".age-check");
let typeSelector = document.querySelector(".type-check");
let transportSelector = document.querySelector(".transport-check");

let selectorArray= [vibeSelector, sizeSelector, ageSelector, typeSelector, transportSelector];

if (vibeSelector != null) {
    let score;
    for(let i = 0; i<selectorArray.length; i++){
        score = selectorArray[i].dataset.score;
        selectorArray[i].style.width = getScore(score);
    }
}

function getScore(score) {
    let width;
    if (score == 1) {
        width = "0%";
    } else if (score == 2) {
        width = "25%";
    } else if (score == 3) {
        width = "50%";
    } else if (score == 4) {
        width = "75%";
    } else {
        width = "100%";
    }
    return width;
}
