let applicationCards = document.querySelector(".application-cards");

if (applicationCards != null) {
    let response;
    let applicationId;
    applicationCards.addEventListener("click", (e) => {
        let target = e.target;
        let container = target.parentNode;
        applicationId = target.getAttribute("data-applicationId");

        if (e.target.matches(".application-response-deny")) {

            response = "denied";
            updateApplicationStatus(response, applicationId, container);
  
        } else if (e.target.matches(".application-response-maybe")) {

            response = "maybe";
            updateApplicationStatus(response, applicationId, container);

        } else if (e.target.matches(".application-response-accept")) {
  
            response = "accepted";
            updateApplicationStatus(response, applicationId, container);

        } else if(e.target.matches(".btn-message")){
            let messagePopup = document.querySelector(".popup");
            let popupTitle = document.querySelector(".popup-title");
            showMessagePopup(messagePopup, popupTitle, target);
            closeMessagePopup(messagePopup);
        }
    })
}

function closeMessagePopup(messagePopup){
    let closePopup = document.querySelector(".close");
    closePopup.addEventListener("click", (e) =>{
        messagePopup.style.display="none";
    })
}

function showMessagePopup(messagePopup, popupTitle, target){
    
    let name = target.getAttribute("data-applicant");
    messagePopup.style.display="flex";
    messagePopup.style.position="fixed";
    popupTitle.innerHTML=`Reageer op de sollicitatie van ${name}.`;
}

function updateApplicationStatus(response, applicationId, container) {
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
       
            container.innerHTML = response;
        }
    });
}
