<?php
    if(isset($_POST['login'])){
        $connec = new mysqli('localhost','root','','registlogin');

        $username = $connec->real_escape_string ($_POST ['usernamePHP']);
        $password = $connec->real_escape_string ($_POST ['passwordPHP']);

        $data = $connec->query(query: "SELECT id FROM user WHERE username='$username' AND password='$password'");
        if  ($data-> num_rows > 0) {
            exit('Login success...');
        }else
            exit('failed, try again...');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="login.php">
        <input type="text" id="username" placeholder="Username..."> <br>
        <input type="password" id="password" placeholder="Password..."> <br>
        <input type="button" value="Log In" id="login">
    </form>  

    <p id="response"></p>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $("#login").on('click', function(){
                var username = $("#username").val();
                var password = $("#password").val();

                if ( username == "" || password == "")
                alert('Please check your inputs');
                else{
                    
                $.ajax(
                    {
                        url: 'login.php',
                        method: 'POST',
                        data: {
                            login: 1,
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