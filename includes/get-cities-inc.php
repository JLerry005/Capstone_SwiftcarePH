<?php
    include_once 'dbh-inc.php';
    $output = '';

    $getCities = $conn->query("SELECT * FROM citydata ORDER BY region;") or die($conn->error);
    if (mysqli_num_rows($getCities)==0) {
        $output = '<p>no data found!</p>';
    }
    else {
        while ($row = mysqli_fetch_assoc($getCities)) {
            $output .='
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        '.$row["ID"].'
                    </th>
                    <td class="px-6 py-4">
                        '.$row["city"].'
                    </td>
                    <td class="px-6 py-4">
                        '.$row["region"].'
                    </td>
                    <td class="px-6 py-4">
                        '.$row["island"].'
                    </td>
                </tr>
            ';
        }
    }
    
    echo $output;