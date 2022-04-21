<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- TAILWIND CSS Link -->
    <link rel="stylesheet" href="dist/output.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Remix Icon CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- HEADER ICON -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
    <title>Update Option Data</title>
</head>
<body>

    <!-- Main Container -->
    <div class="mx-32 p-16">

        <!-- City Dropdown -->
        <div class="space-y-6" id="">
            <h1 class="font-semibold">Hospital Dashboard - City Dropdown Data</h1>

            <input id="city" name="city" type="text" placeholder="city">
            <!-- <input id="region" name="region" type="text" placeholder="region"> -->
            <!-- <input id="island" name="island" type="text" placeholder="island"> -->
            <select name="region" id="region">
                <!-- Luzon Island -->
                <optgroup label="Luzon">
                    <option value="Ilocos Region">Ilocos Region</option>
                    <option value="Central Luzon">Central Luzon</option>
                    <option value="Bicol Region">Bicol Region</option>
                    <option value="Cordillera Administrative Region">Cordillera Administrative Region</option>
                    <option value="Cagayan Valley">Cagayan Valley</option>
                    <option value="CALABARZON">CALABARZON</option>
                    <option value="Nation Capital Region">Nation Capital Region</option>
                    <option value="MIMAROPA Region">MIMAROPA Region</option>
                </optgroup>
                
                <!-- Visayas Island -->
                <optgroup label="Visayas">
                    <option value="Western Visayas">Western Visayas</option>
                    <option value="Eastern Visayas">Eastern Visayas</option>
                    <option value="Central Visayas">Central Visayas</option>
                </optgroup>
                
                <!-- Mindanao Island -->
                <optgroup label="Mindanao">
                    <option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
                    <option value="Davao Region">Davao Region</option>
                    <option value="Bangsamoro Autonomous Region in Muslim Mindanao">Bangsamoro Autonomous Region in Muslim Mindanao</option>
                    <option value="Northern Mindanao">Northern Mindanao</option>
                    <option value="SOCCSKSARGEN">SOCCSKSARGEN</option>
                    <option value="Caraga">Caraga</option>
                </optgroup>
                
            </select>
            <select name="island" id="island">
                <option value="luzon">Luzon</option>
                <option value="visayas">Visayas</option>
                <option value="mindanao">Mindanao</option>
            </select>

            <button id="btn-save" type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-xl">Save</button>

            <!-- <div>
                <table class="auto">
                    <thead>
                        <tr class="">
                            <th class="px-10 py-3">City ID</th>
                            <th class="px-10 py-3">City Name</th>
                            <th class="px-10 py-3">Region</th>
                            <th class="px-10 py-3">Island</th>
                        </tr>
                    </thead>
                   <tbody>
                        <tr>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                        </tr>

                        <tr>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                            <td>asdasdasd</td>
                        </tr>
                   </tbody>
                    
                </table>
            </div> -->

            <div class="relative overflow-x-auto overflow-y-scroll max-h-[500px] shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                City ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                             City Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Region
                            </th>
                            <th scope="col" class="px-6 py-3">
                               Island
                            </th>
                        </tr>
                    </thead>

                    <tbody class="" id="city-table-body">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Sliver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">
                                White
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4">
                                $1999
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4">
                                Black
                            </td>
                            <td class="px-6 py-4">
                                Accessories
                            </td>
                            <td class="px-6 py-4">
                                $99
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>


        <!-- Concern Patient Dropdown -->
        <div class="space-y-6 mt-12" id="">
            <h1 class="font-bold">Hospital Overview - Patient Concern Dropdown Data</h1>

            <!-- Patient Concern Input -->
            <!-- <input type="text" id="patient-concern" name="patient-concern" placeholder="Patient Concern"> -->

            <div class="flex flex-row items-end space-x-4">
                <!-- Patient Concern Dropdown -->
                <div class="flex flex-col">
                    <label class="font-semibold" for="">Patient Concern</label>
                    <input type="text" name="patient-concern" id="patient-concern" placeholder="Covid Type">

                </div>
                        
                 <!-- Covid Type Dropdown -->
                 <div class="flex flex-col">>
                    <label class="font-semibold" for="">Covid Status</label>
                    <select id="covid-type" name="covid-type" >
                        <option value="Asymptomatic">Asymptomatic</option>
                        <option value="Mild-to-moderate">Mild-to-moderate</option>
                        <option value="Severe">Severe</option>
                        <option value="Critical">Critical</option>
                        <option value="Non - Covid">Non - Covid</option>
                    </select>
                </div>

                <!-- Covid Variant Input -->
                <div class="flex flex-col">
                    <label class="font-semibold" for="">Covid Variant</label>
                    <input type="text" id="covid-variant" name="covid-variant" placeholder="Covid Variant">
                </div>

                <!-- Btn Save of Patient Concern -->
                <button id="btn-save-patient" type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-xl">Save</button>

            </div>




            <div class="relative overflow-x-auto overflow-y-scroll max-h-[500px] shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Concern ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Concern Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Covid Variant
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Covid Type
                            </th>
                        </tr>
                    </thead>
                    <tbody class="" id="patient-concern-table-body">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">
                                Sliver
                            </td>
                            <td class="px-6 py-4">
                                Laptop
                            </td>
                            <td class="px-6 py-4">
                                $2999
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">
                                White
                            </td>
                            <td class="px-6 py-4">
                                Laptop PC
                            </td>
                            <td class="px-6 py-4">
                                $1999
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4">
                                Black
                            </td>
                            <td class="px-6 py-4">
                                Accessories
                            </td>
                            <td class="px-6 py-4">
                                $99
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <!-- Tippy JS -->
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="js\update-options.js" defer></script>
</body>
</html>