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

        } else if (e.target.matches(".btn-message")) {
            let messagePopup = document.querySelector(".popup");
            let popupTitle = document.querySelector(".popup-title");

            showMessagePopup(messagePopup, popupTitle, target, applicationId);
            closeMessagePopup(messagePopup, popupTitle);
        }
    })
}

function closeMessagePopup(messagePopup, popupTitle) {
    let closePopup = document.querySelector(".close");
    let messageInput = document.querySelector(".message-input");
    closePopup.addEventListener("click", (e) => {
        messagePopup.style.display = "none";
        messageInput.innerHTML = "";
        popupTitle.innerHTML = "";
    })
}

function showMessagePopup(messagePopup, popupTitle, target, applicationId) {

    let name = target.getAttribute("data-applicant");
    messagePopup.style.display = "flex";
    messagePopup.style.position = "fixed";
    popupTitle.innerHTML = `Reageer op de sollicitatie van ${name}.`;
    let applicationIdInput = document.querySelector(".application-id");
    applicationIdInput.value = applicationId;

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
