let formControl = document.querySelector(".internship-create-form-control");

if (formControl != null) {
    let internshipTitle = document.querySelector(".create-internship-input-title");
    let internshipAddress = document.querySelector(".create-internship-input-address");
    let internshipDescription = document.querySelector(".create-internship-input-description");
    let internshipFunction = document.querySelector(".create-internship-input-function");
    let internshipOffer = document.querySelector(".create-internship-input-offer");

    let formInputArray = [internshipTitle, internshipAddress, internshipDescription, internshipFunction, internshipOffer];

    let placeholderArray = [
        [
            'Front-End Developer', 'Lange Ridderstraat 89, 2800 Mechelen','Flexiebele Front-Ender gezocht', 'Kan werken met PHP, HTML en CSS.', 'Hands-on stage met kans op vaste job.'
        ],
        [
            'Motion Designer', 'Meir 6, 2000 Antwerpen', 'Enthousiaste motion designer gezocht', 'Ervaring met After Effects en CSS animaties', 'Hands-on stage met mogelijkheid tot werken aan eigen projecten.'
        ],
        [
            'Back-End Developer', 'Mechelstraat 92, 3000 Muizen', 'Drie plaatsen voor die-hard back-enders.', 'We zoeken naar mensen met een passie voor Laravel en CodeIgniter. Veel ervaring is niet nodig, ruimte om te leren.', 'Hands-on stage.'
        ],
        [
            'Laravel Expert', 'Steenhuffelstraat 1, 1840 Londerzeel', 'Ervaren Laravel developer.', 'We willen graag ons team uitbreiden met Laravel kenners.', 'Betaalde stage met job aanbieding.'
        ]
    ]

    let option = getRandomInt(4);

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }

    for (let i = 0; formInputArray.length > i; i++) {
        formInputArray[i].placeholder = placeholderArray[option][i];
    }

}
