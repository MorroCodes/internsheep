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
            'Bv. Front-End Developer', 'Bv. Lange Ridderstraat 89, 2800 Mechelen','Bv. Flexiebele Front-Ender gezocht', 'Bv. Kan werken met PHP, HTML en CSS.', 'Bv. Hands-on stage met kans op vaste job.'
        ],
        [
            'Bv. Motion Designer', 'Bv. Meir 6, 2000 Antwerpen', 'Bv. Enthousiaste motion designer gezocht', 'Bv. Ervaring met After Effects en CSS animaties', 'Bv. Hands-on stage met mogelijkheid tot werken aan eigen projecten.'
        ],
        [
            'Bv. Back-End Developer', 'Bv. Mechelstraat 92, 3000 Muizen', 'Bv. Drie plaatsen voor die-hard back-enders.', 'Bv. We zoeken naar mensen met een passie voor Laravel en CodeIgniter. Veel ervaring is niet nodig, ruimte om te leren.', 'Bv. Hands-on stage.'
        ],
        [
            'Bv. Laravel Expert', 'Bv. Steenhuffelstraat 1, 1840 Londerzeel', 'Bv. Ervaren Laravel developer.', 'Bv. We willen graag ons team uitbreiden met Laravel kenners.', 'Bv. Betaalde stage met job aanbieding.'
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
