<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}


</style>
</head>
<body>
  <div style="margin-left: 25%;width: 50%;">
    <div class="col-md-12" style="margin-top: 3%;">
      <form class="modal-content" action="user/validate.php" method="POST">
        <div class="panel panel-default">
          <div class="panel-body"><b>Lazashoppee</b></div>
        </div>
        <div class="container-fluid">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" id="uname" autocomplete="off">

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" id="psw" autocomplete="off">
          <div class="col-md-12" style="margin-bottom: 2%;">
            <div class="col-md-6">
              <button type="button" id="login_butt" onclick="validate_user()" name="function" class="btn btn-primary">Login</button>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-info">Register</button>
            </div>
          </div>
        </div>

      </form>
  </div>
</div>

</body>

<script>

    function validate_user(){
        let user = $("#uname").val();
        let pass = $("#psw").val();

        $.ajax(
            {
                url: "user/validate.php",
                type: "POST",
                data:{
                    username: user,
                    password: pass,
                    agenda: "login"
                },
                success:function(response){
                    if(response != "success"){
                      alert(response);
                    }else{
                      location.href = "user/user_home.php";
                    }
                },
                error:function(response){
                    alert(response);
                }

            }
        );  
    }

</script>

</html>
