<?php
    if(isset($_POST['regist'])){
        $connec = new mysqli('localhost','root','','registlogin');

        $firstName = $connec->real_escape_string ($_POST ['firstNamePHP']);
        $lastName = $connec->real_escape_string ($_POST ['lastNamePHP']);
        $email = $connec->real_escape_string ($_POST ['emailPHP']);
        $username = $connec->real_escape_string ($_POST ['usernamePHP']);
        $password = $connec->real_escape_string ($_POST ['passwordPHP']);

        $data = $connec->query(query: "INSERT INTO `user` VALUES ('NULL','$firstName','$lastName','$email','$username','$password')");
        if  ($data) {
            exit('Login success...');
        }else
            exit('failed, try again...');
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form autocomplete="off" action="" method="post">
        <div class="firstName">
            <label for="">First Name</label>
            <input type="text" id="firstName" value=""> <br>
        </div>
        <div class="lastName">
            <label for="">Last Name</label>
            <input type="text" id="lastName" value=""> <br>
        </div>
        <div class="email">
            <label for="">Email</label>
            <input type="text" id="email" value=""> <br>
        </div>
        <div class="username">
            <label for="">Username</label>
            <input type="text" id="username" value=""> <br>
        </div>
        <div class="password">
            <label for="">Password</label>
            <input type="password" id="password" value=""> <br>

        </div>

        <input type="button" value="regist" id="regist">
    </form>

    <p id="response"></p>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $("#regist").on('click', function(){
                var firstName = $("#firstName").val();
                var lastName = $("#lastName").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var password = $("#password").val();


                if ( firstName == "" || lastName == "" || email == "" || username == "" || password == "")
                alert('Please check your inputs');
                else{
                    
                $.ajax(
                    {
                        url: 'regist.php',
                        method: 'POST',
                        data: {
                            regist: 1,
                            firstNamePHP: firstName,
                            lastNamePHP: lastName,
                            emailPHP: email,
                            usernamePHP: username,
                            passwordPHP: password
                        },
                        success : function (response) {
                            $("#response").html(response);
                        },
                        dataType : 'text '
                    }
                )
                }


            })
        })
    </script>
</body>

</html>