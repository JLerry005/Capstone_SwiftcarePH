
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Hospital Dashboard | Swiftcare PH</title>
    <link rel="stylesheet" href="../dist\output.css">
    <script src="js\account-hospital.js" defer></script>
</head>
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

    <div class="p-8 bg-white drop-shadow-md">

        <p class="text-2xl text-gray-900 mb-8">Hospital Informations</p>

        <div class="py-3">
            <hr class="border-gray-300">     
        </div>

        <form class="py-3">
            <!-- Hospital Name -->
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Hospital Name</label>
                <input id="hospital-name" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required disabled>
            </div>
            <!-- Address -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Address</label>
                <input type="text" id="hospital-location" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <!-- Email & Phone Number-->
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Email</label>
                    <input type="text" id="hospital-email" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required disabled>
                </div>
                <!-- Phone Number -->
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Phone Number</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="hospital-phoneNumber" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>
            </div>
            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700">Password</label>
                <input type="password" id="hospital-password" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
            <!-- Save Changes Button -->
            <div class="grid justify-items-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save changes</button>
            </div>

        </form>
    </div>

</body>
</html>