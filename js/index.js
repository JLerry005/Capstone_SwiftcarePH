    // alert("Working!");
    
    $("#skeleton-loader").hide();
    showAllLisitng();
    function showAllLisitng() {
        $.ajax({
            method: "GET",
            url: "includes/all-listing-inc.php",
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />\
                                                </svg>\
                                                &nbsp;'+totalSlot+'\
                                            </h1>\
                                            <p class="flex flex-row items-center">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">\
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />\
                                                </svg>\
                                                &nbsp;'+hospitalType+'\
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
                    resultContainer.innerHTML = data;
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
    }

