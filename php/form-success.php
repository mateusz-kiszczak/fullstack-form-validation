  <?php
    $results = $_POST;
  ?>
  
  <main>
    <section class="form-results">
      <h2 class="form-results__header">results from your form</h2>
      <p class="form-results__user-input">Name: <br><span><?= $results['name'] ?></span></p>
      <p class="form-results__user-input">Surname: <br><span><?= $results['surname'] ?></span></p>
      <p class="form-results__user-input">Age: <br><span><?= $results['age'] ?></span></p>
      <p class="form-results__user-input">Email: <br><span><?= $results['email'] ?></span></p>
      <p class="form-results__user-input">Password: <br><span><?= $results['password'] ?></span></p>
      <p class="form-results__user-input">Phone number: <br><span><?= $results['phone'] ?></span></p>
      <p class="form-results__user-input">Preferred contact way: <br><span><?= $results['contact'] ?></span></p>
      <p class="form-results__user-input"> Favorite programming language:
        <br>
        <span>
          <?= isset($results['favorite-language']) ? $results['favorite-language'] : 'You did not specify your favorite programming language.' ?>
        </span>
      </p>
      <div>
        <p class="form-results__user-input">Your form rate:
          <br> 
          <span>
            <?= isset($results['rating']) ? '' : 'You did not rate this form' ?>
          </span>
        </p>
        <div class="stars-container">
          <?php 
            if (isset($results['rating'])) {

              $stars_length = isset($results['rating']) ? $results['rating'] : '0';
              $empty_stars_length = 5 - $stars_length;
              
              for ($i = 0; $i < $stars_length; $i++) {
                echo '<div class="star"><img src="./img/gold-star.svg" alt="gold star" /></div>' ;
              }
              
              for ($i = 0; $i < $empty_stars_length; $i++) {
                echo '<div class="star"><img src="./img/empty-star.svg" alt="empty star" /></div>' ;
              }
            }
          ?>
        </div>
      </div>
    </section>
    <a href="index.php" class="go-back-button">go back to form</a>
  </main>
  