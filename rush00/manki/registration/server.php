<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'rootroot', 'rush00');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username
  $user_check_query = "SELECT * FROM user_table WHERE user_name='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = hash(whirlpool, $password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO user_table (user_name, user_passwd) 
  			  VALUES('$username', '$password')";
    if(!mysqli_query($db, $query))
      array_push($errors, "Error: user not added");
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: ../index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = hash(whirlpool, $password);

    $query = "SELECT * FROM user_table WHERE user_name='$username' AND user_passwd='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// CHANGE PASSWORD
if (isset($_POST['change_passwd'])) {
  // receive all input values from the form
  $oldpw = hash(whirlpool, mysqli_real_escape_string($db, $_POST['oldpw']));
  $newpw_1 = hash(whirlpool, mysqli_real_escape_string($db, $_POST['newpw_1']));
  $newpw_2 = hash(whirlpool, mysqli_real_escape_string($db, $_POST['newpw_2']));

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($oldpw)) { array_push($errors, "Old password is required"); }
    if (empty($newpw_1)) { array_push($errors, "New password is required"); }
    if ($newpw_1!= $newpw_2) {
      array_push($errors, "The two new passwords do not match");
    }

  // first check the database to make sure user already exist and the password is correct
  $username = $_SESSION['username'];
  $user_check_query = "SELECT * FROM user_table WHERE user_name='$username' AND user_passwd='$oldpw'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if (!$user) // if user do not exists
    array_push($errors, "Wrong password, try again !");

  // Finally, change password if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "UPDATE user_table SET user_passwd='$newpw_1'
    WHERE user_name='$username'";
    if(!mysqli_query($db, $query))
      array_push($errors, "Error: user not added");
    else
        array_push($popups, "Your password was successfuly changed !");
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

  }
}

?>