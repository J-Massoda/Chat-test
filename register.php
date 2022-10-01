<?php

  function printA($array)
  {
    echo '<pre>';print_r($array);echo '</pre>';
  }
   
   session_start();
   $pdo = new PDO("mysql:host=localhost;port=3306;dbname=my_db", "root", "");

   $hasAccount = $success =  false;

   $username = $_POST["username"] ?? '';
   $email = $_POST["email"] ?? '';
   $password = $_POST["password"] ?? '';

   $statement = $pdo->prepare("SELECT * FROM users");
   $statement->execute();
   $users = $statement->fetchAll(PDO::FETCH_ASSOC);
   
   foreach ($users as $user) {
     if ($user['email'] === $email) {
       $hasAccount = true;
       break;
     }
   }

   if ($username && $email && $password && !$hasAccount) {
     $query = $pdo->prepare("INSERT IGNORE INTO users (username, email, password, registration_date) VALUES(:username, :email, :password, :date)");
     $query->bindValue(":username", $username);
     $query->bindValue(":email", $email);
     $query->bindValue(":password", $password);
     $query->bindValue(":date", date("Y-m-d H:i:s"));
     $query->execute();
     $success = true;

     $username = $email = $password = '';
   }
   

?>


<?php require_once "header.php" ?>
<div style="height:500px;display:flex;justify-content:center;align-items:center">
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header text-uppercase text-dark font-weight-bold">Register</div>
              <div class="card-body text-white bg-dark">
                  <form method="POST">
                    <?php if ($hasAccount): ?>
                      <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <strong>Error!</strong> Email already has an account
                      </div>
                    <?php endif  ?>
                    <?php if ($success): ?>
                      <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <strong>Success!</strong> Registration Successful.
                      </div>
                    <?php endif  ?>
                    <div class="form-group row">
                      <label>User Name</label>
                      <input type="text" value="<?= $username ?>" placeholder="User Name" name="username" class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <label>Email</label>
                      <input type="email" value="<?= $email ?>" placeholder="Your Email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <label>Password</label>
                      <input type="password" value="<?= $password ?>" placeholder="Your Password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <button class="btn btn-secondary btn-block" type="submit">
                        Register
                      </button>
                    </div>
                    <div class="text-center">
                      <a class="text-white" href="login.php">Login</a>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<script src="js/index.js"></script>
</body>
</html>