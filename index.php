<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);


if(isset($_POST['send'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $place = $_POST['place'];
    $place = filter_var($place, FILTER_SANITIZE_STRING);
    $date = $_POST['date'];
    $date = filter_var($date, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
}

$select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND place = ? AND date = ? AND email = ?");
   $select_contact->execute([$name,$place,$date,$email]);

if($select_contact->rowCount() > 0){
    $message[] = 'Správa už bola zaslaná';
}else{
$insert_message = $conn->prepare("INSERT INTO `contact_form`(name,place,date,email) VALUES(?,?,?,?)");
      $insert_message->execute([$name, $place, $date, $email]);
      $message[] = 'Správa bola úspešne zaslaná';
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prezentacna stranka</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">    
</head>

<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
      ';
   }
}
?>



<?php
    include 'header.php';
?>

<!-- home section -->

<?php
    include 'home.php';
?>

<!-- booking form -->

<?php
    include 'booking_form.php';
?>

<!-- about section -->

<?php
    include 'about.php';
?>

<!-- destination  -->

<?php
    include 'destination.php';
?>


<!-- services section  -->

<?php
    include 'services.php';
?>

<!-- gallery section  -->

<?php
    include 'gallery.php';
?>

<!-- reviews section -->

<?php
    include 'reviews.php'
?>

<!-- banner section -->

<div class="banner">
    <div class="content">
        <span>začni svoje dobrodružstvo</span>
        <h3>objav svet</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga temporibus pariatur voluptatum eos suscipit itaque sequi dignissimos voluptates! Delectus rem ex quis mollitia nesciunt, magni voluptatum nemo dolorem tempore rerum!</p>
        <a href="#book-form" class="btn">kontaktuj nás</a>
    </div>
</div>


<!-- footer sekcia  -->
<section class="footer">
    
    <div class="box-container">
        <div class="box">
            <a href="#" class="logo"> <i class="fas fa-paper-plane"> </i> Travel </a>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil, vitae.</p>
            <div class="share">
                <a href="#"> <i class="fab fa-facebook-f"></i></a>
                <a href="#"> <i class="fab fa-twitter"></i></a>
                <a href="#"> <i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="box">
            <a href="#home" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>domov</a>
            <a href="#about" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>o nás</a>
            <a href="#destination" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>destinácie</a>
            <a href="#services" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>služby</a>
            <a href="#gallery" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>galéria</a>
            <a href="#blog" class="links" > <i class="fa-solid fa-angle-right" class="links"></i>blog</a>

        </div>

        <div class="box">
            <h3>kontakt</h3>
            <p> <i class="fas fa-phone"></i>+421 904 332 444</p>
            <p> <i class="fas fa-map"></i>nové mesto n/v</p>
            <p> <i class="fas fa-envelope"></i>kontakt@kontakt.sk</p>
        </div>

        <div class="box">
            <h3>novinky</h3>
            <p>prihláste sa na odber najnovšej aktualizácii</p>
            <form action="">
                <input type="email" name="" placeholder="tvoj email" class="email">
                <input type="submit" value="subscribe" class="btn">
            </form>
        </div>


    </div>

</section>    

<div class="credit">vytvorené <span>mojou maličkostou</span></div>


<!-- js cripts -->

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        offset: -50,
        duration: 800,
    });
  </script>

</body>
</html>