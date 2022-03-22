<?php
    session_start();
?>    
    
    <!-- Nav Bar -->
    <nav class="absolute text-white py-5 px-5 lg:px-12 w-full">
        <div class="flex flex-row justify-between items-center  pb-6 border-slate-600">
            <div class="flex flex-row items-center space-x-4">
            <a href="#" class="flex items-center text-center">
                <img src="assets/main-logo-transparent.png" class="mr-3 h-8" alt="Swiftcare PH Logo">
                <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white">Swiftcare PH</span>
                </a>

                <a href="#" class="hidden md:block">More</a>

                <a href="#" class="hover:underline hidden md:block">About</a>
            </div>
            
            <?php
                if (isset($_SESSION["sessionpatientUserID"])) {
                    echo '

                    <div class="hidden md:block">
                        <a href="includes/logout-inc" class="bg-red-600 hover:bg-red-500 hover:drop-shadow-md py-2 px-7 rounded-lg hover:rounded-md hover:scale-105 flex flex-row text-sm transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                      </svg>
                            &nbsp;Logout
                        </a>
                    </div>
                    ';
                }
                else {
                    echo '
                        <div class="hidden md:block">
                            <a href="user-login.php" class="bg-green-600 hover:bg-green-500 hover:drop-shadow-md py-2 px-7 rounded-lg hover:rounded-md hover:scale-105 flex flex-row text-sm transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                &nbsp;Login
                            </a>
                        </div>
                    ';
                }
            ?>

    
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

    