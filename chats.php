<?php 

  function printA($array)
  {
    echo '<pre>';print_r($array);echo '</pre>';
  }
  
  session_start();
  if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit;
  }
  $sent = false;
  $pdo = new PDO("mysql:host=localhost;port=3306;dbname=my_db", "root", "");

  $username = $_SESSION['username'];
  $user_id = $_SESSION['user_id'];

  $message = $_POST['message'] ?? '';
  
  if ($message) {
    $statement = $pdo->prepare("INSERT IGNORE INTO chats (message, user_id, date) VALUES(:message, :user_id, :date)");
    $statement->bindValue(":message", $message);
    $statement->bindValue(":user_id", $user_id);
    $statement->bindValue(":date", date("Y-m-d H:i:s"));
    $statement->execute();
    $message = '';
    $sent = true;
  }

  $query = $pdo->prepare("SELECT * FROM users JOIN chats ON users.id = chats.user_id ORDER BY date DESC LIMIT 5");
  $query->execute();
  $data = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<?php require_once "header.php" ?>
<div class="container"></div>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card my-5">
        <div class="card-header text-uppercase text-dark font-weight-bold">Chat Box ( Shows latest 5 messages )</div>
        <div class="card-body bg-dark text-white">
          <?php if ($data): ?>
             <table class="table table-striped text-white">
              <thead class="text-uppercase">
                <tr>
                  <th>#</th>
                  <th>Message</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $id => $d): ?>
                  <tr>
                    <td><?= ++$id ?></td>
                    <td><?= $d['message'] ?></td>
                    <td class="text-capitalize"><?= $d['username'] ?></td>
                    <td><?= $d['email'] ?></td>
                    <td><?= $d['date'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
             </table>
          <?php else: ?>
             <div class="alert alert-warning">No message available! You can type a message on the form below and send.</div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
   <div class="row">
     <div class="col-md-8 mx-auto">
         <div class="card">
            <div class="card-header text-uppercase text-dark font-weight-bold">Write Message</div>
              <div class="card-body text-white bg-dark">
                  <form class="needs-validation" method="POST" novalidate>
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $sent): ?>
                      <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <strong>Success!</strong> Message sent successfully.
                      </div>
                    <?php endif  ?>
                    <div class="form-group row">
                        <label>Message</label>
                         <textarea name="message" value="<?= $message ?>" placeholder="Type a Message ..." class="form-control" cols="10" rows="5" required></textarea>
                        <div class="invalid-feedback">message is requierd</div>
                      </div>
                    <div class="form-group row">
                      <button class="btn btn-secondary btn-block" type="submit">
                        Send
                      </button>
                    </div>
                  </form>
              </div>
          </div>
     </div>
   </div>
</div>

<?php require_once "footer.php" ?>