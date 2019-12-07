let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.matches(".icon-menu")){
        if(document.querySelector("nav").classList.contains("responsive-menu")){
            document.querySelector("nav").classList.remove("responsive-menu");
        }else{
            document.querySelector("nav").classList.add("responsive-menu");
        }
    }
});
