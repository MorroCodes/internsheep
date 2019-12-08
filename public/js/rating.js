let body = document.querySelector("body");
body.addEventListener('click', function(e) {
    if(e.target.classList.contains("star")){
        let int = e.target.getAttribute("data-int")
        let rate = e.target.getAttribute("data-rate")
        rating(int, rate);
    }
});

function rating(int, rate) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
           type:'POST',
           url:'/internship/rating',
           data:{
               internship: int,
               rating: rate
           },
           success:function(data){
              console.log(data.success);
           }

        });
}
