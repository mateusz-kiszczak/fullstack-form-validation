<?php
  require 'php/form-validation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An example of using form validation on both the front-end side with JavaScript and the back-end side with Php.">
  <title>Fullstack form validation</title>
  <link rel="stylesheet" href="styles/styles.css">
  <script src="script/form-validation.js" defer></script>
</head>
<body>
<div class="page-layout">
  <div class="content-wrapper">
  <?php require_once 'php/modules/header.php'; ?>

  <main>
    <!-- FORM START -->
    <form action="index.php" method="POST" class="form-element">

      <!-- FORM ALERT MESSAGE -->
      <?php if($message) : ?>
        <div class="form-alert"><p><?= $message ?></p></div>
      <?php endif; ?>
      
      <!-- NAME -->
      <p class="form-element__input">
        <label for="form-name">First name</label>
        <input style="<?= $errors['name'] ? 'border: 2px solid red' : '' ?>" type="text" name="name" id="form-name" minlength="2" maxlength="64" placeholder="Johny" value="<?= htmlspecialchars($userInput['name']) ?>">
        <!-- Error message -->
        <?php if($errors['name']) : ?>
          <p class="input-alert"><?= $errors['name'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- SURNAME -->
      <p class="form-element__input">
        <label for="form-surname">Surname</label>
        <input style="<?= $errors['surname'] ? 'border: 2px solid red' : '' ?>" type="text" name="surname" id="form-surname" minlength="2" maxlength="64" placeholder="Silverhand" value="<?= htmlspecialchars($userInput['surname']) ?>">
        <!-- Error message -->
        <?php if($errors['surname']) : ?>
          <p class="input-alert"><?= $errors['surname'] ?></p>
        <?php endif; ?>
      </p>
          
      <!-- AGE -->
      <p class="form-element__input">
        <label for="form-age">Age (16 - 99)</label>
        <input style="<?= $errors['age'] ? 'border: 2px solid red' : '' ?>" type="number" name="age" id="form-age" min="16" max="99" placeholder="58" value="<?= htmlspecialchars($userInput['age']) ?>">
        <!-- Error message -->
        <?php if($errors['age']) : ?>
          <p class="input-alert"><?= $errors['age'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- EMAIL -->
      <p class="form-element__input">
        <label for="form-email">Email</label>
        <input style="<?= $errors['email'] ? 'border: 2px solid red' : '' ?>" type="text" name="email" id="form-email" placeholder="johny_1988@data.com" value="<?= htmlspecialchars($userInput['email']) ?>">
        <!-- Error message -->
        <?php if($errors['email']) : ?>
          <p class="input-alert"><?= $errors['email'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- PASSWORD -->
      <p class="form-element__input">
        <label for="form-password">Password</label>
        <input style="<?= $errors['password'] ? 'border: 2px solid red' : '' ?>" type="password" name="password" id="form-password" placeholder="Your Password" value="<?= htmlspecialchars($userInput['password']) ?>">
        <!-- Error message -->
        <?php if($errors['password']) : ?>
          <p class="input-alert"><?= $errors['password'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- RE-ENTER PASSWORD -->
      <p class="form-element__input">
        <label for="form-repeat-password">Re-enter password</label>
        <input style="<?= $errors['repeatPassword'] ? 'border: 2px solid red' : '' ?>" type="password" name="repeat-password" id="form-repeat-password" placeholder="Your Password" value="<?= htmlspecialchars($userInput['repeatPassword']) ?>">
        <!-- Error message -->
        <?php if($errors['repeatPassword']) : ?>
          <p class="input-alert"><?= $errors['repeatPassword'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- PHONE NUMBER -->
      <p class="form-element__input">
        <label for="form-phone">Mobile number</label>
        <input style="<?= $errors['phone'] ? 'border: 2px solid red' : '' ?>" type="number" name="phone" id="form-phone" placeholder="02077456123" value="<?= htmlspecialchars($userInput['phone']) ?>">
        <!-- Error message -->
        <?php if($errors['phone']) : ?>
          <p class="input-alert"><?= $errors['phone'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- PREFERED CONTACT -->
      <p class="form-element__select">
        <label for="form-contact">Contact preferences</label>
        <select style="<?= $errors['contact'] ? 'border: 2px solid red' : '' ?>" name="contact" id="form-contact" >
          <option value="<?= $userInput['contact'] ?>">-- Please choose an option --</option>
          <option value="Email">Email</option>
          <option value="SMS">SMS</option>
          <option value="Phone">Phone</option>
        </select>
        <!-- Error message -->
        <?php if($errors['contact']) : ?>
          <p class="input-alert"><?= $errors['contact'] ?></p>
        <?php endif; ?>
      </p>
      
      <!-- FAVORITE PROGRAMMING LANGUAGE -->
      <fieldset>
        <legend>What is your favorite programming language?</legend>
        <div>
          <p>
            <input type="radio" name="favorite-language" value="javascript" id="form-lang-js">
            <label for="form-lang-js">JavaScript</label>
          <p>
            <input type="radio" name="favorite-language" value="php" id="form-lang-php">
            <label for="form-lang-php">PHP</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="java" id="form-lang-java">
            <label for="form-lang-java">Java</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="c" id="form-lang-c">
            <label for="form-lang-c">C#</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="python" id="form-lang-python">
            <label for="form-lang-python">Python</label>
          </p>
        </div>
        <div>
          <p>
            <input type="radio" name="favorite-language" value="swift" id="form-lang-swift">
            <label for="form-lang-swift">Swift</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="go" id="form-lang-go">
            <label for="form-lang-go">Go</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="pearl" id="form-lang-pearl">
            <label for="form-lang-pearl">Pearl</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="rust" id="form-lang-rust">
            <label for="form-lang-rust">Rust</label>
          </p>
          <p>
            <input type="radio" name="favorite-language" value="non" id="form-lang-non">
            <label for="form-lang-non">Non of above</label>
          </p>
        </div>
      </fieldset>
      
      <!-- FORM RATING -->
      <div class="form-element__radio__wrapper">
        <p class="form-element__radio-label">How many points would give to this form?</p>
        <p class="form-element__radio">
          <label for="form-rating-1">1</label>
          <input type="radio" name="rating" value="1"  id="form-rating-1">
          <label for="form-rating-2">2</label>
          <input type="radio" name="rating" value="2"  id="form-rating-2">
          <label for="form-rating-3">3</label>
          <input type="radio" name="rating" value="3"  id="form-rating-3">
          <label for="form-rating-4">4</label>
          <input type="radio" name="rating" value="4"  id="form-rating-4">
          <label for="form-rating-5">5</label>
          <input type="radio" name="rating" value="5"  id="form-rating-5">
        </p> 
      </div>
      
      <!-- TERMS AND CONDITIONS CHECKBOX -->
      <p class="form-element__checkbox">
        <input type="checkbox" name="terms" value="true" id="form-terms" >
        I agree to the terms and conditions.
      </p>
      <!-- Error message -->
      <?php if($errors['terms']) : ?>
        <p class="terms-alert"><?= $errors['terms'] ?></p>
      <?php endif; ?>
      
      <!-- FORM ALERT MESSAGE -->
      <?php if($message) : ?>
        <div class="form-alert"><p><?= $message ?></p></div>
      <?php endif; ?>

      <!-- SUBMIT BUTTON -->
      <p class="form-element__submit">
        <input type="submit" value="Submit" id="form-submit">
      </p>

    <!-- FORM END -->
    </form>
  </main>

  <?php include 'php/modules/footer.php'; ?>
  </div>
</div>
</body>
</html>
