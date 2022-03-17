
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Hospital Dashboard | Swiftcare PH</title>
    <link rel="stylesheet" href="../dist\output.css">
    <script src="js\account-hospital.js" defer></script>
    <link rel="stylesheet" href="styling/__acount-styling.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<body>
    
    <!-- Skeleton Loader -->
    <div class="h-screen" id="skeleton-loader">
        <div class="grid grid-cols-12 grow p-8 gap-x-10 gap-y-5">
            <div class="animate-pulse col-span-4 h-80 bg-gray-300"></div>
            <div class="animate-pulse col-span-4 h-80 bg-gray-300"></div>
            <div class="mb-10 animate-pulse col-span-4 h-80 bg-gray-300"></div>

            <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-3 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-3 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
            <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
        </div>
    </div>

    <form action="" method="">

    <!-- Main Container -->
    <div class="grid grid-cols-12 sm:px-3 md:px-6 2xl:px-12 space-y-6 xl:space-y-0 gap-5 text-sm mb-6 mt-10">

        <!-- Hospital Information Container -->
        <div class="col-span-12 xl:col-span-12 p-6 bg-white drop-shadow-md mb-5">

            <h1 class="font-bold">Hospital Informations</h1>

            <div class="py-3 mb-3">
                <hr class="border-gray-500">     
            </div>

            <!-- Hospital Name -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-building text-navColor"></i> Hospital Name</label>
                <input id="hospital-name" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
            </div>

            <!-- Email & Phone Number-->
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <!-- Email -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700"> <i class="bi bi-envelope text-navColor"></i> Email</label>
                    <input type="text" id="hospital-email" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                </div>
                <!-- Phone Number -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"> <i class="bi bi-telephone text-green-700"></i> Phone Number</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="hospital-phoneNumber" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <div>
                    <button id="btn-editPassword" type="button" class="shadow-sm border-gray-300 text-sm rounded-lg border-solid border-2 hover:border-black font-bold focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"> Edit Password</button>
                </div>
            </div>        
        

            <!-- Save Changes Button -->
            <div class="grid justify-items-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save changes</button>
            </div>
        
        </div>

        </form>

        <!-- Other Details -->
        <div class="col-span-12 xl:col-span-12 p-6 bg-white drop-shadow-md">

            <h1 class="font-bold">Other Informations</h1>

            <div class="py-3 mb-3">
                <hr class="border-gray-500"> 
            </div>

            <!-- Location -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-geo-alt-fill text-red-700"></i> Location</label>
                <input id="hospital-location" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
            </div>
            <!-- Representative Name & Designation / Position -->
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <!-- Representative Name -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-person text-navColor"></i> Representative Name</label>
                    <input id="hospital-representative" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                </div>
                <!-- Designation / Position -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-briefcase text-green-400"></i> Designation / Position</label>
                    <input id="hospital-designation" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                </div>
            </div>

            <!-- Supervisor Name -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-person-fill"></i> Supervisor Name</label>
                <input id="hospital-supervisor" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
            </div>
        </div>
    </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content ">

            <div class="modal-title flex flex-row justify-between">
                <h1 class="mt-3">Change Password</h1>
                <span class="close">&times;</span>
            </div>

            <div class="py-3 mb-3">
                <hr class="border-gray-600">     
            </div>

            <div class="modal-body mt-8">
                <!-- Phone Number -->
                <div class="mt-10>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"> <i class="bi bi-telephone text-green-700"></i> Phone Number</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="hospital-phoneNumber" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>


            </div>

        </div>

</div>
</body>
</html>