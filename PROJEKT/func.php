<?php
//ühendamine andmebaasiga
function connect_db() {
  global $conn;
  $host = "localhost";
  $user = "test";
  $pass = "t3st3r123";
  $db = "test";
  $conn = mysqli_connect($host, $user, $pass, $db) or die("Ei saanud andmebaasiga ühendust");
  mysqli_query($conn, "SET CHARACTER SET UTF8") or die("Ei saanud andmebaasi utf-8-sse".mysqli_error($conn));
}
//uue kasutaja registreerimine
function register() {
  global $conn;
  if (!empty($_POST)) {
    //sisestuse kontroll
    $errors = array();
    if (empty($_POST['firstname'])) {
      $errors['firstname'] = "Eesnimi sisestamata!";
    }
    if (empty($_POST['lastname'])) {
      $errors['lastname'] = "Perekonnanimi sisestamata!";
    }
    if (empty($_POST['email'])) {
      $errors['email'] = "E-posti aadress sisestamata!";
    }
    if (empty($_POST['username'])) {
      $errors['username'] = "Kasutajanimi sisestamata!";
    }
    if (empty($_POST['password'])) {
      $errors['password'] = "Parool sisestamata!";
    }
    if (empty($_POST['password2'])) {
      $errors['password2'] = "Palun korda parooli!";
    }
    if (!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] != $_POST['password2']) {
      $errors['password_match'] = "Sisestatud paroolid ei ole ühesugused!";
    }
    //kõik ok
    if (empty($errors)) {
      $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
      $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $user = mysqli_real_escape_string($conn, $_POST['username']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);
      $sql = "INSERT INTO KerstiM_LennumaaKasutajad (firstname, lastname, email, username, password) VALUES ('$fname', '$lname', '$email', '$user', SHA1('$pass'))";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $_SESSION['message'] = "Registreerumine õnnestus, logi sisse";
        header("Location: ?");
        exit(0);
      } else {
        $errors['register'] = "Registreerumine ebaõnnestus, proovi uuesti.";
      }
    }
  }
  include_once("head.php");
  include("register.html");
  include_once("foot.php");
}
//sisselogimine
function login() {
  global $conn;
  if (!empty($_POST)) {
    //sisestuse kontroll
    $errors = array();
    if (empty($_POST['username'])) {
      $errors['username'] = "Kasutajanimi sisestamata!";
    }
    if (empty($_POST['password'])) {
      $errors['password'] = "Parool sisestamata!";
    }
    //kõik ok
    if (empty($errors)) {
      $user = mysqli_real_escape_string($conn, $_POST['username']);
      $pass = mysqli_real_escape_string($conn, $_POST['password']);
      $sql = "SELECT id, username, role FROM KerstiM_LennumaaKasutajad WHERE username='$user' AND password=SHA1('$pass')";
      $result = mysqli_query($conn, $sql);
      if ($result && $user = mysqli_fetch_assoc($result)) {
        $_SESSION['user'] = $user; //id saab kätte: $_SESSION['user']['id']
        $_SESSION['message'] = "Oled sisse logitud.";
        header("Location: ?page=booking");
        exit(0);
      } else {
        $errors['login'] = "Sisselogimine ebaõnnestus, proovi uuesti.";
      }
    }
  }
  include_once("head.php");
  include("views/main.php");
  include_once("foot.php");
}

//konto kuvamine
function show_account() {
  global $conn;
  if (empty($_SESSION['user'])) {
    header("Location: ?");
  }
  $user = mysqli_real_escape_string($conn, $_SESSION['user']['id']);
  $sql = "SELECT * FROM KerstiM_LennumaaKasutajad WHERE user_id=$user";
  $result = mysqli_query($conn, $sql);
  $cards = array();
  while ($card = mysqli_fetch_assoc($result)) {
    $cards[] = $card;
  }
  include_once("head.php");
  include_once("foot.php");
}

function kuva_main() {
	include_once("views/main.php");
}

function kuva_events() {
	include_once("views/events.php");
}

function kuva_gallery() {
	include_once("views/gallery.php");
}

function kuva_contact() {
	include_once("views/contact.php");
}

function kuva_booking() {
	include_once("views/booking.php");
}

?>