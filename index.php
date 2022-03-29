<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/output.css">
    
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    <title>SwiftCare PH</title>
</head>
<body class="font-poppins bg-blue-50">
    <!-- Main Container -->
    <div class="relative flex flex-col">

        <!-- Nav Bar -->
        <?php
            include_once 'includes/nav.php';
        ?>

        <!-- hero -->
        <div class="heroContainer md:flex md:flex-col md:justify-between md:items-center text-white text-sm md:text-base md:pt-24 lg:pt-28 lg:pb-20 py-16 px-5 lg:flex-row lg:justify-between lg:px-12 bg-center bg-cover bg-no-repeat" style="background-image: url(assets/headger-bg-ambulance-dark-blurred.png);">
            <div class="leftSection space-y-4 text-center lg:text-left">
                <h1 class="hidden md:block font-bold text-2xl md:text-3xl text-orange-400">The Power of Heal</h1>
                <p class="hidden md:block ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                    Aperiam illo quod iure suscipit reprehenderit nostrum alias!
                </p>

                <div>
                    <div class="hidden sm:hidden md:hidden lg:flex flex-row justify-center lg:justify-start space-x-6">
                        <h1 class="flex flex-row items-center" id="find-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            &nbsp;Find
                        </h1>
                        <h1 class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            &nbsp;Fill up
                        </h1>
                        <h1 class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            &nbsp;Reserve
                        </h1>
                    </div>
                </div>
                <!-- <button class="bg-orange-400 text-gray-700 font-bold p-4 rounded uppercase">Sign up now!</button> -->
            </div>

            <!-- Signup section -->
            <div class="rightSection hidden md:flex flex-col mt-3 lg:mt-0 md:flex-col md:justify-center space-y-4">
                <div class="transition ease-out hover:-translate-y-1 hover:scale-110 duration-300">
                    <h1 class="mb-2 font-semibold md:text-lg text-md ">Book your first Reservation Now!</h1>
                    <!-- <p>Click the button below to Signup:</p> -->
                    <a href="user-signup.php" class="bg-orange-500 py-4 w-full rounded flex flex-row justify-center items-center hover:bg-orange-400 transition ease-out hover:-translate-y-1 hover:scale-100 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                          </svg>
                          &nbsp;Signup
                    </a>
                </div>
                <p class="text-center">Already have an Account? <a href="user-login.php" class="hover:underline hover:text-blue-500">Login</a></p>
            </div>

            <!-- Hero section for small devices -->
            <div class="md:hidden text-left space-y-2">
                <h1 class="font-bold text-xl text-orange-400">The Power of Heal</h1>
                <p>Lorem ipsum dolor, sit amet. Cum in, quas ut exercitationem provident.</p>
                <button class="flex flex-1 items-center p-2 px-4 bg-orange-500 rounded-md text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                      </svg>
                      &ensp;Signup
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="mainContent py-5 px-5 lg:px-12 min-h-screen bg-slate-100 text-gray-700">

            <div class="flex items-center space-x-4 mb-3">
                <!-- Search Bar -->
                <div class="relative flex flex-row justify-center border-b-2 border-gray-300 rounded-full bg-slate-300 px-4 w-full">
                    <button class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <input type="search" name="" id="search-hospital-input" placeholder="Search for a hospital..." class="p-3 focus:outline-none focus:ring-0 bg-slate-300 w-full border-0 text-sm md:text-base">

                    <!-- Search Result Container -->
                    <div class="bg-white w-full absolute top-12 right-0 left-0 drop-shadow-md z-10 rounded-xl" id="search-result-container">
                        <!-- Loading Message -->
                        <div id="results-loader" class="flex justify-center m-4" style="display: none;">
                            <p class="animate-pulse flex items-center text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                                </svg>
                                &ensp;Loading Hospitals..
                            </p>
                        </div>
                        <p>Showing Result for</p>
                    </div>
                </div>

                <!-- Toggle Filter button -->
                <div>
                    <button class="bg-blue-500 p-3 rounded-xl  hover:bg-blue-800 focus:bg-blue-800 hover:rounded-lg transition-all text-white" id="toggle-filter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                          </svg>
                    </button>
                </div>
            </div> 

            <!-- Filter Container -->
            <div class="bg-white p-3 rounded-md drop-shadow-md my-3 text-sm space-y-4" id="filter-content">
                <!-- Apply Vilter | Clear All | Close Button -->
                <div class="flex items-center md:justify-end border-b-[1px] border-gray-300 pb-3 space-x-3 text-xs md:text-sm">
                    <svg id="filter-loader" style="display: none;" role="status" class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <button type="submit" id="apply-filter-button" class="py-1 px-2 md:p-2 bg-gray-900 rounded-lg drop-shadow-md text-white hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            &ensp;Apply Filter
                    </button>
                    
                    <button class="py-1 px-2 md:p-2 bg-gray-500 rounded-lg drop-shadow-md text-white flex items-center hover:underline" id="discard-changes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                          </svg>
                        &ensp;Clear Filters
                    </button>

                    <button class="py-1 px-2 md:p-2 bg-red-600 rounded-lg drop-shadow-md text-white flex items-center hover:underline" id="close-filter-options">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        &ensp;Close
                    </button>
                </div>

                <!-- Filter Type -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>&ensp;
                            <p class="font-bold">Filter by Type:</p>
                        </div>
                        
                        <button class="py-1 px-2 md:p-2 rounded-lg drop-shadow-md flex items-center hover:underline" id="clear-selection">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd" />
                                </svg>
                            &ensp;Clear Selection
                        </button>
                    </div>

                    <!-- Hospital Type radio Button -->
                    <div class="ml-2 flex items-center space-x-3">
                         <!-- Private -->
                        <div>
                            <input type="radio" id="private" name="hospitalType" class="hospitalType" value="private">
                            <label for="private">Private</label>
                        </div>
                        <!-- Public -->
                        <div>
                            <input type="radio" id="public" name="hospitalType" class="hospitalType" value="public">
                            <label for="public">Public</label>
                        </div>
                        <!-- All -->
                        <div>
                            <input type="radio" id="all" name="hospitalType" class="hospitalType" value="all" checked>
                            <label for="all">All</label>
                        </div>
                    </div> 
                </div>
                
                <!-- Filter By Island -->
                <div class=" grid grid-cols-12 gap-x-5">
                    <p class="font-bold col-span-12">Filter by Philippine Island:</p>
                    
                    <!-- Luzon -->
                    <div class="col-span-12 2xl:col-span-12 mt-3" id="luzonDiv">
                        <!-- Luzon Title -->
                        <div class="flex items-start mb-3">
                            <div class="text-sm">
                                <input type="checkbox" onclick="toggle(this)" class="checkbox rounded-md">
                                <!-- <label for="vehicle3">
                                    &nbsp;Select All
                                </label> -->
                            </div>
                            
                            <p class="font-semibold flex items-center mb-2"></p>

                            <button class="flex items-center font-semibold" id="luzon-toggle-button">&ensp;Luzon&ensp;<i class="bi bi-chevron-down luzon-dropdown-icon"></i></button>
                        </div>

                        <div id="luzon-region-checkbox" class="grid grid-cols-12 gap-x-3">
                            <!-- Region 1 -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Ilocos Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionI" name="luzon" value="makati" class=" checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionI">Select All</label>
                                    </div>
                                </div>
                                
                                <!-- Cities -->
                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIAlaminos" name="luzon" class="checkbox regionI" value="makati">
                                        <label for="regionIAlaminos"> Alaminos</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIBatac" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionIBatac"> Batac</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionICandon" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionICandon"> Candon</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionILaoag" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionILaoag"> Laoag</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionISanCarlos" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionISanCarlos"> San Carlos</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionISanFernando" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionISanFernando"> San Fernando</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIUrdaneta" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionIUrdaneta"> Urdaneta</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVigan" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionIVigan"> Vigan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIDagupan" name="luzon" class=" checkbox regionI" value="makati">
                                        <label for="regionIDagupan"> Dagupan</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region 2 -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Cagayan Valley | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionII" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionII">Select All</label>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIICauayan" name="luzon" class="checkbox regionII" value="makati">
                                        <label for="regionIICauayan"> Cauayan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIlagan" name="luzon" class="checkbox regionII" value="makati">
                                        <label for="regionIIIlagan"> Ilagan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIISantiago" name="luzon" class="checkbox regionII" value="makati">
                                        <label for="regionIISantiago"> Santiago</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIITuguegarao" name="luzon" class="checkbox regionII" value="makati">
                                        <label for="regionIITuguegarao"> Tuguegarao</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region 3 -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Central Luzon | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionIII" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionIII">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIBalanga" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIBalanga"> Balanga</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIMalolos" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIMalolos"> Malolos</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIMeycauayan" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIMeycauayan"> Meycauayan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIISanJosedelMonte" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIISanJosedelMonte"> San Jose del Monte</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIICabanatuan" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIICabanatuan"> Cabanatuan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIGapan" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIGapan"> Gapan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIMuñoz" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIMuñoz"> Muñoz</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIPalayan" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIPalayan"> Palayan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIISanJose" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIISanJose"> San Jose</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIAngelesCity" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIAngelesCity"> Angeles City</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIMabalacat" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIMabalacat"> Mabalacat</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIISanFernando" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIISanFernando"> San Fernando</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIITarlac" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIITarlac"> Tarlac </label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIIIOlongapo" name="luzon" class="checkbox regionIII" value="makati">
                                        <label for="regionIIIOlongapo"> Olongapo </label>
                                    </div>

                                </div>
                            </div>

                            <!-- Region IV-A -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;CALABARZON | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionIVA" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionIVA">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVAntipolo" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVAntipolo"> Antipolo</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVBacoor" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVBacoor"> Bacoor</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVBatangas" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVBatangas"> Batangas</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVBiñan" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVBiñan"> Biñan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVCabuyao" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVCabuyao"> Cabuyao</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVCalamba" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVCalamba"> Calamba</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVCavite" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVCavite"> Cavite</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVDasmariñas" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVDasmariñas"> Dasmariñas</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVGeneralTrias" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVGeneralTrias"> General Trias</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVImus" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVImus"> Imus</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVLipa" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVLipa"> Lipa</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVLucena" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVLucena"> Lucena</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVSanPablo" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVSanPablo"> San Pablo</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVSanPedro" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVSanPedro"> San Pedro</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVSantaRosa" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVSantaRosa"> Santa Rosa</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVSantoTomas" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVSantoTomas"> Santo Tomas</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVTagaytay" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVTagaytay"> Tagaytay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVTanauan" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVTanauan"> Tanauan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVTayabas" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVTayabas"> Tayabas</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIVTreceMartires" name="luzon" class="checkbox regionIVA" value="makati">
                                        <label for="regionIVTreceMartires"> Trece Martires</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region V -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Bicol Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionV" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="makati">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVLegazpi" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVLegazpi"> Legazpi</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVNaga" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVNaga"> Naga</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIriga" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVIriga"> Iriga</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVTabaco" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVTabaco"> Tabaco</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVLigao" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVLigao"> Ligao</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVSorsogon" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVSorsogon"> Sorsogon</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVMasbate" name="luzon" class="checkbox regionV" value="makati">
                                        <label for="regionVMasbate"> Masbate</label>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- NCR -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Nation Capital Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionNCR" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionNCR">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRCaloocan" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRCaloocan"> Caloocan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRMarikina" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRMarikina"> Marikina</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRMakati" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRMakati"> Makati</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRMandaluyong" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRMandaluyong"> Mandaluyong</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRMuntinlupa" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRMuntinlupa"> Muntinlupa</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRManila" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRManila"> Manila</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRNavotas" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRNavotas"> Navotas</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRMalabon" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRMalabon"> Malabon</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRValenzuela" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRValenzuela"> Valenzuela</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRPasay" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRPasay"> Pasay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRPasig" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRPasig"> Pasig</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRParañaque" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRParañaque"> Parañaque</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRQuezon" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRQuezon"> Quezon</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRSanJuan" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRSanJuan"> San Juan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRLasPiñas" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRLasPiñas"> Las Piñas</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="NCRTaguig" name="luzon" class="checkbox NCR" value="makati">
                                        <label for="NCRTaguig"> Taguig</label>
                                    </div>
                                </div>
                            </div>

                            <!-- CAR -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">        
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Cordillera Administrative Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionCAR" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionCAR">Select All</label>
                                    </div>
                                </div>
                            
                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="CARBaguio" name="luzon" class="checkbox CAR" value="makati">
                                        <label for="CARBaguio"> Baguio</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="CARTabuk" name="luzon" class="checkbox CAR" value="makati">
                                        <label for="CARTabuk"> Tabuk</label>
                                    </div>
                                </div>
                            </div>

                            <!-- MIMAROPA -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;MIMAROPA Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionMIMAROPA" name="luzon" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionMIMAROPA">Select All</label>
                                    </div>
                                </div>
                                
                                <!-- Cities -->
                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="MIMAROPACalapan" name="luzon" class="checkbox MIMAROPARegion" value="makati">
                                        <label for="MIMAROPACalapan"> Calapan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="MIMAROPAPuertoPrincesa" name="luzon" class="checkbox MIMAROPARegion" value="makati">
                                        <label for="MIMAROPAPuertoPrincesa"> Puerto Princesa</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <!-- Visayas -->
                    <div class="col-span-12 2xl:col-span-12">

                        <!-- Visayas Title -->
                        <div class="flex items-start mb-3">
                            <div class="text-sm">
                                <input type="checkbox" onclick="selectAllVisayas(this)" class="checkbox rounded-md">
                            </div>

                            <p class="font-semibold flex items-center mb-2"></p>

                            <button class="flex items-center font-semibold" id="visayas-toggle-button">&ensp;Visayas&ensp;<i class="bi bi-chevron-up visayas-dropdown-icon"></i></button>
                        </div>
                        
                        <div id="visayas-region-checkbox" class="grid grid-cols-12 gap-x-3">

                            <!-- REGION VI -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Central Visayas -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Western Visayas | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionVI" name="visayas" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionVI">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIRoxas" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIRoxas"> Roxas</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIloilo" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIIloilo"> Iloilo</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIPassi" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIPassi"> Passi</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIBacolod" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIBacolod"> Bacolod</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIBago" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIBago"> Bago</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVICadiz" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVICadiz"> Cadiz</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIEscalante" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIEscalante"> Escalante</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIHimamaylan" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIHimamaylan"> Himamaylan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIKabankalan" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIKabankalan"> Kabankalan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVILaCarlota" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVILaCarlota"> La Carlota</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVISagay" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVISagay"> Sagay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVISanCarlos" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVISanCarlos"> San Carlos</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVISilay" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVISilay"> Silay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVISipalay" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVISipalay"> Sipalay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVITalisay" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVITalisay"> Talisay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIVictorias" name="visayas" class="checkbox regionVI" value="makati">
                                        <label for="regionVIVictorias"> Victorias</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region VII -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Central Visayas -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Eastern Visayas | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionVII" name="visayas" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="makati">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIITagbilaran" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIITagbilaran"> Tagbilaran</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIBogo" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIBogo"> Bogo</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIICarcar" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIICarcar"> Carcar</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIICebu" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIICebu"> Cebu</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIDanaoati" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIImakDanaoati"> Danao</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIILapuLapu" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIILapuLapu"> Lapu-Lapu</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIMandaue" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIMandaue"> Mandaue</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIINaga" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIINaga"> Naga</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIITalisay" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIITalisay"> Talisay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIBais" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIBais"> Bais</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIBayawan" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIBayawan"> Bayawan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIICanlaon" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIICanlaon"> Canlaon</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIDumaguete" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIDumaguete"> Dumaguete</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIGuihulngan" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIGuihulngan"> Guihulngan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIITanjay" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIITanjay"> Tanjay</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIToledo" name="visayas" class="checkbox regionVII" value="makati">
                                        <label for="regionVIIToledo"> Toledo</label>
                                    </div>
                                </div>
                            </div>

                            <!-- REGION VIII -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Eastern Visayas -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Eastern Visayas | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionVIII" name="visayas" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionVIII">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIIBorongan" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVIBorongan"> Borongan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIIBaybay" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVIBaybay"> Baybay</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIIOrmoc" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVIOrmoc"> Ormoc</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIITacloban" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVITacloban"> Tacloban</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIICalbayog" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVICalbayog"> Calbayog</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIICatbalogan" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVICatbalogan"> Catbalogan</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionVIIIMaasin" name="visayas" class="checkbox regionVIII" value="makati">
                                        <label for="regionVIMaasin"> Maasin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mindanao -->
                    <div class="col-span-12 2xl:col-span-12" id="luzonDiv">
                        <!-- Mindanao Title -->
                        <div class="flex items-start mb-3">
                            <div class="text-sm">
                                <input type="checkbox" onclick="selectAllMindanao(this)" class="checkbox rounded-md">
                            </div>
                            
                            <p class="font-semibold flex items-center mb-2"></p>

                            <button class="flex items-center font-semibold" id="mindanao-toggle-button">&ensp;Mindanao&ensp;<i class="bi bi-chevron-down mindanao-dropdown-icon"></i></button>
                        </div>

                        <div id="mindanao-region-checkbox" class="grid grid-cols-12 gap-x-3">

                            <!-- Region IX -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Northern Mindanao -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Zamboanga Peninsula | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionIX" name="mindanao" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionIX">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIXIsabela" name="mindanao" class="checkbox regionIX" value="makati">
                                        <label for="regionIXIsabela"> Isabela</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIXDapitan" name="mindanao" class="checkbox regionIX" value="makati">
                                        <label for="regionIXDapitan"> Dapitan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIXDipolog" name="mindanao" class="checkbox regionIX" value="makati">
                                        <label for="regionIXDipolog"> Dipolog</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIXPagadian" name="mindanao" class="checkbox regionIX" value="makati">
                                        <label for="regionIXPagadian"> Pagadian</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionIXZamboanga" name="mindanao" class="checkbox regionIX" value="makati">
                                        <label for="vehicle3"> Zamboanga</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region X -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Northern Mindanao -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Northern Mindanao | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionX" name="mindanao" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionX">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXMalaybalay" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXMalaybalay"> Malaybalay</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXValencia" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXValencia"> Valencia</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIligan" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXIligan"> Iligan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXOroquieta" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXOroquieta"> Oroquieta</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXOzamiz" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXOzamiz"> Ozamiz</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXTangub" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXTangub"> Tangub</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXCagayandeOro" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXCagayandeOro"> Cagayan de Oro</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXElSalvador" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXElSalvador"> El Salvador</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXGingoog" name="mindanao" class="checkbox regionX" value="makati">
                                        <label for="regionXGingoog"> Gingoog</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region XI -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- Davao Region -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Davao Region | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionXI" name="mindanao" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionXI">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIPanabo" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXIPanabo"> Panabo</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXISamal" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXISamal"> Samal</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXITagum" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXITagum"> Tagum</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIDavao" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXIDavao"> Davao</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIDigos" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXIDigos"> Digos</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIMati" name="mindanao" class="checkbox regionXI" value="makati">
                                        <label for="regionXIMati"> Mati</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region XII -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <!-- SOCCSKSARGEN Region -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;SOCCSKSARGEN | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllSOCCSKSARGEN" name="mindanao" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllSOCCSKSARGEN">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIKidapawan" name="mindanao"  class="checkbox SOCCSKSARGENRegion" value="makati">
                                        <label for="regionXIIKidapawan"> Kidapawan</label>
                                    </div>
                                                                
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIGeneralSantos" name="mindanao" class="checkbox SOCCSKSARGENRegion" value="makati">
                                        <label for="regionXIIGeneralSantos"> General Santos</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIKoronadal" name="mindanao" class="checkbox SOCCSKSARGENRegion" value="makati">
                                        <label for="regionXIIKoronadal"> Koronadal</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIITacurong" name="mindanao" class="checkbox SOCCSKSARGENRegion" value="makati">
                                        <label for="regionXIITacurong"> Tacurong</label>
                                    </div>
                                </div>
                            </div>

                            <!-- BARMM -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">

                            <!-- Bangsamoro Autonomous Region -->
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Bangsamoro Autonomous Region in Muslim Mindanao | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllBARMMRegion" name="mindanao" value="makati" class="checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllBARMMRegion">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="BARMMCotabato" name="mindanao" class="checkbox BARMMRegion" value="makati">
                                        <label for="BARMMCotabato"> Cotabato</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="BARMMLamitan" name="mindanao" class="checkbox BARMMRegion" value="makati">
                                        <label for="BARMMLamitan"> Lamitan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="BARMMMarawi" name="mindanao" class="checkbox BARMMRegion" value="makati">
                                        <label for="BARMMMarawi"> Marawi</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Region XIII -->
                            <div class="col-span-12 xl:col-span-6 ml-2 pb-3 text-xs text-gray-600 bg-gray-100 p-2 rounded-md mb-3 border-b-[1px] border-gray-300">
                                <div class="flex items-start space-x-2">
                                    <p class="font-medium mb-1 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Caraga | Cities
                                    </p>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="checkAllRegionXIII" name="mindanao" value="makati" class=" checkbox rounded-md text-green-500 focus:ring-0">
                                        <label for="checkAllRegionXIII">Select All</label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-y-2">
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIIButuan" name="mindanao" class=" checkbox regionXIII" value="makati">
                                        <label for="regionXIIIButuan"> Butuan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIICabadbaran" name="mindanao" class=" checkbox regionXIII" value="makati">
                                        <label for="regionXIIICabadbaran"> Cabadbaran</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIIBayugan" name="mindanao" class=" checkbox regionXIII" value="makati">
                                        <label for="regionXIIIBayugan"> Bayugan</label>
                                    </div>
                                    
                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIISurigao" name="mindanao" class=" checkbox regionXIII" value="makati">
                                        <label for="regionXIIISurigao"> Surigao</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIIBislig" name="mindanao" class=" checkbox regionXIII" value="makati">
                                        <label for="regionXIIIBislig"> Bislig</label>
                                    </div>

                                    <div class="col-span-4">
                                        <input type="checkbox" id="regionXIIITandag" name="mindanao"  class="checkbox regionXIII" value="makati">
                                        <label for="regionXIIITandag"> Tandag</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- <div class="col-span-12 flex justify-end">
                        <button class="py-1 px-2 md:p-2 bg-gray-900 rounded-lg drop-shadow-md text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                              </svg>
                              &ensp;Apply Filter
                        </button>
                    </div> -->
                </div>
            </div>
            
            <div id="skeleton-loader" class="flex justify-center" style="display: none;">
                <p class="animate-pulse flex items-center text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" />
                      </svg>
                    &ensp;Loading Hospitals..
                </p>
            </div>
            <!-- Cards List -->
            <div class="grid grid-cols-12 gap-2 gap-y-5 md:gap-x-5 md:gap-y-10" id="listing-cards-container">

                
                
                <!-- Card 1 -->
                <!-- <div class="border-[1px] border-gray-300 xl:col-span-3 2xl:col-span-2 lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-6 rounded-md bg-white drop-shadow-md p-2 lg:p-5 md:min-h-[20rem] text-sm hover:scale-105 transition-all cursor-pointer" id="listing-card">
                    <div class="mb-2 bg-red-300 h-28 md:h-36 bg-clip-border bg-center bg-cover bg-no-repeat rounded-md" style="background-image: url(assets/mcu-3.jpg);">
                    </div>
                    <div class="flex flex-row justify-between md:items-center">
                        <h1 class="font-bold flex flex-row items-center hover:underline text-sm text-ellipsis line-clamp-1">
                            MCU General Hospital Hospital Hospital Hospital
                        </h1>

                        <button class="text-green-400"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                              </svg>
                        </button>
                    </div>
                    
                    <div class="hidden md:block text-xs">
                        <p class="flex flex-row items-center cursor-text">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                              </svg>
                              &nbsp;(02) 8288 7077
                        </p>
                    </div>

                    <div class="flex flex-row cursor-text mb-5 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <p class="line-clamp-2 text-ellipsis">
                              &nbsp;MCU Hospital, EDSA, Caloocan City, Metro Manila
                        </p>
                    </div>

                    <div class="flex flex-row justify-between items-center mb-2 text-xs">
                        <h1 class="flex flex-row items-center hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                              </svg>
                              &nbsp;10 Slots
                        </h1>

                        <p class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                              </svg>
                              &nbsp;Private
                        </p>
                    </div>
                    
                    <div class="flex flex-col space-y-2">
                        <button class=" flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                              </svg>
                              &nbsp;Book Now
                        </button>

                        <button class="flex flex-row justify-center bg-gray-900 text-white p-1 md:p-2 rounded-lg hover:bg-gray-800 transition-all hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                              </svg>
                              &nbsp;Full Details
                        </button>
                    </div>
                </div> -->

                
            </div>
        </div>

        <!-- Why Swiftcare Serction -->
        <div class="grid grid-cols-12 px-12 bg-gray-900 text-white 2xl:px-32 2xl:gap-24 text-center py-28">
            <!-- Title -->
            <div class="col-span-12 text-2xl font-bold lg:self-end lg:pb-10">
                <p class="font-black">Why SwiftCare PH?</p>
            </div>

            <!-- Time Efficient -->
            <div class="block col-span-12 lg:col-span-4 sm:flex sm:flex-col sm:items-center md:px-16 lg:px-5 lg:text-justify lg:self-start">
                <!-- Image -->
                <div class="">
                    <img src="assets/health-login-icon.svg" alt="">
                </div>

                <!-- Title -->
                <div class="text-2xl mb-2 font-semibold">
                    <p>Time Efficient</p>
                </div>    
                           
                <!-- Description -->
                <div class="">
                    Waste no time on going from one hospital to another
                    only to find out that there are no rooms left that are available.
                </div>
            </div>

            <!-- Convenient -->
            <div class="block col-span-12 lg:col-span-4 sm:flex sm:flex-col sm:items-center md:px-16 lg:px-5 lg:text-justify">
                <!-- Image -->
                <div class="">
                    <img src="assets/health-login-icon.svg" alt="">
                </div>

                <!-- Title -->
                <div class="text-2xl mb-2 font-semibold">
                    <p>Convenient</p>
                </div>    

                <!-- Description -->
                <div class="">
                    Easyly and conveniently look for a
                    nearby hospital with available rooms
                    from the comfort of your home.
                </div>
            </div>
            
            <!-- Rapid Care -->
            <div class="block col-span-12 lg:col-span-4 sm:flex sm:flex-col sm:items-center md:px-16 lg:px-5 lg:text-justify">
                <!-- Image -->
                <div class="">
                    <img src="assets/health-login-icon.svg" alt="">
                </div>

                <!-- Title -->
                <div class="text-2xl mb-2 font-semibold">
                    <p>Rapid Care</p>
                </div>  
                 
                <!-- Description -->
                <div class="">
                    Help yourself or your loved ones
                    find the right care that they need
                    without wasting too much time.
                </div>
            </div>
        </div>

        <!-- Parallax Effects Section -->
        <div class="bg-fixed py-32 bg-center bg-cover bg-no-repeat 2xl:py-72" style="background-image: url(assets/nips.jpg);"> 
            <div class="text-center text-3xl backdrop-invert bg-black/30 backdrop-opacity-10 text-white p-8">
                <p>THE POWER OF HEAL</p>
            </div>
        </div>

        <!-- Hospital Signup Section -->
        <div class="min-h-screen grid grid-cols-12 bg-gray-900 text-gray-200 text-center pt-24 lg:grid-rows-12 lg:hidden">

            <!-- Title and Description -->
            <div class="block col-span-12 md:px-24 lg:col-span-6">
                <p class="text-2xl font-semibold mb-5">Sign up your Hospital Now!</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo quis ipsum id minima veniam quibusdam ratione officiis.</p>
            </div>

            <!-- Images -->
            <div class="block col-span-12 sm:flex sm:flex-col sm:items-center lg:row-span-6">
                <img src="assets/HeaderLogo.svg" class="h-64 px-10"> 
                </img>
            </div>
            
            <!-- Sign up and login Button -->
            <div class="flex flex-col col-span-12 lg:row-span-6 lg:col-span-6">
                <a href="hospital-signup" class="border-2 border-blue-500 hover:bg-blue-600 p-2 mx-24 rounded-md mb-5 md:mx-56" type="button">Signup Access</a>
                <label class="">Already Signed up? Login <a href="hospital-login" class="font-bold">Here!</a></label>
            </div>
        </div>

        <!-- Large to XL Media Query Hospital Signup Section -->
        <div class="hidden lg:flex lg:justify-between lg:items-center lg:bg-gray-900 lg:text-gray-200 lg:py-40 lg:px-16 2xl:px-32 lg:space-x-12 2xl:space-x-0 2xl:text-lg 2xl:text-center">
            <div class=" lg:flex lg:flex-col 2xl:px-28 lg:px-3 w-1/2">
                 <!-- Title and Description -->

                    <p class="text-2xl text-center font-semibold mb-5 2xl:text-3xl text-orange-400">Sign up your Hospital Now!</p>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo quis ipsum id minima veniam quibusdam ratione officiis.</p>


                <!-- Sign up and login Button -->
                <a href="hospital-signup" class="flex flex-row justify-center items-center border-2 border-blue-500 hover:bg-blue-600 p-2 rounded-md mb-5 lg:text-center lg:mt-6" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                      </svg>
                    Signup Access
                </a>
                <p class="lg:text-center">Already Signed up? Login <a href="hospital-login" class="font-bold hover:text-orange-400">Here!</a></p>
            </div>
            
            <!-- Images -->
            <div class="">
                <img src="assets/HeaderLogo.svg" class="h-64 px-10 xl:h-96"> 
                </img>
            </div>
        </div>
    </div>

    <?php include_once 'includes/footer.php'; ?>


    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script src="js\index.js" defer></script>
</body>
</html>