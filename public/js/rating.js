let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.classList.contains("star")){
        let token = e.target.getAttribute("data-token")
        let rate = e.target.getAttribute("data-rate")
        rating(token, rate);
    }
});

function rating(tok) {
    alert(tok)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
           type:'POST',
           url:'/internship/rating',
           data:{name:"name"},
           success:function(data){
              alert(data.success);
           }

        });
}
