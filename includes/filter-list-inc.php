<?php

    require_once 'dbh-inc.php';

    // -----------------Check if checkbox is checked-------------------------- //

    // REGION I--------------------------------------------------
    if (isset($_POST["alaminos"])) {
        $cityArray[] = "hospital_city LIKE '%alaminos%'";
    }
    if (isset($_POST["batac"])) {
        $cityArray[] = "hospital_city LIKE '%batac%'";
    }
    if (isset($_POST["candon"])) {
        $cityArray[] = "hospital_city LIKE '%candon%'";
    }
    if (isset($_POST["laoag"])) {
        $cityArray[] = "hospital_city LIKE '%laoag%'";
    }
    if (isset($_POST["paranaque"])) {
        $cityArray[] = "hospital_city LIKE '%san Carlos%'";
    }
    if (isset($_POST["san fernando"])) {
        $cityArray[] = "hospital_city LIKE '%san fernando%'";
    }
    if (isset($_POST["urdaneta"])) {
        $cityArray[] = "hospital_city LIKE '%urdaneta%'";
    }
    if (isset($_POST["vigan"])) {
        $cityArray[] = "hospital_city LIKE '%vigan%'";
    }
    if (isset($_POST["dagupan"])) {
        $cityArray[] = "hospital_city LIKE '%dagupan%'";
    }

    // Reion II----------------------------------------------------
    if (isset($_POST["cauayan"])) {
        $cityArray[] = "hospital_city LIKE '%cauayan%'";
    }
    if (isset($_POST["ilagan"])) {
        $cityArray[] = "hospital_city LIKE '%ilagan%'";
    }
    if (isset($_POST["santiago"])) {
        $cityArray[] = "hospital_city LIKE '%santiago%'";
    }
    if (isset($_POST["tuguegarao"])) {
        $cityArray[] = "hospital_city LIKE '%tuguegarao%'";
    }

    // Region III-------------------------------------------------------
    if (isset($_POST["balanga"])) {
        $cityArray[] = "hospital_city LIKE '%balanga%'";
    }
    if (isset($_POST["malolos"])) {
        $cityArray[] = "hospital_city LIKE '%malolos%'";
    }
    if (isset($_POST["meycauayan"])) {
        $cityArray[] = "hospital_city LIKE '%meycauayan%'";
    }
    if (isset($_POST["sanJosedelMonte"])) {
        $cityArray[] = "hospital_city LIKE '%san jose del monte%'";
    }
    if (isset($_POST["cabanatuan"])) {
        $cityArray[] = "hospital_city LIKE '%cabanatuan%'";
    }
    if (isset($_POST["gapan"])) {
        $cityArray[] = "hospital_city LIKE '%gapan%'";
    }
    if (isset($_POST["muñoz"])) {
        $cityArray[] = "hospital_city LIKE '%muñoz%'";
    }
    if (isset($_POST["palayan"])) {
        $cityArray[] = "hospital_city LIKE '%palayan%'";
    }
    if (isset($_POST["sanJose"])) {
        $cityArray[] = "hospital_city LIKE '%san jose%'";
    }
    if (isset($_POST["AngelesCity"])) {
        $cityArray[] = "hospital_city LIKE '%angeles%'";
    }
    if (isset($_POST["mabalacat"])) {
        $cityArray[] = "hospital_city LIKE '%mabalacat%'";
    }
    if (isset($_POST["sanFernando"])) {
        $cityArray[] = "hospital_city LIKE '%san fernando%'";
    }
    if (isset($_POST["tarlac"])) {
        $cityArray[] = "hospital_city LIKE '%tarlac%'";
    }
    if (isset($_POST["olongapo"])) {
        $cityArray[] = "hospital_city LIKE '%olongapo%'";
    }

    // region IVA ------------------------------------------------
    if (isset($_POST["antipolo"])) {
        $cityArray[] = "hospital_city LIKE '%antipolo%'";
    }
    if (isset($_POST["bacoor"])) {
        $cityArray[] = "hospital_city LIKE '%bacoor%'";
    }
    if (isset($_POST["batangas"])) {
        $cityArray[] = "hospital_city LIKE '%batangas%'";
    }
    if (isset($_POST["biñan"])) {
        $cityArray[] = "hospital_city LIKE '%biñan%'";
    }
    if (isset($_POST["cabuyao"])) {
        $cityArray[] = "hospital_city LIKE '%cabuyao%'";
    }
    if (isset($_POST["calamba"])) {
        $cityArray[] = "hospital_city LIKE '%calamba%'";
    }
    if (isset($_POST["cavite"])) {
        $cityArray[] = "hospital_city LIKE '%cavite%'";
    }
    if (isset($_POST["dasmariñas"])) {
        $cityArray[] = "hospital_city LIKE '%dasmariñas%'";
    }
    if (isset($_POST["generalTrias"])) {
        $cityArray[] = "hospital_city LIKE '%general trias%'";
    }
    if (isset($_POST["imus"])) {
        $cityArray[] = "hospital_city LIKE '%imus%'";
    }
    if (isset($_POST["lipa"])) {
        $cityArray[] = "hospital_city LIKE '%lipa%'";
    }
    if (isset($_POST["lucena"])) {
        $cityArray[] = "hospital_city LIKE '%lucena%'";
    }
    if (isset($_POST["sanPablo"])) {
        $cityArray[] = "hospital_city LIKE '%san pablo%'";
    }
    if (isset($_POST["sanPedro"])) {
        $cityArray[] = "hospital_city LIKE '%san pedro%'";
    }
    if (isset($_POST["santaRosa"])) {
        $cityArray[] = "hospital_city LIKE '%santa rosa%'";
    }
    if (isset($_POST["santoTomas"])) {
        $cityArray[] = "hospital_city LIKE '%santo tomas%'";
    }
    if (isset($_POST["tagaytay"])) {
        $cityArray[] = "hospital_city LIKE '%tagaytay%'";
    }
    if (isset($_POST["tanauan"])) {
        $cityArray[] = "hospital_city LIKE '%tanauan%'";
    }
    if (isset($_POST["tayabas"])) {
        $cityArray[] = "hospital_city LIKE '%tayabas%'";
    }
    if (isset($_POST["treceMartires"])) {
        $cityArray[] = "hospital_city LIKE '%trece martires%'";
    }

    // region V ------------------------------------------------
    if (isset($_POST["legazpi"])) {
        $cityArray[] = "hospital_city LIKE '%legazpi%'";
    }
    if (isset($_POST["naga"])) {
        $cityArray[] = "hospital_city LIKE '%naga%'";
    }
    if (isset($_POST["iriga"])) {
        $cityArray[] = "hospital_city LIKE '%iriga%'";
    }
    if (isset($_POST["tabaco"])) {
        $cityArray[] = "hospital_city LIKE '%tabaco%'";
    }
    if (isset($_POST["ligao"])) {
        $cityArray[] = "hospital_city LIKE '%ligao%'";
    }
    if (isset($_POST["sorsogon"])) {
        $cityArray[] = "hospital_city LIKE '%sorsogon%'";
    }
    if (isset($_POST["masbate"])) {
        $cityArray[] = "hospital_city LIKE '%masbate%'";
    }

    // NCR ------------------------------------------------
    if (isset($_POST["caloocan"])) {
        $cityArray[] = "hospital_city LIKE '%caloocan%'";
    }
    if (isset($_POST["marikina"])) {
        $cityArray[] = "hospital_city LIKE '%marikina%'";
    }
    if (isset($_POST["makati"])) {
        $cityArray[] = "hospital_city LIKE '%makati%'";
    }
    if (isset($_POST["mandaluyong"])) {
        $cityArray[] = "hospital_city LIKE '%mandaluyong%'";
    }
    if (isset($_POST["muntinlupa"])) {
        $cityArray[] = "hospital_city LIKE '%muntinlupa%'";
    }
    if (isset($_POST["manila"])) {
        $cityArray[] = "hospital_city LIKE '%manila%'";
    }
    if (isset($_POST["navotas"])) {
        $cityArray[] = "hospital_city LIKE '%navotas%'";
    }
    if (isset($_POST["malabon"])) {
        $cityArray[] = "hospital_city LIKE '%malabon%'";
    }
    if (isset($_POST["valenzuela"])) {
        $cityArray[] = "hospital_city LIKE '%valenzuela%'";
    }
    if (isset($_POST["pasay"])) {
        $cityArray[] = "hospital_city LIKE '%pasay%'";
    }
    if (isset($_POST["pasig"])) {
        $cityArray[] = "hospital_city LIKE '%pasig%'";
    }
    if (isset($_POST["parañaque"])) {
        $cityArray[] = "hospital_city LIKE '%parañaque%'";
    }
    if (isset($_POST["quezon"])) {
        $cityArray[] = "hospital_city LIKE '%quezon%'";
    }
    if (isset($_POST["sanJuan"])) {
        $cityArray[] = "hospital_city LIKE '%san juan%'";
    }
    if (isset($_POST["lasPiñas"])) {
        $cityArray[] = "hospital_city LIKE '%las piñas%'";
    }
    if (isset($_POST["taguig"])) {
        $cityArray[] = "hospital_city LIKE '%taguig%'";
    }

    // CAR ------------------------------------------------
    if (isset($_POST["tabuk"])) {
        $cityArray[] = "hospital_city LIKE '%tabuk%'";
    }
    if (isset($_POST["baguio"])) {
        $cityArray[] = "hospital_city LIKE '%baguio%'";
    }

    // MIMAROPA ------------------------------------------------
     if (isset($_POST["puertoPrincesa"])) {
        $cityArray[] = "hospital_city LIKE '%puerto princesa%'";
    }
    if (isset($_POST["calapan"])) {
        $cityArray[] = "hospital_city LIKE '%calapan%'";
    }


    $hospitalTypeValue = $_POST["hospitalType"];
    
    $data = array();
    if(!empty($cityArray)) {
        $str = implode(' OR ', $cityArray);

        // Run if Radio button value is = private
        if ($hospitalTypeValue == "private") {
            $result = $conn->query("SELECT * FROM (SELECT * FROM hospitallisting WHERE " . $str . ") hospitallisting WHERE hospital_type = 'Private Hospital';") or die($conn->error);
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        // Run if Radio button value is = public
        elseif ($hospitalTypeValue == "public") {
            $result = $conn->query("SELECT * FROM (SELECT * FROM hospitallisting WHERE " . $str . ") hospitallisting WHERE hospital_type = 'Public Hospital';") or die($conn->error);
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }

        // Run if Radio button value is = all
        elseif ($hospitalTypeValue == "all") {
            $result = $conn->query("SELECT * FROM hospitallisting WHERE " . $str . ";") or die($conn->error);
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
    }

    echo json_encode($data);