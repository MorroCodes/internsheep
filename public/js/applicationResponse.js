let applicationCards = document.querySelector(".application-cards");
let convoPage = document.querySelector(".messages-page-container-convos");

if(convoPage != null){
    convoPage.addEventListener("click", (e)=>{
        let target = e.target;
        let container = target.parentNode;
        let applicationId = target.getAttribute("data-applicationId");
        let studentId = target.getAttribute("data-studentId");
        let internshipId = target.getAttribute("data-internshipId");
        if (e.target.matches(".send-message--convo")) {
            sendNewMessageEvent(target, applicationId, studentId, internshipId);
        }
    })
    
}

if (applicationCards != null) {
    let response;
    let applicationId;
    let studentId;
    let internshipId;
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
            internshipId = target.getAttribute("data-internshipId");
            sendNewMessageEvent(target, applicationId, studentId, internshipId);
        }
    })
}

function sendNewMessageEvent(target, applicationId, studentId,internshipId){
    let messagePopup = document.querySelector(".popup-message");
    let messagePopupBg = document.querySelector(".popup-overlay");
    console.log(internshipId);
    let popupTitle = document.querySelector(".popup-title");

    showMessagePopup(messagePopup, popupTitle, target, applicationId, studentId,messagePopupBg, internshipId);
    closeMessagePopup(messagePopup, popupTitle, messagePopupBg);
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

function showMessagePopup(messagePopup, popupTitle, target, applicationId, studentId, messagePopupBg, internshipId) {

    let name = target.getAttribute("data-applicant");
  
    messagePopup.style.position = "fixed";
    messagePopupBg.style.display="block";
    messagePopup.style.display="block";
    popupTitle.innerHTML = `Reageer op de sollicitatie van ${name}.`;
    let applicationIdInput = document.querySelector(".application-id");
    applicationIdInput.value = applicationId;
    let studentIdInput = document.querySelector(".student-id");
    studentIdInput.value = studentId;
    let internshipInput = document.querySelector(".internship-id");
    internshipInput.value=internshipId;


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
var objDiv = document.querySelector(".messages-container");
if(objDiv != null){
    objDiv.scrollTop = objDiv.scrollHeight;
}