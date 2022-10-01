<?php 
  function printA($array)
  {
    echo '<pre>';print_r($array);echo '</pre>';
  }
   
   session_start();
   
   if (isset($_SESSION['username'])) {
     header("Location: chats.php");
     exit;
   }

   $pdo = new PDO("mysql:host=localhost;port=3306;dbname=my_db", "root", "");

   $login =  false;

   $email = $_POST["email"] ?? '';
   $password = $_POST["password"] ?? '';

   $statement = $pdo->prepare("SELECT * FROM users");
   $statement->execute();
   $users = $statement->fetchAll(PDO::FETCH_ASSOC);
   
   if ($email && $password) {
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
          $login = true;
          $_SESSION['username'] = $user['username'];
          $_SESSION['user_id'] = $user['id'];
          header("Location: chats.php");
          break;
        }
      }
   }
   

?>

<?php require_once "header.php" ?>
<div style="height:500px;display:flex;justify-content:center;align-items:center">
  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header text-uppercase text-dark font-weight-bold">Login</div>
              <div class="card-body text-white bg-dark">
                  <form method="POST">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$login): ?>
                      <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <strong>Error!</strong> Invalid login credentials
                      </div>
                    <?php endif  ?>
                    <div class="form-group row">
                      <label>Email</label>
                      <input type="email" placeholder="Your Email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <label>Password</label>
                      <input type="password" id="password" placeholder="Your Password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <button class="btn btn-secondary btn-block" type="submit">
                        Login
                      </button>
                    </div>
                    <div class="text-center">
                        <a class="text-white" href="register.php">Register</a>
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