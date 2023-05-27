<?php
declare(strict_types=1);


// VARIABLES ////////////////////////////

$userInput = [
  'name'              => '',
  'surname'           => '',
  'age'               => '',
  'email'             => '',
  'password'          => '',
  'repeatPassword'    => '',
  'phone'             => '',
  'contact'           => '',
  'favoriteLanguage'  => '',
  'rating'            => '',
  'terms'             => ''
];

$errors = [
  'name'            => '',
  'surname'         => '',
  'age'             => '',
  'email'           => '',
  'password'        => '',
  'repeatPassword'  => '',
  'phone'           => '',
  'contact'         => '',
  'terms'           => ''
];

$message = '';
$form_passed = false;

// FUNCTIONS ////////////////////////////

// Checks if sting length fits the range.
// Firrst name, Surname.
function is_text($text, $min = 0, $max = 100) {
  $length = mb_strlen($text);
  if  ( preg_match('/^[a-zA-Z\-\'\s]{2,64}$/', $text)
        and preg_match('/^([^0-9]*)$/', $text)) {
    return ($length >= $min and $length <= $max);
  } 
  return false;
}

// Checks if number fits the range.
// Age.
function is_number($number, $min = 16, $max = 99): bool {
  if  ( preg_match('/^[1-9]{1,2}$/', $number) ) {
    return ($number >= $min and $number <= $max);
  }
  return false;
}

// Checks if password meets the requirements (is strong).
// Password - minimum one big letter, one number and one special character (! £ $ & ? @ . : ; _ -)
function is_password_strong($password): bool {
  if  ( mb_strlen($password) >= 8
        and preg_match('/[a-z]/', $password)
        and preg_match('/[A-Z]/', $password)
        and preg_match('/[0-9]/', $password)
        and preg_match('/[\!\£\$\&\?\@\.\:\;\_\-]/', $password)
      ) {
    return true;    
  }
  return false;
}

// Checks if two values are same.
// Password confirmation.
function is_same($val1, $val2): bool {
  if ( $val1 == $val2 ) {
    return true;
  }
  return false;
}

// Checks if email fits the pattern.
// Email.
function is_email($email): bool {
  if ( preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) ) {
    return true;
  }
  return false;
}

// Check if phone number fits the pattern.
// Phone.
function is_phone_number($phone, $min = 9, $max = 13) {
  $numLength = strlen((string)$phone);
  $isLength = ($numLength >= $min and $numLength <= $max);

  if ( $isLength and preg_match('/^[0-9]{9,13}$/', $phone) ) {
    return true;
  }
  return false;
}


// VALIDATION ////////////////////////////

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Required fields.
  $userInput['name'] = $_POST['name'];
  $userInput['surname'] = $_POST['surname'];
  $userInput['age'] = $_POST['age'];
  $userInput['email'] = $_POST['email'];
  $userInput['password'] = $_POST['password'];
  $userInput['repeatPassword'] = $_POST['repeat-password'];
  $userInput['phone'] = $_POST['phone'];
  $userInput['contact'] = $_POST['contact'];
  $userInput['terms'] = (isset($_POST['terms']) and $_POST['terms'] == true) ? true : false;

  // Errors handeling.
  $errors['name'] = is_text($userInput['name'], 2, 64) ? '' : 'Name must be 2-64 letters and do not contains numbers.';
  $errors['surname'] = is_text($userInput['surname'], 2, 64) ? '' : 'Surname must be 2-64 letters.';
  $errors['age'] = is_number($userInput['age'], 16, 99) ? '' : 'You must be 16-99 years old.';
  $errors['email'] = is_email($userInput['email']) ? '' : 'Your email address is incorect.';
  $errors['password'] = is_password_strong($userInput['password']) ? '' : nl2br("Your password is not strong enough. \nPasword must be at least 8 characters long. \nPassword needs at least one big letter, one number and one of the following special characters: ! £ $ & ? @ . : ; _ -.");
  $errors['repeatPassword'] = is_same($userInput['password'], $userInput['repeatPassword']) ? '' : 'Password does not match previous one.';
  $errors['phone'] = is_phone_number($userInput['phone']) ? '' : 'Invalid phone number. Please eneter your mobile phone number WITHOUT the prefix.';
  $errors['contact'] = $userInput['contact'] ? '' : 'Please choose preferred contact method.';
  $errors['terms'] = $userInput['terms'] ? '' : 'You must agree to the terms and conditions.';

  $invalid = implode($errors);
  if ( $invalid ) {
    $message = 'Form invalid. Please check your informations and correct them.';
  } else {
    $form_passed = true;
  }
}

?>
