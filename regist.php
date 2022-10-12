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

<body class="bg-[#0F1123]">

    <div class="container ">
        <div
            class="content w-[1300px] h-[650px] bg-[#000000] bg-opacity-40 flex flex-col gap-3 justify-center items-start relative top-[50px] left-[70px] pl-24 rounded-2xl shadow-[0_10px_20px_rgba(253,_95,_0,_1)] ">
            <h5 class="block text-lg text-[#FF4C29] font-bold tracking-widest text-3xl">Create an account</h5>

            <form autocomplete="off" action="" method="post" class="mt-8">

                <div class="name flex gap-5">
                    <div class="firstName">
                        <label for="" class="block text-lg text-[#C84B31] font-bold tracking-wide'">First
                            Name</label>
                        <input type="text" id="firstName" value=""
                            class="w-72 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="lastName">
                        <label for="" class="block text-lg  text-[#C84B31]  font-bold tracking-wide">Last Name</label>
                        <input type="text" id="lastName" value=""
                            class="w-72 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                </div>

                <div class="email">
                    <label for="" class="block text-lg text-[#C84B31]  font-bold tracking-wide">Email</label>
                    <input type="text" id="email" value=""
                        class="w-[600px] px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="username">
                    <label for="" class="block text-lg text-[#C84B31]  font-bold tracking-wide">Username</label>
                    <input type="text" id="username" value=""
                        class="w-[600px] px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="password">
                    <label for="" class="block text-lg text-[#C84B31]  font-bold tracking-wide">Password</label>
                    <input type="password" id="password" value=""
                        class="w-[600px] px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>

                <div class="btn flex gap-3">
                    <input type="button" value="submit" id="regist"
                    class="text-white bg-gradient-to-br from-[#FD841F] to-[#CD104D] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-10 h-[35px] text-center mr-2 mb-2 mt-4">
                    <input type="reset" value="reset"
                        class="text-white bg-gradient-to-br from-[#FD841F] to-[#CD104D] hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-10 h-[35px] text-center mr-2 mb-2 mt-4">
                </div>

            </form>

            <p class="block text-mg font-xl tracking-wide text-gray-200 opacity-70">Have an account already?
                <span> <a href="login.php" class="text-[#C84B31]">Sign In</a> </span></p>

            <p id="response"></p>
            <lottie-player src="https://lottie.host/30a59977-5093-4fe2-8994-f70593bc211e/pFTTfXJNCo.json"
                background="transparent" speed="0.7" style="width: 550px; height: 550px;" loop autoplay
                class="absolute left-[700px]"></lottie-player>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#regist").on('click', function () {
                var firstName = $("#firstName").val();
                var lastName = $("#lastName").val();
                var email = $("#email").val();
                var username = $("#username").val();
                var password = $("#password").val();


                if (firstName == "" || lastName == "" || email == "" || username == "" || password ==
                    "")
                    swal({
                        title: "Failed",
                        text: "Please Check Your Inputs!",
                        icon: "warning",
                        button: "try again",
                    });
                else {

                    $.ajax({
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