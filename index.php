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

    <?php
      require ($form_passed) ? 'php/form-success.php' : 'php/form.php';
    ?>
    
  </main>

  <?php include 'php/modules/footer.php'; ?>
  </div>
</div>
</body>
</html>
