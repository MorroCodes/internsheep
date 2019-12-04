let denyBtn = document.querySelector(".application-response-deny");
let maybeBtn = document.querySelector(".application-response-maybe");
let acceptBtn = document.querySelector(".application-response-accept");


if(denyBtn != null){
    // check if classes are available on page so it only works on pages that it needs to.
    let response;
    let applicationId;
    denyBtn.addEventListener("click", (e) =>{
        applicationId = denyBtn.dataset.applicationId;
        response = "denied";
        updateApplicationStatus(response, applicationId);
    })

    maybeBtn.addEventListener("click", (e) =>{
        applicationId = maybeBtn.dataset.applicationId;
        response = "maybe";
        updateApplicationStatus(response, applicationId);
    })

    acceptBtn.addEventListener("click", (e) =>{
        applicationId = acceptBtn.dataset.applicationId;
        response = "accepted";
        updateApplicationStatus(response, applicationId);
    })




}

function updateApplicationStatus(response, applicationId){
    // ajax call naar route
    // handle + change ui obv antwoord
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
    $.ajax({
        url: base_url+"/company/application/response",
        method: "POST",
        data:{response: response,applicationId: applicationId},
        success: function(data){
            alert(data['response']);
        }
    });
    // axios.post('homestead.test/company/application/response', {
    //     response: response,
    //     applicationId: applicationId
    //   })
    //   .then(function (response) {
    //     console.log(response);
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });
}