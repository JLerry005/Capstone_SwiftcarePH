<?php
    include_once 'dbh-inc.php';
    $output = '';

    $getConcerns = $conn->query("SELECT * FROM patientdata ORDER BY covidVariant;") or die($conn->error);
    if (mysqli_num_rows($getConcerns)==0) {
        $output = '<p>no data found!</p>';
    }
    else {
        while ($row = mysqli_fetch_assoc($getConcerns)) {
            $output .='
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        '.$row["ID"].'
                    </th>
                    <td class="px-6 py-4">
                        '.$row["concernType"].'
                    </td>
                    <td class="px-6 py-4">
                        '.$row["covidVariant"].'
                    </td>
                    <td class="px-6 py-4">
                        '.$row["patientConcern"].'
                    </td>
                </tr>
            ';
        }
    }
    
    echo $output;