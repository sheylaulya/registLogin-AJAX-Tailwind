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
    <title>LOG IN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body
    class="bg-[url('https://orig15.deviantart.net/45c6/f/2017/215/0/9/runcycle__gif__by_weilard-dbip9uq.gif')] bg-cover relative top-20">

    <div class="container opacity-80 ">
        <h1
            class="text-9xl font-black text-gray-200 text-right leading-10 tracking-widest absolute top-[100px] left-[350px] ">
            Run Your </h1> <br>
        <h1 class="text-gray-200 text-8xl absolute top-[170px] left-[400px] font-black">Experiences</h1>


        <form method="post" action="login.php" class="absolute top-[300px] left-[400px]">
            <input type="text" id="username" placeholder="Username..."
                class="w-[600px] px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            <br>
            <input type="password" id="password" placeholder="Password..."
                class="w-[600px] px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 mt-[10px]">
            <br> <br> <br>
            <p class="text-base text-gray-100">do not have an account yet?
                <span><a href="regist.php" class="text-[#1CD6CE]">Sign Up</a></span>
            </p>
    </div>

    <input type="button" value="Log In" id="login"
        class="px-5 py-1 mt-4  mb-5 absolute top-[380px] left-[400px] text-white rounded-lg bg-[#256D85] hover:bg-[#06283D] opacity-100 w-[600px] ">
    <br>

    </form>

    <p id="response"></p>

    <div class="sosmed absolute top-[530px] left-[400px] flex items-center gap-5 mt-[-55px] opacity-90">

        <a href="https://www.facebook.com/"
            class=" bg-[#256D85] hover:bg-[#06283D] px-20 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
            <span>Facebook</span>
        </a>
        <p class="text-white">or</p>
        <a href="https://twitter.com/i/flow/login"
            class="bg-[#256D85] hover:bg-[#06283D] px-24 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
            <svg class="w-5 h-5 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
            <span>Twitter</span>
        </a>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#login").on('click', function () {
                var username = $("#username").val();
                var password = $("#password").val();

                if (username == "" || password == "")
                    swal({
                        title: "Failed",
                        text: "Please Check Your Inputs!",
                        icon: "warning",
                        button: "try again",
                    });
                else {

                    $.ajax({
                        url: 'login.php',
                        method: 'POST',
                        data: {
                            login: 1,
                            usernamePHP: username,
                            passwordPHP: password
                        },
                        success: function (response) {
                            $("#response").html(response);
                        },
                        dataType: 'text '
                    })
                }


            })
        })
    </script>
</body>

</html>