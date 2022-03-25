<?php

    include_once 'dbh-inc.php';
    $searchValue = $_GET["searchInputVal"];

    $result = $conn->query("SELECT * FROM hospitallisting WHERE hospital_name LIKE '%".$searchValue."%' OR hospital_city LIKE '%".$searchValue."%' OR hospital_location LIKE '%".$searchValue."%' LIMIT 10") or die($conn->error);

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="hospital-overview?listingID='.$row["listing_id"].'" class="p-3 flex flex-1 hover:bg-gray-200 font-bold uppercase">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            &ensp;'.$row["hospital_name"].'&ensp;<p class="text-sm text-slate-300 font-light">
            <i class="bi bi-geo-alt-fill text-red-500"></i>
            '.$row["hospital_location"].'
            </p>
            </a>';
        }
    }else {
        echo '<p class="p-3 flex flex-1 hover:bg-gray-200 font-bold uppercase text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
        </svg>
        &ensp;Hospital not found..
        </p>';
    }
