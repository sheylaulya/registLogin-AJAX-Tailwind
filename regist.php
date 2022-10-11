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
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&display=swap" rel="stylesheet">
</head>

<style>
    * {
        font-family: 'Caveat Brush', cursive;
    }
</style>

<body
    class="bg-[url('https://img.freepik.com/free-vector/cartoon-jungle-background_23-2148962077.jpg?w=1800&t=st=1665457262~exp=1665457862~hmac=486f95b18fa307f36155f03bd4c3801e253eb38dc46ad905359ec1d4acad0ff8')]">
    <div
        class="bg w-[450px] h-[580px] bg-[#42855B] mx-auto mt-[100px] rounded-2xl flex flex-col justify-center items-center">
        <div class="text-title text-center mt-[20px] mb-[20px] text-xl font-bold tracking-widest text-[#FAF7F0]">
            <h5>Create an account</h5>
        </div>

        <form autocomplete="off" action="" method="post">
            <div class="firstName">
                <label for="" class="block text-lg text-[#FAF7F0] font-bold tracking-wide font-'Caveat'">First
                    Name</label>
                <input type="text" id="firstName" value=""
                    class="w-80 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="lastName">
                <label for="" class="block text-lg  text-[#FAF7F0]  font-bold tracking-wide">Last Name</label>
                <input type="text" id="lastName" value=""
                    class="w-80 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="email">
                <label for="" class="block text-lg text-[#FAF7F0]  font-bold tracking-wide">Email</label>
                <input type="text" id="email" value=""
                    class="w-80 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="username">
                <label for="" class="block text-lg text-[#FAF7F0]  font-bold tracking-wide">Username</label>
                <input type="text" id="username" value=""
                    class="w-80 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="password">
                <label for="" class="block text-lg text-[#FAF7F0]  font-bold tracking-wide">Password</label>
                <input type="password" id="password" value=""
                    class="w-80 px-4 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">

            </div>

            <input type="button" value="regist" id="regist"
                class="px-5 py-1 mt-4  mb-5 text-white bg-[#425F57] rounded-lg hover:bg-[#749F82]">
            <input type="reset" value="reset"
            class="px-5 py-1 mt-4  mb-5 text-white bg-[#E26868] rounded-lg hover:bg-[#749F82]">
        </form>

        <a href="login.php" class="tracking-widest font-bold mt-[-10px] text-[#FAF7F0]  ">Have an account already? Sign
            In</a>

        <p id="response"></p>
    </div>
    </div>
    <div class="wrapper">


    </div>

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