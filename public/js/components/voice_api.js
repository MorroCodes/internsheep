var divs = document.querySelectorAll('h1, h2, h3, h4, h5, h6'), i;
for (i = 0; i < divs.length; ++i) {
    var span = document.createElement("span");
  divs[i].appendChild(span);
}

let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.matches("span")){
        var text = e.target.parentNode.innerHTML.replace('<span></span>','');;
        responsiveVoice.speak(text, "Dutch Female");
    }

});
