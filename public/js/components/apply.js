let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.matches(".apply")){
        document.querySelector('.popup').style.display = "flex";
    }else if(e.target.matches(".close")){
        document.querySelector('.popup').style.display = "none";
    }
});
