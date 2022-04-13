    // alert("Working!");
    fetchCities();

    const btnSaveCity = document.getElementById("btn-save");

    let city = document.getElementById("city");
    let region = document.getElementById("region");
    let island = document.getElementById("island");


    // Save City
    btnSaveCity.onclick = function () {
        let cityValue = document.getElementById("city").value;
        let regionValue = document.getElementById("region").value;
        let islandValue = document.getElementById("island").value;

        $.ajax({
            method: "POST",
            url: "includes/add-city-inc.php",
            data: {
                cityValue:cityValue,
                regionValue:regionValue,
                islandValue:islandValue
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
