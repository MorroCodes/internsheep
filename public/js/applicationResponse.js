let applicationCards = document.querySelector(".application-cards");

if (applicationCards != null) {
    let response;
    let applicationId;
    let studentId;
    applicationCards.addEventListener("click", (e) => {
        let target = e.target;
        let container = target.parentNode;
        applicationId = target.getAttribute("data-applicationId");
        studentId = target.getAttribute("data-studentId");
      
        if (e.target.matches(".application-response-deny")) {

            response = "denied";
            updateApplicationStatus(response, applicationId, container, studentId);

        } else if (e.target.matches(".application-response-maybe")) {

            response = "maybe";
            updateApplicationStatus(response, applicationId, container, studentId);

        } else if (e.target.matches(".application-response-accept")) {

            response = "accepted";
            updateApplicationStatus(response, applicationId, container, studentId);

        } else if (e.target.matches(".btn-message")) {
            let messagePopup = document.querySelector(".popup-message");
            let messagePopupBg = document.querySelector(".popup-overlay");
            console.log(messagePopupBg);
            let popupTitle = document.querySelector(".popup-title");

            showMessagePopup(messagePopup, popupTitle, target, applicationId, studentId,messagePopupBg);
            closeMessagePopup(messagePopup, popupTitle, messagePopupBg);
        }
    })
}

function closeMessagePopup(messagePopup, popupTitle,messagePopupBg) {
    let closePopup = document.querySelector(".close");
    let messageInput = document.querySelector(".message-input");
    closePopup.addEventListener("click", (e) => {
        messagePopup.style.display = "none";
        messageInput.innerHTML = "";
        popupTitle.innerHTML = "";
        messagePopupBg.style.display="none";

    })
}

function showMessagePopup(messagePopup, popupTitle, target, applicationId, studentId, messagePopupBg) {

    let name = target.getAttribute("data-applicant");
  
    messagePopup.style.position = "fixed";
    messagePopupBg.style.display="block";
    messagePopup.style.display="block";
    popupTitle.innerHTML = `Reageer op de sollicitatie van ${name}.`;
    let applicationIdInput = document.querySelector(".application-id");
    applicationIdInput.value = applicationId;
    let studentIdInput = document.querySelector(".student-id");
    studentIdInput.value = studentId;


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
