let betButton = document.getElementById("betButton");
console.log('L\'élément ' + betButton.tagName + ' a été récupéré !');

document.getElementById("betButton").onsubmit = function (e) {
    //Empêcher le rechargement de la page
    e.preventDefault();
    document.getElementById("betButton").style.color = red
};