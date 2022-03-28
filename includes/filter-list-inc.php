<?php

    require_once 'dbh-inc.php';

    // -----------------Check if checkbox is checked-------------------------- //

    // -------------------------------- Luzon ------------------------------- //

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

    // -------------------------------- Luzon ------------------------------- //

    // RegionVI ------------------------------------------------
    if (isset($_POST["victorias"])) {
        $cityArray[] = "hospital_city LIKE '%victorias%'";
    }

    if (isset($_POST["talisay"])) {
        $cityArray[] = "hospital_city LIKE '%talisay%'";
    }

    if (isset($_POST["sipalay"])) {
        $cityArray[] = "hospital_city LIKE '%sipalay%'";
    }

    if (isset($_POST["silay"])) {
        $cityArray[] = "hospital_city LIKE '%silay%'";
    }

    if (isset($_POST["sanCarlos"])) {
        $cityArray[] = "hospital_city LIKE '%san Carlos%'";
    }

    if (isset($_POST["sagay"])) {
        $cityArray[] = "hospital_city LIKE '%sagay%'";
    }

    if (isset($_POST["carlota"])) {
        $cityArray[] = "hospital_city LIKE '%carlota%'";
    }

    if (isset($_POST["kabankalan"])) {
        $cityArray[] = "hospital_city LIKE '%kabankalan%'";
    }

    if (isset($_POST["himamaylan"])) {
        $cityArray[] = "hospital_city LIKE '%himamaylan%'";
    }

    if (isset($_POST["escalante"])) {
        $cityArray[] = "hospital_city LIKE '%escalante%'";
    }

    if (isset($_POST["cadiz"])) {
        $cityArray[] = "hospital_city LIKE '%cadiz%'";
    }

    if (isset($_POST["victorias"])) {
        $cityArray[] = "hospital_city LIKE '%bago%'";
    }

    if (isset($_POST["bacolod"])) {
        $cityArray[] = "hospital_city LIKE '%bacolod%'";
    }

    if (isset($_POST["calapan"])) {
        $cityArray[] = "hospital_city LIKE '%calapan%'";
    }

    if (isset($_POST["iloilo"])) {
        $cityArray[] = "hospital_city LIKE '%iloilo%'";
    }

    if (isset($_POST["roxas"])) {
        $cityArray[] = "hospital_city LIKE '%roxas%'";
    }


    // RegionVII ------------------------------------------------
    if (isset($_POST["toledo"])) {
        $cityArray[] = "hospital_city LIKE '%toledo%'";
    }

    if (isset($_POST["tanjay"])) {
        $cityArray[] = "hospital_city LIKE '%tanjay%'";
    }
    
    if (isset($_POST["guihulngan"])) {
        $cityArray[] = "hospital_city LIKE '%guihulngan%'";
    }
    
    if (isset($_POST["dumaguete"])) {
        $cityArray[] = "hospital_city LIKE '%dumaguete%'";
    }
    
    if (isset($_POST["canlaon"])) {
        $cityArray[] = "hospital_city LIKE '%canlaon%'";
    }
    
    if (isset($_POST["bayawan"])) {
        $cityArray[] = "hospital_city LIKE '%bayawan%'";
    }
    
    if (isset($_POST["bais"])) {
        $cityArray[] = "hospital_city LIKE '%bais%'";
    }
    
    if (isset($_POST["talisay"])) {
        $cityArray[] = "hospital_city LIKE '%talisay%'";
    }
    
    if (isset($_POST["naga"])) {
        $cityArray[] = "hospital_city LIKE '%naga%'";
    }

    if (isset($_POST["mandaue"])) {
        $cityArray[] = "hospital_city LIKE '%mandaue%'";
    }
    
    if (isset($_POST["lapuLapu"])) {
        $cityArray[] = "hospital_city LIKE '%lapu Lapu%'";
    }
    
    if (isset($_POST["danaoati"])) {
        $cityArray[] = "hospital_city LIKE '%danaoati%'";
    }
    
    if (isset($_POST["cebu"])) {
        $cityArray[] = "hospital_city LIKE '%cebu%'";
    }
    
    if (isset($_POST["carcar"])) {
        $cityArray[] = "hospital_city LIKE '%carcar%'";
    }
    
    if (isset($_POST["bogo"])) {
        $cityArray[] = "hospital_city LIKE '%bogo%'";
    }
    
    if (isset($_POST["tagbilaran"])) {
        $cityArray[] = "hospital_city LIKE '%tagbilaran%'";
    }
    
    // RegionVIII ------------------------------------------------
    if (isset($_POST["maasin"])) {
        $cityArray[] = "hospital_city LIKE '%maasin%'";
    }

    if (isset($_POST["catbalogan"])) {
        $cityArray[] = "hospital_city LIKE '%catbalogan%'";
    }

    if (isset($_POST["calbayog"])) {
        $cityArray[] = "hospital_city LIKE '%calbayog%'";
    }

    if (isset($_POST["tacloban"])) {
        $cityArray[] = "hospital_city LIKE '%tacloban%'";
    }

    if (isset($_POST["ormoc"])) {
        $cityArray[] = "hospital_city LIKE '%ormoc%'";
    }

    if (isset($_POST["baybay"])) {
        $cityArray[] = "hospital_city LIKE '%baybay%'";
    }

    if (isset($_POST["borongan"])) {
        $cityArray[] = "hospital_city LIKE '%borongan%'";
    }

    // -------------------------------- Mindanao ------------------------------- //
    
    // Region IX  ------------------------------------------------
    if (isset($_POST["zamboanga"])) {
        $cityArray[] = "hospital_city LIKE '%zamboanga%'";
    }

    if (isset($_POST["pagadian"])) {
        $cityArray[] = "hospital_city LIKE '%pagadian%'";
    }
    
    if (isset($_POST["dipolog"])) {
        $cityArray[] = "hospital_city LIKE '%dipolog%'";
    }
    
    if (isset($_POST["dapitan"])) {
        $cityArray[] = "hospital_city LIKE '%dapitan%'";
    }
    
    if (isset($_POST["isabela"])) {
        $cityArray[] = "hospital_city LIKE '%isabela%'";
    }

    // Region X ------------------------------------------------
    if (isset($_POST["gingoog"])) {
        $cityArray[] = "hospital_city LIKE '%gingoog%'";
    }
    
    if (isset($_POST["salvador"])) {
        $cityArray[] = "hospital_city LIKE '%salvador%'";
    }
    
    if (isset($_POST["cagayandeOro"])) {
        $cityArray[] = "hospital_city LIKE '%cagayandeOro%'";
    }
    
    if (isset($_POST["tangub"])) {
        $cityArray[] = "hospital_city LIKE '%tangub%'";
    }
    
    if (isset($_POST["ozamiz"])) {
        $cityArray[] = "hospital_city LIKE '%ozamiz%'";
    }
    
    if (isset($_POST["oroquieta"])) {
        $cityArray[] = "hospital_city LIKE '%oroquieta%'";
    }
    
    if (isset($_POST["iligan"])) {
        $cityArray[] = "hospital_city LIKE '%iligan%'";
    }
    
    if (isset($_POST["valencia"])) {
        $cityArray[] = "hospital_city LIKE '%valencia%'";
    }
    
    if (isset($_POST["malaybalay"])) {
        $cityArray[] = "hospital_city LIKE '%malaybalay%'";
    }

    // Region XI ------------------------------------------------
    if (isset($_POST["malaybalay"])) {
        $cityArray[] = "hospital_city LIKE '%malaybalay%'";
    }

    if (isset($_POST["samal"])) {
        $cityArray[] = "hospital_city LIKE '%samal%'";
    }

    if (isset($_POST["digos"])) {
        $cityArray[] = "hospital_city LIKE '%digos%'";
    }

    if (isset($_POST["davao"])) {
        $cityArray[] = "hospital_city LIKE '%davao%'";
    }

    if (isset($_POST["tagum"])) {
        $cityArray[] = "hospital_city LIKE '%tagum%'";
    }

    if (isset($_POST["panabo"])) {
        $cityArray[] = "hospital_city LIKE '%panabo%'";
    }

    // Region XII ------------------------------------------------
    if (isset($_POST["kidapawan"])) {
        $cityArray[] = "hospital_city LIKE '%kidapawan%'";
    }

    if (isset($_POST["generalSantos"])) {
        $cityArray[] = "hospital_city LIKE '%general Santos%'";
    }
    
    if (isset($_POST["koronadal"])) {
        $cityArray[] = "hospital_city LIKE '%koronadal%'";
    }
    
    if (isset($_POST["tacurong"])) {
        $cityArray[] = "hospital_city LIKE '%tacurong%'";
    }

    // BARMM -----------------------------------------------------
    if (isset($_POST["marawi"])) {
        $cityArray[] = "hospital_city LIKE '%marawi%'";
    }

    if (isset($_POST["lamitan"])) {
        $cityArray[] = "hospital_city LIKE '%lamitan%'";
    }

    if (isset($_POST["cotabato"])) {
        $cityArray[] = "hospital_city LIKE '%cotabato%'";
    }


    // Region XIII ------------------------------------------------
    if (isset($_POST["tandag"])) {
        $cityArray[] = "hospital_city LIKE '%tandag%'";
    }

    if (isset($_POST["bislig"])) {
        $cityArray[] = "hospital_city LIKE '%bislig%'";
    }

    if (isset($_POST["surigao"])) {
        $cityArray[] = "hospital_city LIKE '%surigao%'";
    }

    if (isset($_POST["bayugan"])) {
        $cityArray[] = "hospital_city LIKE '%bayugan%'";
    }

    if (isset($_POST["cabadbaran"])) {
        $cityArray[] = "hospital_city LIKE '%cabadbaran%'";
    }

    if (isset($_POST["butuan"])) {
        $cityArray[] = "hospital_city LIKE '%butuan%'";
    }

    // Hospital Type------------------------------------------------
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