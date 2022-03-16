<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 Install-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel = "icon" href ="/assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">
    <script src="/clipboard.js-master/dist/clipboard.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    
    <script src="js\test.js" defer></script>
    <!-- <link rel="stylesheet" href="styling/user-dashboard.css"> -->
    <title>User Dashboard - SwiftCare PH</title>
</head>
<body>

    

    <div class="container p-5">
        <?php
            require_once 'includes/dbh-inc.php';

            $query = "SELECT * FROM test;";
            $result = mysqli_query($conn, $query);
            $resultCheck = mysqli_num_rows($result);
            $populate ="";

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $firstname = $row['firstname'];
                    $id = $row['ID'];
                    $populate .= '
                        <div class="card mb-3" data-id="id='.$id.'">
                            <div class="card-header">
                                <button type="button" id="show" class="btn btn-primary text-end" data-role="show" >show
                                <a href="test.php?id='.$id.'">asd</a>
                                </button>
                                <p>'.$row['firstname'].'</p>
                            </div>
                            <div class="card-body">
                                <p>'.$row['lastname'].'</p>
                            </div>
                        </div>
                    ';
                }
            }
            else {
                echo "Error loading data!";
            }

            echo $populate;
        ?>
    </div>
</body>
</html>