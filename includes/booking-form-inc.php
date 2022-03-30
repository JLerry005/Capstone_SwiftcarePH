<?php
    session_start();
    include_once 'dbh-inc.php';
    $listingID = $_POST["listingID"];

    $getDetails = $conn->query("SELECT * FROM hospitallisting WHERE listing_id = $listingID;") or die($conn->error);
    while ($data = mysqli_fetch_assoc($getDetails)) {

    }

    if (isset($_SESSION['sessionpatientUserID'])) {

            echo '
                <!-- Form -->
                <form id="bookingForm">
                    <!-- Bookin Form Body -->
                    <div class="p-4 space-y-2">
                        <!-- Patient Name Text -->
                        <div class="mb-3 font-semibold flex justify-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                            <p>&ensp;Patient Name</p><span class="text-red-500">&nbsp;*</span>
                        </div>

                        <!-- Patient First & Last Name -->
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <!-- Patient First Name -->
                            <div class="relative z-0 mb-4 w-full group">
                                <!-- <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First Name</label> -->
                                <input type="text" name="firstName" id="firstName" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="First Name" required/>
                            </div>
                            <!-- Patient Last Name -->
                            <div class="relative z-0 mb-4 w-full group">
                                <!-- <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last name</label> -->
                                <input type="text" name="lastName" id="lastName" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Last name" required />
                            </div>
                        </div>

                        <!-- Appointment Schedule Text -->
                        <div class="font-semibold flex justify-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <p>&ensp;Appointment Schedule</p><span class="text-red-600">&nbsp;*</span>
                        </div>


                        <!-- Date and time  -->
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <!-- Date -->
                            <div class="relative z-0 mb-4 w-full group">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                                <input type="date" name="date" id="date_picker" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
                            </div>

                            <!-- Time -->
                            <div class="relative z-0 mb-4 w-full group">
                                <label for="time" class="block mb-2 text-sm font-medium text-gray-900">Time</label>
                                <input type="time" name="time" id="time" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                            </div>
                        </div>

                        <!-- Contact Details Text -->
                        <div class="font-semibold flex justify-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <p>&ensp;Contact Number</p><span class="text-red-600">&nbsp;*</span>
                        </div>

                        <!-- Contact Number -->
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-1 pointer-events-none">
                                <img src="assets\Philippines-Flag.svg" alt="Philippines Flag" class="w-10 h-10 p-1" >
                            </div>
                        <input type="tel" id="phoneNumber" name="phoneNumber" maxlength="11" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 p-2.5 " placeholder="Phone number (09X-XXXX-XXXX)" required>
                        </div>

                        <!-- Select & Specify your concern -->
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <!-- Select concern -->
                            <div class="relative z-0 pt-4 w-full group">

                                <div class="flex justify-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                    </svg>
                                    <label for="concern" class="block mb-2 text-sm font-medium text-gray-900">&ensp;Select your Concern</label>                                        
                                    <div id="select-concern-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div> 

                                <select id="concern" name="concern" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected disabled value="" class="font-medium text-gray-900">-Select-</option>
                                    <option value="Covid">Covid</option>
                                    <option value="Non-Covid">Non - Covid</option>
                                </select>
                            </div>

                            <!-- Specify your concern input -->
                            <div class="relative z-0 mt-10 w-full group">
                                <input type="text" name="specifyConcern" id="specifyConcern" class="mt-1 bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Specify your concern" disabled required>
                            </div>
                        </div>

                        <!-- Hospital Details Text -->
                        <div class="pt-4 font-semibold flex justify-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                            </svg>
                            <p>&ensp;Hospital Details</p><span class="text-red-600">&nbsp;*</span>
                        </div>

                        <!-- Hospital Name and City  -->
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <!-- Hospital Name -->
                            <div class="relative z-0 mt-2 mb-6 w-full group">
                                <!-- <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Hospital Name</label> -->
                                <input type="text" name="hospitalName" id="hospitalName" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" value="<?php echo $hospitalName ?>" disabled />
                            </div>

                            <!-- Bed or Room -->
                            <div class="relative mt-2 z-0 w-full group">

                                <!-- <div class="flex justify-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                    </svg>
                                    <label for="concern" class="block mb-2 text-sm font-medium text-gray-900">Select your Reservation Type</label><span class="text-red-600">&nbsp;*</span>
                                </div>  -->

                                <select id="reservationType" name="reservationType" class="bg-blue-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" >
                                    <option selected disabled value="" class="font-medium text-gray-900">-Select your Reservation Type-</option>

                                        if ($bedSlot > 0) {
                                            echo '?><option value="bed">Bed</option><?php';
                                        }

                                        if ($roomSlot > 0) {
                                            echo '<option value="room">Room</option>';
                                        }

                        
                                </select>
                            </div>

                        </div>

                        <!-- Hospital Referral -->
                        <div>
                            <?php if($referral == "Yes"){
                                echo '
                                    <div class="flex flex-rows">
                                        <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Attachment for Referal</label><span class="text-red-600">&nbsp;*</span>
                                    </div>
                                    <input class="block w-full text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-400 cursor-pointer focus:outline-none focus:border-transparent " aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                ';
                                }else {
                                    echo '';
                                }
                            ?>
                        </div>
                        

                        <!-- <div class="flex flex-rows">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Attachment for Referal</label><span class="text-red-600">&nbsp;*</span>
                        </div>
                        <input class="block w-full text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-400 cursor-pointer focus:outline-none focus:border-transparent " aria-describedby="user_avatar_help" id="user_avatar" type="file"> -->


                    <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-600">
                        <button type="button" name="btnBookingNow" id="btnBookingNow" class="focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Book Now</button>
                    </div>
                </div> 
            </form>
            ';
    }else {
        echo '
            <form action="includes/booking-login-inc.php?listingID=<?php echo $listingID ?>" method="post">  
                <p>You need to be Logged in first before you can book a reservation.</p>
                <button type="submit" name="booking-login" id="booking-login" class="focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Login</button>
            </form>
        ';
    }
    