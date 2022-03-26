
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
                
                <!-- Filter Type -->
                <div class="space-y-2">
                    <p class="font-bold">Filter by Type:</p>

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
                            <input type="radio" id="all" name="hospitalType" class="hospitalType" value="all">
                            <label for="all">All</label>
                        </div>
                    </div> 
                   
                </div>
                
                <!-- Filter By Island -->
                <div class="space-y-3">
                    <p class="font-bold">Filter by Philippine Island:</p>
                    
                    <div class="ml-2" id="luzonDiv">
                        <p class="font-semibold flex items-center mb-2">
                            Luzon&ensp;
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                        </p>

                        <!-- Region 1 -->
                        <div class="ml-2 pb-3 text-xs text-gray-600 mb-3 border-b-[1px] border-gray-300">
                            <p class="font-medium mb-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;Region I
                            </p>

                            <div class="grid grid-cols-12 gap-y-2">
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Alaminos</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Batac</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Candon</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Laoag</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> San Carlos</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> San Fernando</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Urdaneta</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Vigan</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Dagupan</label>
                                </div>
                            </div>
                        </div>

                        <!-- Region 2 -->
                        <div class="ml-2 pb-3 text-xs text-gray-600 mb-3 border-b-[1px] border-gray-300">
                            <p class="font-medium mb-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;Region II
                            </p>

                            <div class="grid grid-cols-12 gap-y-2">
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Cauayan</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Ilagan</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Santiago</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Tuguegarao</label>
                                </div>
                            </div>
                        </div>

                        <!-- Region 3 -->
                        <div class="ml-2 pb-3 text-xs text-gray-600 mb-3 border-b-[1px] border-gray-300">
                            <p class="font-medium mb-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;Region III
                            </p>

                            <div class="grid grid-cols-12 gap-y-2">
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Balanga</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Malolos</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Meycauayan</label>
                                </div>
                                
                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> San Jose del Monte</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Cabanatuan</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Gapan</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Muñoz</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Palayan</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> San Jose</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Angeles City</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Mabalacat</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> San Fernando</label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Tarlac </label>
                                </div>

                                <div class="col-span-4">
                                    <input type="checkbox" id="makati" name="makati" value="makati">
                                    <label for="vehicle3"> Olongapo </label>
                                </div>

                            </div>
                        </div>
                    </div>  
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