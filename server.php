<?php

session_start();

// initializing variables
$username = "";
$email = "";
$total_vaccinated = "";
$fully_vaccinated = "";
$doses_administered = "";
$errors = array();

// connect to the database localhost
$db = mysqli_connect('localhost', 'root', '', 'covid_schema');

//$db = mysqli_connect('localhost', 'id26080_pateras95', 'Kostas1996', 'id26080_registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Το username απαιτείται.");
    }
    if (empty($email)) {
        array_push($errors, "Το email απαιτείται.");
    }
    if (empty($password_1)) {
        array_push($errors, "O κωδικός απαιτείται.");
    }
    if (strlen($password_1) < 6 || strlen($password_1) > 8) {
        array_push($errors, "Ο κωδικός πρέπει να είναι μεγαλύτερος απο 6 και μικρότερος απο 8 χαρακτήρες.");
    }
    if (preg_match_all('/[A-Z]/', $password_1)<2) {
        array_push($errors, "Ο κωδικός πρέπει να περιέχει τουλάχιστον 2 κεφαλαία γράμματα.");
    }
    if (preg_match_all('/[0-9]/', $password_1)<2) {
        array_push($errors, "Ο κωδικός πρέπει να περιέχει τουλάχιστον 2 αριθμόυς.");
    }
    if (preg_match_all('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password_1)<1) {
        array_push($errors, "Ο κωδικός πρέπει να περιέχει τουλάχιστον 1 ειδικό χαρακτήρα.");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Οι κωδικοί δεν ταιρίαζουν μεταξύ τους.");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Το username υπάρχει.");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Το email υπάρχει.");
        }
    }


    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['search_reg'])) {
    $date = date('Y-m-d H:i:s');
    $total_vaccinated = mysqli_real_escape_string($db, $_POST['total_vaccinated']);
    $fully_vaccinated = mysqli_real_escape_string($db, $_POST['fully_vaccinated']);
    $doses_administered = mysqli_real_escape_string($db, $_POST['doses_administered']);
    $query = "INSERT INTO vaccinations ( date, total_vaccinated , fully_vaccinated , doses_administered)
  			  VALUES('$date','$total_vaccinated', '$fully_vaccinated', '$doses_administered')";
    mysqli_query($db, $query);
    array_push($errors, "Επιτυχής καταχώρηση στην Βάση");
}

if (isset($_POST['search_reg_2'])) {
    $date = date('Y-m-d H:i:s');
    $total_vaccinated = mysqli_real_escape_string($db, $_POST['total_vaccinated']);
    $fully_vaccinated = mysqli_real_escape_string($db, $_POST['fully_vaccinated']);
    $doses_administered = mysqli_real_escape_string($db, $_POST['doses_administered']);
    $query = "INSERT INTO vaccinations_by_country ( countryName ,date, total_vaccinated , fully_vaccinated , doses_administered)
  			  VALUES('Greece' ,'$date','$total_vaccinated', '$fully_vaccinated', '$doses_administered')";
    mysqli_query($db, $query);
    array_push($errors, "Επιτυχής καταχώρηση στην Βάση");
}
