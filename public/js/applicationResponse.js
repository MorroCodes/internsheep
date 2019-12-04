let applicationCards = document.querySelector(".application-cards");

if (applicationCards != null) {
    let response;
    let applicationId;
    applicationCards.addEventListener("click", (e) => {
        let target = e.target;
        console.log(target);
        if (e.target.matches(".application-response-deny")) {

            applicationId = target.getAttribute("data-applicationId");
            response = "denied";
            updateApplicationStatus(response, applicationId);
  
        } else if (e.target.matches(".application-response-maybe")) {

            applicationId = target.getAttribute("data-applicationId");
            response = "maybe";
            updateApplicationStatus(response, applicationId);

        } else if (e.target.matches(".application-response-accept")) {
  
            applicationId = target.getAttribute("data-applicationId");
            response = "accepted";
            updateApplicationStatus(response, applicationId);

        }

    })
}

// if (denyBtn != null) {
//     // check if classes are available on page so it only works on pages that it needs to.
//     let response;
//     let applicationId;
//     denyBtn.addEventListener("click", (e) => {
//         applicationId = denyBtn.getAttribute("data-applicationId");
//         response = "denied";
//         updateApplicationStatus(response, applicationId);
//     })

//     maybeBtn.addEventListener("click", (e) => {
//         applicationId = maybeBtn.getAttribute("data-applicationId");
//         response = "maybe";
//         updateApplicationStatus(response, applicationId);
//     })

//     acceptBtn.addEventListener("click", (e) => {
//         applicationId = acceptBtn.getAttribute("data-applicationId");
//         response = "accepted";
//         updateApplicationStatus(response, applicationId);
//     })
// }

function updateApplicationStatus(response, applicationId) {
    // ajax call naar route
    // handle + change ui obv antwoord
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + "/company/application/response",
        method: "POST",
        data: {
            response: response,
            applicationId: applicationId
        },
        success: function (data) {
            alert(data['applicationId']);
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
