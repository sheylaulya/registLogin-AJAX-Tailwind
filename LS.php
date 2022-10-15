<?php
session_start();

if(isset($_SESSION['loggedIN'])) {
  header('Location: login.php');
  exit();
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
<style>
  /*
 * Baseline styles
 */
  body {
    background: #0F1123;
    text-align: center;
    padding: 20%;
  }

  h2 {
    color: #ccc;
    margin: 0;
    font: 16px verdana;
    text-transform: uppercase;
    letter-spacing: .1em;
  }

  /*
 * Loading Dots
 * Can we use pseudo elements here instead :after?
 */
  .loading span {
    display: inline-block;
    vertical-align: middle;
    width: .9em;
    height: .15em;
    margin: .19em;
    background: #007DB6;
    border-radius: .6em;
    animation: loading 1s infinite alternate;
  }

  /*
 * Dots Colors
 * Smarter targeting vs nth-of-type?
 */
  .loading span:nth-of-type(2) {
    background: #008FB2;
    animation-delay: 0.2s;
  }

  .loading span:nth-of-type(3) {
    background: #009B9E;
    animation-delay: 0.6s;
  }

  .loading span:nth-of-type(4) {
    background: #00A77D;
    animation-delay: 1.0s;
  }

  .loading span:nth-of-type(5) {
    background: #00B247;
    animation-delay: 1.4s;
  }

  .loading span:nth-of-type(6) {
    background: #5AB027;
    animation-delay: 1.8s;
  }

  .loading span:nth-of-type(7) {
    background: #A0B61E;
    animation-delay: 2.1s;
  }

  /*
 * Animation keyframes
 * Use transition opacity instead of keyframes?
 */
  @keyframes loading {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
</style>
<div class="loading">
  <h2>Loading...</h2>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
<lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_ohuhu3lv.json" background="transparent"
    speed="0.5" style="width: 500px; height: 500px; margin-top:-350px; margin-left:170px;" hover loop autoplay></lottie-player>

  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script>
  $(document).ready(function () {

    // Fakes the loading setting a timeout
    setTimeout(function () {
      $('body').addClass('loaded');
    }, 3500);

  });
</script>
</body>

</html>