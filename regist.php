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
</head>

<body>
    <h2>Register</h2>
    <form autocomplete="off" action="" method="post">
        <div class="firstName">
            <label for="" class="block text-sm font-medium text-slate-900">First Name</label>
            <input type="text" id="firstName" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-1/3 rounded-md sm:text-sm focus:ring-1"> 
        </div>
        <div class="lastName">
            <label for="" class="block text-sm font-medium text-slate-900">Last Name</label>
            <input type="text" id="lastName" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-1/3 rounded-md sm:text-sm focus:ring-1"> 
        </div>
        <div class="email">
            <label for="" class="block text-sm font-medium text-slate-900">Email</label>
            <input type="text" id="email" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-1/3 rounded-md sm:text-sm focus:ring-1">
        </div>
        <div class="username">
            <label for="" class="block text-sm font-medium text-slate-900">Username</label>
            <input type="text" id="username" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-1/3 rounded-md sm:text-sm focus:ring-1">
        </div>
        <div class="password">
            <label for="" class="block text-sm font-medium text-slate-900">Password</label>
            <input type="password" id="password" value="" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-1/3 rounded-md sm:text-sm focus:ring-1">

        </div>

        <input type="button" value="regist" id="regist" class="px-5 py-1 font-bold text-sm bg-cyan-500 text-white rounded-full shadow-sm">
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