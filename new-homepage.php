<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/output.css">
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    <title>SwiftCare PH </title>
</head>
<body class="font-poppins bg-blue-50">
    <!-- Main Container -->
    <div class="relative flex flex-col">

        <!-- Nav Bar -->
        <nav class="absolute text-white py-5 px-5 lg:px-20 w-full">
            <div class="flex flex-row justify-between items-center  pb-6 border-slate-600">
                <div class="flex flex-row items-center space-x-4">
                <a href="#" class="flex items-center text-center">
                    <img src="assets/main-logo-transparent.png" class="mr-3 h-8" alt="Swiftcare PH Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Swiftcare PH</span>
                    </a>
    
                    <a href="#" class="hidden md:block">More</a>
    
                    <a href="#" class="hover:underline hidden md:block">About</a>
                </div>
                
                <div class="hidden md:block">
                    <button class="bg-blue-600 hover:bg-blue-500 hover:drop-shadow-md py-2 px-10 rounded-full flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </button>
                </div>

                <!-- Hamburger Button -->
                <div class="md:hidden flex flex-row items-center">
                    <button class="hamburger-button id="hamburger-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                          </svg>
                    </button>
                </div>
            </div>

            <!-- Burger Menu -->
            <div class="mobileMenu hidden md:hidden transition ease-out duration-200" id="mobileMenu">
                <a href="" class="block py-2 text-sm hover:bg-gray-500">More</a>
                <a href="" class="block py-2 text-sm hover:bg-gray-500">About</a>
                <button class="block py-2 text-sm hover:bg-gray-500">Login</button>
            </div>
        </nav>

        <!-- hero -->
        <div class="heroContainer flex flex-col justify-between items-center text-white lg:pt-28 lg:pb-20 py-16 px-5 lg:flex-row lg:justify-between lg:px-20 bg-center bg-cover bg-no-repeat" style="background-image: url(assets/headger-bg-ambulance-dark-blurred.png);">
            <div class="leftSection space-y-4 text-center lg:text-left">
                <h1 class="font-bold text-3xl text-orange-400">The Power of Heal</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                    Aperiam illo quod iure suscipit reprehenderit nostrum alias!
                </p>

                <div>
                    <div class="hidden sm:flex flex-row justify-center lg:justify-start space-x-6">
                        <h1 class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Find
                        </h1>
                        <h1 class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                            Fill up
                        </h1>
                        <h1 class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            Reserve
                        </h1>
                    </div>
                </div>
                <!-- <button class="bg-orange-400 text-gray-700 font-bold p-4 rounded uppercase">Sign up now!</button> -->
            </div>

            <div class="hidden rightSection lg:flex flex-row lg:flex-col lg:justify-center space-x-9 space-y-4">
                <div class="transition ease-out hover:-translate-y-1 hover:scale-110 duration-300">
                    <h1 class="mb-2 font-semibold text-lg">Book your first Reservation Now!</h1>
                    <!-- <p>Click the button below to Signup:</p> -->
                    <button class="bg-green-600 py-4 w-full rounded flex flex-row justify-center items-center hover:bg-green-500 transition ease-out hover:-translate-y-1 hover:scale-100 duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>
                        USER SIGNUP
                    </button>
                    
                </div>
                <p>Already have an Account? <a href="#" class="hover:underline hover:text-blue-500">Login</a></p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="mainContent py-5 px-5 lg:px-10 xl:px-20 min-h-screen">
            <!-- Search Bar -->
            <div class="flex flex-row justify-center">
                <input type="search" name="" id="" placeholder="Search for a hospital.." class="p-3 border-b-4 focus:outline-none w-full">
            </div>

            <!-- Filter -->
            <div class="flex flex-row justify-around items-start sm:items-center space-x-3 my-5 text-xs lg:text-base">
                <div class="flex flex-col sm:flex-row sm:items-center justify-center space-y-2 sm:space-y-0 sm:space-x-2">
                    <label for="byLocation">Filter by City: </label>
                    <select name="byLocation" id="byLocation">
                        <option value="">Caloocan</option>
                        <option value="">Malabon</option>
                        <option value="">Navotas</option>
                    </select>
                </div>
                

                <span class="flex flex-col sm:flex-row  items-center space-y-2 sm:space-x-2">
                    <p>Filter by Date: </p>
                    <div class="border-2 rounded">
                        <button class="focus:bg-blue-500 focus:text-white p-3 focus:rounded">Oldest</button>
                        <button class="focus:bg-blue-500 focus:text-white p-3 focus:rounded">Newest</button>
                    </div>
                </span>
            </div>

            <!-- Cards List -->
            <div class="grid grid-cols-12 gap-2 gap-y-5 md:gap-x-5 md:gap-y-10">
                <div class="xl:col-span-3 2xl:col-span-2 lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-6 rounded-lg bg-white drop-shadow-md p-2 lg:p-5 space-y-4 max-h-96 text-sm lg:min-w-fit hover:scale-105 transition-all hover:bg-gray-900">
                    <div class=" min-h-[100px]">
                        <img src="assets/mcu-3.jpg" alt="mcu hospital">
                    </div>

                    <h1 class="font-bold text-center">Sample Title</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, blanditiis. </p>
                </div>

                <div class="xl:col-span-3 2xl:col-span-2 lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-6 rounded-lg bg-white drop-shadow-md p-2 lg:p-5 space-y-4 text-sm lg:min-w-fit hover:scale-105 transition-all hover:bg-gray-900">
                    <div class=" min-h-[100px]">
                        <img src="assets/mcu-2.jpg" alt="mcu hospital">
                    </div>

                    <h1 class="font-bold text-center">Sample Title</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis, blanditiis.</p>
                </div>
            </div>
        </div>

        <!-- Why Swiftcare Serction -->
        <div class="grid grid-cols-12 min-h-screen px-12 bg-gray-900 text-white 2xl:px-32 2xl:gap-24 text-center py-6">
            <!-- Title -->
            <div class="col-span-12 text-2xl font-bold lg:self-end lg:pb-10">
                <p class="font-black">Why SwiftCare PH?</p>
            </div>

            <!-- Time Efficient -->
            <div class="block col-span-12 lg:col-span-4 sm:flex sm:flex-col sm:items-center md:px-16 lg:px-5 lg:text-justify">
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
                    Lorem ipsum dolor sit amet consectetur, 
                    adipisicing elit. Sapiente, ea?Lorem, 
                    ipsum dolor sit amet consectetur 
                    adipisicing elit. Architecto, ipsa?
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
                    Lorem ipsum dolor sit amet consectetur, 
                    adipisicing elit. Sapiente, ea?Lorem, 
                    ipsum dolor sit amet consectetur 
                    adipisicing elit. Architecto, ipsa?
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
                    Lorem ipsum dolor sit amet consectetur, 
                    adipisicing elit. Sapiente, ea?Lorem, 
                    ipsum dolor sit amet consectetur 
                    adipisicing elit. Architecto, ipsa?
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
        <div class="hidden lg:flex lg:justify-between lg:items-center lg:h-screen lg:bg-gray-900 lg:text-gray-200 lg:px-16 2xl:px-32 lg:space-x-12 2xl:space-x-0 2xl:text-xl 2xl:text-center">
            <div class=" lg:flex lg:flex-col grow-0">
                 <!-- Title and Description -->
                <div class="">
                    <p class="text-2xl font-semibold mb-5 2xl:text-3xl">Sign up your Hospital Now!</p>
                    <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> Nemo quis ipsum id minima veniam quibusdam ratione officiis.</p>
                </div>

                <!-- Sign up and login Button -->
                <a href="hospital-signup" class="border-2 border-blue-500 hover:bg-blue-600 p-2 rounded-md mb-5 lg:text-center lg:mt-6" type="button">Signup Access</a>
                <p class="lg:text-center">Already Signed up? Login <a href="hospital-login" class="font-bold">Here!</a></p>
            </div>
            
            <!-- Images -->
            <div class="">
                <img src="assets/HeaderLogo.svg" class="h-64 px-10 xl:h-96"> 
                </img>
            </div>
        </div>
    </div>

    <?php include_once 'includes/footer.php'; ?>
</body>
</html>