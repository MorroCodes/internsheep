let applicationCards = document.querySelector(".application-cards");

if (applicationCards != null) {
    let response;
    let applicationId;
    applicationCards.addEventListener("click", (e) => {
        let target = e.target;
        let container = target.parentNode;
        console.log(container);
        if (e.target.matches(".application-response-deny")) {

            applicationId = target.getAttribute("data-applicationId");
            response = "denied";
            updateApplicationStatus(response, applicationId, container);
  
        } else if (e.target.matches(".application-response-maybe")) {

            applicationId = target.getAttribute("data-applicationId");
            response = "maybe";
            updateApplicationStatus(response, applicationId, container);

        } else if (e.target.matches(".application-response-accept")) {
  
            applicationId = target.getAttribute("data-applicationId");
            response = "accepted";
            updateApplicationStatus(response, applicationId, container);

        }

    })
}

function updateApplicationStatus(response, applicationId, container) {
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
            container.innerHTML = response;
        }
    });
}
