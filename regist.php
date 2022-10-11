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

<body>
    <div class="container">
        <div class="content w-1/2 h-screen bg-[#EEEEEE] flex flex-col gap-10 justify-center items-center" >
            <h5 class="block text-lg text-[#222831] font-bold tracking-wide text-3xl">Create an account</h5>

            <form autocomplete="off" action="" method="post">
                <div class="firstName">
                    <label for="" class="block text-lg text-[#222831] font-bold tracking-wide'">First
                        Name</label>
                    <input type="text" id="firstName" value=""
                        class="w-96 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="lastName">
                    <label for="" class="block text-lg  text-[#222831]  font-bold tracking-wide">Last Name</label>
                    <input type="text" id="lastName" value=""
                        class="w-96 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="email">
                    <label for="" class="block text-lg text-[#222831]  font-bold tracking-wide">Email</label>
                    <input type="text" id="email" value=""
                        class="w-96 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="username">
                    <label for="" class="block text-lg text-[#222831]  font-bold tracking-wide">Username</label>
                    <input type="text" id="username" value=""
                        class="w-96 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div class="password">
                    <label for="" class="block text-lg text-[#222831]  font-bold tracking-wide">Password</label>
                    <input type="password" id="password" value=""
                        class="w-96 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>

                <input type="button" value="regist" id="regist"
                    class="px-5 py-1 mt-4  mb-5 text-white bg-[#425F57] rounded-lg hover:bg-[#749F82]">
                <input type="reset" value="reset"
                    class="px-5 py-1 mt-4  mb-5 text-white bg-[#E26868] rounded-lg hover:bg-[#749F82]">
            </form>

            <a href="login.php" class="block text-lg text-[#222831]  font-bold tracking-wide  ">Have an account already?
                Sign
                In</a>

            <p id="response"></p>
        </div>

    </div>

    <!-- SCRIPT -->
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