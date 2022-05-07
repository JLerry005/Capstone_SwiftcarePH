    // alert("Working!");
    
    const btnBurgerButton = document.getElementById("hamburger-button");
    const sidebar = document.querySelector('.mobileMenu');
    const closeMenu = document.getElementById("btn-close-menu");
    let contentsContainer = document.querySelector('.main-container');

    btnBurgerButton.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
    });

    closeMenu.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
    });

    // contentsContainer.addEventListener("click", () => {
    //     mobileMenu.classList.toggle("hidden");
    // });

    // btnBurgerButton.addEventListener("click", () => {
    //     sidebar.classList.toggle("-translate-x-full");

    //     contentsContainer.addEventListener("click", () => {
    //         sidebar.classList.add("-translate-x-full");
    //     });

    // });

    $("#skeleton-loader").hide();
    showAllLisitng();
    function showAllLisitng() {
        $.ajax({
            method: "GET",
            url: "https://swiftcareph.herokuapp.com/includes/all-listing-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show();
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                // $("#listing-cards-container").html(data);
                let listingData = JSON.parse(data);

                $('#listing-cards-container').html("");
                
                for (let i = 0; i < listingData.length; i++) {
                    let data = listingData[i];
                    
                    let hospitalName = (data.hospital_name);
                    let hospitalAddress = (data.hospital_location);
                    let hospitalType = (data.hospital_type);
                    let roomSlot = (data.room_slot);
                    let bedSlot = (data.bed_slot);
                    let hospitalPhoneNumber = (data.hospital_phone);

                    let roomSlotInt = parseInt(roomSlot);
                    let bedSlotInt  = parseInt(bedSlot);

                    let totalSlot = roomSlotInt + bedSlotInt;

                    // Pass Listing ID to getCoverPhoto Function
                    let listingID = (data.listing_id);
                    // let finalImage;
                    // getCoverPhoto(listingID, finalImage);
                    // get_image_dir(listingID);

                    $.ajax({
                        method: "POST",
                        url: "includes/get-cover-photo-inc.php",
                        data: {listingID:listingID},
                        success: function (data, status) {
                            let finalImage = JSON.parse(data);

                            // console.log(finalImage);
                            let imageData = finalImage[0].image_dir;
                            // console.log(finalImage);
                            // return finalImage;
            
                            callback(imageData);
                        }
                    });

                    // let image = finalImage;
                    // console.log(image);

                    function callback(imageData) {
                        let data = imageData;
                        console.log(data);
                        

                        let card = $('<a href="hospital-overview?listingID='+listingID+'" class="border-[1px] border-gray-300 xl:col-span-3 2xl:col-span-2 lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-6 rounded-md bg-white drop-shadow-md p-2 lg:p-5 md:min-h-[20rem] text-sm hover:scale-105 transition-all cursor-pointer"><div id="listing-card">\
                                        <div class="mb-2 bg-red-300 h-28 md:h-36 bg-clip-border bg-center bg-cover bg-no-repeat rounded-md" style="background-image: url(Capstone/'+data+');" id="card-image-container">\
                                        </div>\
                                        <div class="flex flex-row justify-between md:items-center">\
                                            <h1 class="font-bold flex flex-row items-center hover:underline text-sm text-ellipsis line-clamp-1 text-orange-500" id="hospital-name">\
                                            '+hospitalName+'\
                                            </h1>\
                                            <button class="text-green-400">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />\
                                                </svg>\
                                            </button>\
                                        </div>\
                                        <div class="hidden md:block text-xs">\
                                            <p class="flex flex-row items-center cursor-text">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />\
                                                </svg>\
                                                &nbsp;'+hospitalPhoneNumber+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-row cursor-text mb-5 text-xs">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">\
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />\
                                            </svg>\
                                            <p class="line-clamp-2 text-ellipsis">\
                                                &nbsp;'+hospitalAddress+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-row justify-between items-center mb-2 text-xs">\
                                            <h1 class="flex flex-row items-center hover:underline">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />\
                                            </svg>\
                                                &nbsp;'+hospitalType+'\
                                            </h1>\
                                            <p class="flex flex-row items-center">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />\
                                                </svg>\
                                                &nbsp;'+totalSlot+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-col space-y-2">\
                                            <button class=" flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />\
                                                </svg>\
                                                &nbsp;Book Now\
                                            </button>\
                                            <button class="flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />\
                                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />\
                                                </svg>\
                                                &nbsp;Full Details\
                                            </button>\
                                        </div>\
                                    </div></a>');

                        // let hospitalNameText = document.getElementById("hospital-name");
                        // tippy(hospitalNameText, {
                        //     content: hospitalName,
                        // });

                        card.find('#hospital-name').on('mouseover', () => showToolTip());
                        
                        function showToolTip(){
                            tippy('#hospital-name', {
                            content: hospitalName,
                            followCursor: false,
                            placement: 'bottom'
                            });
                        }
                                         
                        $('#listing-cards-container').append(card);
                    } 
                }
            }
                    
        });
    }

    const findIcon = document.getElementById("find-icon");

    tippy(findIcon, {
        content: "I'm a Tippy tooltip!",
      });

    // Search Funtion
    let searchInput = document.getElementById("search-hospital-input");
    let resultContainer = document.getElementById("search-result-container");
    let loaderMessage = document.getElementById("results-loader");

    $(loaderMessage).hide();
    $(resultContainer).hide();

    searchInput.onkeyup = function () {
        let searchInputVal = document.getElementById("search-hospital-input").value;
        // console.log(searchInputVal);

        if (searchInputVal !="") {
            $.ajax({
                type: "GET",
                url: "includes/search-hospital-inc.php",
                data: {searchInputVal:searchInputVal},
                beforeSend: function () {
                    $(loaderMessage).show();
                },
                success: function (data) {
                    $(loaderMessage).hide();
                    $(resultContainer).show();
                    resultContainer.innerHTML = '<p class="m-4 text-sm xl:text-lg">Showing results for: <b>"'+searchInputVal +'"</b></p>' +data;
                    // console.log(data);
                }
            });
        }else{
            $(resultContainer).hide();
            resultContainer.innerHTML = '';
        }
    }

    // Dismiss Search Results when clicked outside
    $('body *:not(#searchInput)').mouseup(function () { 
        $(resultContainer).hide();
    });

    // Show Results when input is clicked
    searchInput.onclick = function () {
        $(resultContainer).show();
        searchInput.classList.add("bg-blue-400");
    }

    // Filter Ajax Funtion
    $("#apply-filter-button").click(function () {
        // alert("Working!");
        $("#discard-changes").show();
        $.ajax({
            method: "POST",
            url: "includes/filter-list-inc.php",
            data: {

                // -------------------------- Luzon ------------------------------------ //

                // -------- Region I -------- //
                alaminos:$('#regionIAlaminos:checkbox:checked').val(),
                batac:$('#regionIBatac:checkbox:checked').val(),
                candon:$('#regionICandon:checkbox:checked').val(),
                laoag:$('#regionILaoag:checkbox:checked').val(),
                sanCarlos:$('#regionISanCarlos:checkbox:checked').val(),
                sanFernando:$('#regionISanFernando:checkbox:checked').val(),
                urdaneta:$('#regionIUrdaneta:checkbox:checked').val(),
                vigan:$('#regionIVigan:checkbox:checked').val(),
                dagupan:$('#regionIDagupan:checkbox:checked').val(),

                // -------- Region II -------- //
                cauayan:$('#regionIICauayan:checkbox:checked').val(),
                ilagan:$('#regionIIIlagan:checkbox:checked').val(),
                santiago:$('#regionIISantiago:checkbox:checked').val(),
                tuguegarao:$('#regionIITuguegarao:checkbox:checked').val(),

                 // -------- Region III -------- //
                 balanga:$('#regionIIIBalanga:checkbox:checked').val(),
                 malolos:$('#regionIIIMalolos:checkbox:checked').val(),
                 meycauayan:$('#regionIIIMeycauayan:checkbox:checked').val(),
                 sanJosedelMonte:$('#regionIIISanJosedelMonte:checkbox:checked').val(),
                 cabanatuan:$('#regionIIICabanatuan:checkbox:checked').val(),
                 gapan:$('#regionIIIGapan:checkbox:checked').val(),
                 muñoz:$('#regionIIIMuñoz:checkbox:checked').val(),
                 palayan:$('#regionIIIPalayan:checkbox:checked').val(),
                 sanJose:$('#regionIIISanJose:checkbox:checked').val(),
                 AngelesCity:$('#regionIIIAngelesCity:checkbox:checked').val(),
                 mabalacat:$('#regionIIIMabalacat:checkbox:checked').val(),
                 sanFernando:$('#regionIIISanFernando:checkbox:checked').val(),
                 tarlac:$('#regionIIITarlac:checkbox:checked').val(),
                 olongapo:$('#regionIIIOlongapo:checkbox:checked').val(),

                 // -------- Region IV-A -------- //
                 antipolo:$('#regionIVAntipolo:checkbox:checked').val(),
                 bacoor:$('#regionIVBacoor:checkbox:checked').val(),
                 batangas:$('#regionIVBatangas:checkbox:checked').val(),
                 biñan:$('#regionIVBiñan:checkbox:checked').val(),   
                 cabuyao:$('#regionIVCabuyao:checkbox:checked').val(),
                 calamba:$('#regionIVCalamba:checkbox:checked').val(),
                 cavite:$('#regionIVCavite:checkbox:checked').val(),
                 dasmariñas:$('#regionIVDasmariñas:checkbox:checked').val(),
                 generalTrias:$('#regionIVGeneralTrias:checkbox:checked').val(),
                 imus:$('#regionIVImus:checkbox:checked').val(),
                 lipa:$('#regionIVLipa:checkbox:checked').val(),
                 lucena:$('#regionIVLucena:checkbox:checked').val(),
                 sanPablo:$('#regionIVSanPablo:checkbox:checked').val(),
                 sanPedro:$('#regionIVSanPedro:checkbox:checked').val(),
                 santaRosa:$('#regionIVSantaRosa:checkbox:checked').val(),
                 santoTomas:$('#regionIVSantoTomas:checkbox:checked').val(),
                 tagaytay:$('#regionIVTagaytay:checkbox:checked').val(),
                 tanauan:$('#regionIVTanauan:checkbox:checked').val(),
                 tayabas:$('#regionIVTayabas:checkbox:checked').val(),
                 treceMartires:$('#regionIVTreceMartires:checkbox:checked').val(),

                // -------- Region V -------- //
                legazpi:$('#regionVLegazpi:checkbox:checked').val(),
                naga:$('#regionVNaga:checkbox:checked').val(),
                iriga:$('#regionVIriga:checkbox:checked').val(),
                tabaco:$('#regionVTabaco:checkbox:checked').val(),
                ligao:$('#regionVLigao:checkbox:checked').val(),
                sorsogon:$('#regionVSorsogon:checkbox:checked').val(),
                masbate:$('#regionVMasbate:checkbox:checked').val(),

                // -------- Region NCR -------- //
                caloocan:$('#NCRCaloocan:checkbox:checked').val(),
                marikina:$('#NCRMarikina:checkbox:checked').val(),
                makati:$('#NCRMakati:checkbox:checked').val(),
                mandaluyong:$('#NCRMandaluyong:checkbox:checked').val(),
                muntinlupa:$('#NCRMuntinlupa:checkbox:checked').val(),
                manila:$('#NCRManila:checkbox:checked').val(),
                navotas:$('#NCRNavotas:checkbox:checked').val(),
                malabon:$('#NCRMalabon:checkbox:checked').val(),
                valenzuela:$('#NCRValenzuela:checkbox:checked').val(),
                pasay:$('#NCRPasay:checkbox:checked').val(),
                pasig:$('#NCRPasig:checkbox:checked').val(),
                parañaque:$('#NCRParañaque:checkbox:checked').val(),
                quezon:$('#NCRQuezon:checkbox:checked').val(),
                sanJuan:$('#NCRSanJuan:checkbox:checked').val(),
                lasPiñas:$('#NCRLasPiñas:checkbox:checked').val(),
                taguig:$('#NCRTaguig:checkbox:checked').val(),

                // -------- Region CAR -------- //
                tabuk:$('#CARTabuk:checkbox:checked').val(),
                baguio:$('#CARBaguio:checkbox:checked').val(),

                // -------- Region MIMAROPA -------- //
                puertoPrincesa:$('#MIMAROPAPuertoPrincesa:checkbox:checked').val(),
                calapan:$('#MIMAROPACalapan:checkbox:checked').val(),


                // --------------------------- Visayas ----------------------------------- //

                // ------------- RegionVI ------------ //

                victorias:$('#regionVIVictorias:checkbox:checked').val(),
                talisay:$('#regionVITalisay:checkbox:checked').val(),
                sipalay:$('#regionVISipalay:checkbox:checked').val(),
                silay:$('#regionVISilay:checkbox:checked').val(),
                sanCarlos:$('#regionVISanCarlos:checkbox:checked').val(),
                sagay:$('#regionVISagay:checkbox:checked').val(),
                carlota:$('#regionVILaCarlota:checkbox:checked').val(),
                kabankalan:$('#regionVIKabankalan:checkbox:checked').val(),
                himamaylan:$('#regionVIHimamaylan:checkbox:checked').val(),
                escalante:$('#regionVIEscalante:checkbox:checked').val(),
                cadiz:$('#regionVICadiz:checkbox:checked').val(),
                bago:$('#regionVIBago:checkbox:checked').val(),
                bacolod:$('#regionVIBacolod:checkbox:checked').val(),
                calapan:$('#regionVIPassi:checkbox:checked').val(),
                iloilo:$('#regionVIIloilo:checkbox:checked').val(),
                roxas:$('#regionVIRoxas:checkbox:checked').val(),

                // ------------- RegionVII ------------ //
                toledo:$('#regionVIIToledo:checkbox:checked').val(),
                tanjay:$('#regionVIITanjay:checkbox:checked').val(),
                guihulngan:$('#regionVIIGuihulngan:checkbox:checked').val(),
                dumaguete:$('#regionVIIDumaguete:checkbox:checked').val(),
                canlaon:$('#regionVIICanlaon:checkbox:checked').val(),
                bayawan:$('#regionVIIBayawan:checkbox:checked').val(),
                bais:$('#regionVIIBais:checkbox:checked').val(),
                talisay:$('#regionVIITalisay:checkbox:checked').val(),
                naga:$('#regionVIINaga:checkbox:checked').val(),
                mandaue:$('#regionVIIMandaue:checkbox:checked').val(),
                lapuLapu:$('#regionVIILapuLapu:checkbox:checked').val(),
                danaoati:$('#regionVIIDanaoati:checkbox:checked').val(),
                cebu:$('#regionVIICebu:checkbox:checked').val(),
                carcar:$('#regionVIICarcar:checkbox:checked').val(),
                bogo:$('#regionVIIBogo:checkbox:checked').val(),
                tagbilaran:$('#regionVIITagbilaran:checkbox:checked').val(),

                // ------------- Region VIII --------- //

                maasin:$('#regionVIIIMaasin:checkbox:checked').val(),
                catbalogan:$('#regionVIIICatbalogan:checkbox:checked').val(),
                calbayog:$('#regionVIIICalbayog:checkbox:checked').val(),
                tacloban:$('#regionVIIITacloban:checkbox:checked').val(),
                ormoc:$('#regionVIIIOrmoc:checkbox:checked').val(),
                baybay:$('#regionVIIIBaybay:checkbox:checked').val(),
                borongan:$('#regionVIIIBorongan:checkbox:checked').val(),

                // --------------------------- Mindanao ----------------------------------- //

                // ------------- Region IX --------- //
                zamboanga:$('#regionIXZamboanga:checkbox:checked').val(),
                pagadian:$('#regionIXPagadian:checkbox:checked').val(),
                dipolog:$('#regionIXDipolog:checkbox:checked').val(),
                dapitan:$('#regionIXDapitan:checkbox:checked').val(),
                isabela:$('#regionIXIsabela:checkbox:checked').val(),

                // ------------- Region X --------- //
                gingoog:$('#regionXGingoog:checkbox:checked').val(),
                salvador:$('#regionXElSalvador:checkbox:checked').val(),
                cagayandeOro:$('#regionXCagayandeOro:checkbox:checked').val(),
                tangub:$('#regionXTangub:checkbox:checked').val(),
                ozamiz:$('#regionXOzamiz:checkbox:checked').val(),
                oroquieta:$('#regionXOroquieta:checkbox:checked').val(),
                iligan:$('#regionXIligan:checkbox:checked').val(),
                valencia:$('#regionXValencia:checkbox:checked').val(),
                malaybalay:$('#regionXMalaybalay:checkbox:checked').val(),

                // ------------- Region XI --------- //
                mati:$('#regionXIMati:checkbox:checked').val(),
                digos:$('#regionXIDigos:checkbox:checked').val(),
                davao:$('#regionXIDavao:checkbox:checked').val(),
                tagum:$('#regionXITagum:checkbox:checked').val(),
                samal:$('#regionXISamal:checkbox:checked').val(),
                panabo:$('#regionXIPanabo:checkbox:checked').val(),

                // ------------- Region XII --------- //
                kidapawan:$('#regionXIIKidapawan:checkbox:checked').val(),
                generalSantos:$('#regionXIIGeneralSantos:checkbox:checked').val(),
                koronadal:$('#regionXIIKoronadal:checkbox:checked').val(),
                tacurong:$('#regionXIITacurong:checkbox:checked').val(),

                // ------------- BARMM --------- //
                marawi:$('#BARMMMarawi:checkbox:checked').val(),
                lamitan:$('#BARMMLamitan:checkbox:checked').val(),
                cotabato:$('#BARMMCotabato:checkbox:checked').val(),

                // ------------- Region XIII --------- //
                tandag:$('#regionXIIITandag:checkbox:checked').val(),
                bislig:$('#regionXIIIBislig:checkbox:checked').val(),
                surigao:$('#regionXIIISurigao:checkbox:checked').val(),
                bayugan:$('#regionXIIIBayugan:checkbox:checked').val(),
                cabadbaran:$('#regionXIIICabadbaran:checkbox:checked').val(),
                butuan:$('#regionXIIIButuan:checkbox:checked').val(),

                // -------------------------- Hospital Type ---------------------------- //
                hospitalType:$(".hospitalType:checked").val()

            },
            beforeSend: function () {
                $("#filter-loader").show();  
            },
            success: function (data) {
                $("#filter-loader").hide();
                // console.log(data);
                // allListing.innerHTML = data;
                let filteredData = JSON.parse(data);
                $('#listing-cards-container').html("");
                $("#filter-content").toggle(340);
                for (let i = 0; i < filteredData.length; i++) {
                    let data = filteredData[i];

                    let hospitalName = (data.hospital_name);
                    let listingID = (data.listing_id);

                    let hospitalAddress = (data.hospital_location);
                    let hospitalType = (data.hospital_type);
                    let roomSlot = (data.room_slot);
                    let bedSlot = (data.bed_slot);
                    let hospitalPhoneNumber = (data.hospital_phone);

                    let roomSlotInt = parseInt(roomSlot);
                    let bedSlotInt  = parseInt(bedSlot);

                    let totalSlot = roomSlotInt + bedSlotInt;

                    // Get Cover Images for each listing
                    $.ajax({
                        method: "POST",
                        url: "includes/get-cover-photo-inc.php",
                        data: {listingID:listingID},
                        success: function (data, status) {
                            let finalImage = JSON.parse(data);

                            // console.log(finalImage);
                            let imageData = finalImage[0].image_dir;
                            // console.log(finalImage);
                            // return finalImage;
            
                            callback(imageData);
                        }
                    });

                    function callback(imageData) {
                        let data = imageData;
                        let card = $('<a href="hospital-overview?listingID='+listingID+'" class="border-[1px] border-gray-300 xl:col-span-3 2xl:col-span-2 lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-6 rounded-md bg-white drop-shadow-md p-2 lg:p-5 md:min-h-[20rem] text-sm hover:scale-105 transition-all cursor-pointer"><div id="listing-card">\
                                        <div class="mb-2 bg-red-300 h-28 md:h-36 bg-clip-border bg-center bg-cover bg-no-repeat rounded-md" style="background-image: url(Capstone/'+data+');" id="card-image-container">\
                                        </div>\
                                        <div class="flex flex-row justify-between md:items-center">\
                                            <h1 class="font-bold flex flex-row items-center hover:underline text-sm text-ellipsis line-clamp-1 text-orange-500" id="hospital-name">\
                                            '+hospitalName+'\
                                            </h1>\
                                            <button class="text-green-400">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />\
                                                </svg>\
                                            </button>\
                                        </div>\
                                        <div class="hidden md:block text-xs">\
                                            <p class="flex flex-row items-center cursor-text">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />\
                                                </svg>\
                                                &nbsp;'+hospitalPhoneNumber+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-row cursor-text mb-5 text-xs">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">\
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />\
                                            </svg>\
                                            <p class="line-clamp-2 text-ellipsis">\
                                                &nbsp;'+hospitalAddress+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-row justify-between items-center mb-2 text-xs">\
                                            <h1 class="flex flex-row items-center hover:underline">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />\
                                            </svg>\
                                                &nbsp;'+hospitalType+'\
                                            </h1>\
                                            <p class="flex flex-row items-center">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />\
                                                </svg>\
                                                &nbsp;'+totalSlot+'\
                                            </p>\
                                        </div>\
                                        <div class="flex flex-col space-y-2">\
                                            <button class=" flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />\
                                                </svg>\
                                                &nbsp;Book Now\
                                            </button>\
                                            <button class="flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />\
                                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />\
                                                </svg>\
                                                &nbsp;Full Details\
                                            </button>\
                                        </div>\
                                    </div></a>');

                        // let hospitalNameText = document.getElementById("hospital-name");
                        // tippy(hospitalNameText, {
                        //     content: hospitalName,
                        // });

                        card.find('#hospital-name').on('mouseover', () => showToolTip());
                        
                        function showToolTip(){
                            tippy('#hospital-name', {
                            content: hospitalName,
                            followCursor: false,
                            placement: 'bottom'
                            });
                        }              
                        $('#listing-cards-container').append(card);
                    } 
                }
            }
        });
    });

    // Discard Changes
    $("#discard-changes").hide();
    
     // Clear Filter 
     document.getElementById('discard-changes').onclick = function() {
        showAllLisitng();
        $("#filter-content").toggle(340);
        $("#discard-changes").hide();
        $("#clear-selection").hide();
        $("#apply-filter-button").hide();
        var checkboxes = document.querySelectorAll('.checkbox');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked=false;
        }
    }

    // Show clear & apply filter selection if a checkbox is checked.
    $("#clear-selection").hide();
    $("#apply-filter-button").hide();
    $(".checkbox").click(function() {
        $('#clear-selection').toggle( $(".checkbox:checked").length > 0 );
        $('#apply-filter-button').toggle( $(".checkbox:checked").length > 0 );
    });

     // Show apply filter button if a checkbox is checked.

    //  $(".checkbox").click(function() {
    //      if($(this).is(":checked")) {
    //          $("#apply-filter-button").fadeIn();
    //      } else {
    //          $("#apply-filter-button").fadeOut();
    //      }
    //  });

    // Show clear selection if a checkbox is checked.
    // $("#clear-selection").hide();
    // $(".checkbox").click(function() {
    //     if($(this).is(":checked")) {
    //         $("#clear-selection").fadeIn();
    //     } else {
    //         $("#clear-selection").fadeOut();
    //     }
    // });

    // $("input[type='checkbox']").change(function(){
    //     var a = $("input[type='checkbox']");
    //     if(a.length == a.filter(":checked").length){
    //         alert('all checked');
    //     } else {
    //         alert('not all checked');
    //     }
    // });
   
    
    // Clear All Selection
    document.getElementById('clear-selection').onclick = function() {
        var checkboxes = document.querySelectorAll('.checkbox');
        $("#clear-selection").fadeOut();
        $("#apply-filter-button").fadeOut();
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked=false;
        }
    }

    // Toggle Filter Button
    $("#filter-content").hide();

    $("#toggle-filter").click(function () {
        $("#filter-content").toggle(340);
    });

    $("#close-filter-options").click(function () {
        $("#filter-content").toggle(340);
    });

    $("#luzon-region-checkbox").hide();
    $("#visayas-region-checkbox").show();
    $("#mindanao-region-checkbox").hide();
    // --------------------------------
    // Toggle Luzon Contents
    $("#luzon-toggle-button").click(function () {
        $("#luzon-region-checkbox").toggle(340);
        $(".luzon-dropdown-icon").toggleClass("bi-chevron-up bi-chevron-down");
    });

    // Toggle Visayas Contents
    $("#visayas-toggle-button").click(function () {
        $("#visayas-region-checkbox").toggle(340);
        $(".visayas-dropdown-icon").toggleClass("bi-chevron-up bi-chevron-down");
    });

    // Toggle Mindanao Contents
    $("#mindanao-toggle-button").click(function () {
        $("#mindanao-region-checkbox").toggle(340);
        $(".mindanao-dropdown-icon").toggleClass("bi-chevron-up bi-chevron-down");
    });
    // -------------------------------

    // Checkbox - Select All From Luzon
    function toggle(source) {
        checkboxes = document.getElementsByName('luzon');
        for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
        }
    }

    // Select All Visayas Toggle Button
    // $("#visayas-toggle-button").click(function () {
    //     $("#visayas-region-checkbox").toggle(340);
    // });

    // Checkbox - Select All From Visayas
    function selectAllVisayas(source) {
        checkboxes = document.getElementsByName('visayas');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    // Checkbox - Select All From mindanao
    function selectAllMindanao(source) {
        checkboxes = document.getElementsByName('mindanao');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    // -----------------------Luzon - Select all by Region--------------------- //

    // Check All Region 1
    document.getElementById('checkAllRegionI').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionI');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All Region 2
    document.getElementById('checkAllRegionII').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionII');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All Region 3
    document.getElementById('checkAllRegionIII').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionIII');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All Region 4-A
    document.getElementById('checkAllRegionIVA').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionIVA');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All Region 5
    document.getElementById('checkAllRegionV').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionV');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All NCR
    document.getElementById('checkAllRegionNCR').onclick = function() {
        var checkboxes = document.querySelectorAll('.NCR');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All CAR
    document.getElementById('checkAllRegionCAR').onclick = function() {
        var checkboxes = document.querySelectorAll('.CAR');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All MIMAROPA
    document.getElementById('checkAllRegionMIMAROPA').onclick = function() {
        var checkboxes = document.querySelectorAll('.MIMAROPARegion');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }


    // -----------------------Visayas - Select all by Region------------------- //
    // Check All Region VI
    document.getElementById('checkAllRegionVI').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionVI');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All RegionVII
    document.getElementById('checkAllRegionVII').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionVII');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All RegionVIII
    document.getElementById('checkAllRegionVIII').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionVIII');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // -----------------------MIndanao - Select all by Region------------------- //
    // Check All RegionIX
    document.getElementById('checkAllRegionIX').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionIX');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All RegionX
    document.getElementById('checkAllRegionX').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionX');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All RegionXI
    document.getElementById('checkAllRegionXI').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionXI');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
    
    // Check All SOCCSKSARGEN
    document.getElementById('checkAllSOCCSKSARGEN').onclick = function() {
        var checkboxes = document.querySelectorAll('.SOCCSKSARGENRegion');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All BARMM Region
    document.getElementById('checkAllBARMMRegion').onclick = function() {
        var checkboxes = document.querySelectorAll('.BARMMRegion');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    // Check All Region XIII
    document.getElementById('checkAllRegionXIII').onclick = function() {
        var checkboxes = document.querySelectorAll('.regionXIII');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

