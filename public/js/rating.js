let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.classList.contains("star")){
        let token = e.target.getAttribute("data-token")
        rating(token);

    }
});

function rating(tok) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
