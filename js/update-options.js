    fetchCities();

    const btnSaveCity = document.getElementById("btn-save");

    let city   = document.getElementById("city");
    let region = document.getElementById("region");
    let island = document.getElementById("island");


    // Save City
    btnSaveCity.onclick = function () {
        let cityValue   = document.getElementById("city").value;
        let regionValue = document.getElementById("region").value;
        let islandValue = document.getElementById("island").value;

        $.ajax({
            method: "POST",
            url: "includes/add-city-inc.php",
            data: {
                cityValue   : cityValue,
                regionValue : regionValue,
                islandValue : islandValue
            },
            success: function (data) {
                city.value = '';
                fetchCities();
            }
        });
    }

    // Fetch City
    let cityTableBody = document.getElementById("city-table-body");

    function fetchCities() {
        $.ajax({
            method: "GET",
            url: "includes/get-cities-inc.php",
            success: function (data) {
                cityTableBody.innerHTML = data;
            }
        });
    }

    // Patient Concern 

    const btnSavePatient  = document.getElementById("btn-save-patient");
    let patientConcern = document.getElementById("patient-concern");
    let covidVariant   = document.getElementById("covid-variant");
    let covidType   = document.getElementById("covid-type");

    // Save Patient Concern
    btnSavePatient.onclick = function () {
        let patientConcernValue = document.getElementById("patient-concern").value;
        let covidVariantValue   = document.getElementById("covid-variant").value;
        let covidTypeValue   = document.getElementById("covid-type").value;

        $.ajax({
            method: "POST",
            url: "includes/add-patient-concern-inc.php",
            data: {
                patientConcernValue : patientConcernValue,
                covidVariantValue   : covidVariantValue,
                covidTypeValue:covidTypeValue
            },
            success: function (data) {
                patientConcern.value = '';
                fetchConcenrs();
            }
        });
    }

    // Fetch City
    let patientConcernTableBody = document.getElementById("patient-concern-table-body");
    fetchConcenrs();
    function fetchConcenrs() {
        $.ajax({
            method: "GET",
            url: "includes/get-concerns-inc.php",
            success: function (data) {
                patientConcernTableBody.innerHTML = data;
            }
        });
    }