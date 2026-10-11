  <?php include 'dbcon.php'; ?> 
<html>
<head>
    <meta charset="utf-8"> <!-- Sets character encoding to UTF-8 (supports most characters) -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Makes page responsive on mobile devices -->
    <title>PHP AND MYSQL User Management</title> 

    <!-- Latest compiled and minified Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled Bootstrap JavaScript bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-4">

<h1 style="text-align: center;">User Management System</h1>

<div class="row">
  <div class="col-md-4">

      <h3> Add New User </h3>
          <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($_GET['msg']); ?>
        </div>
        <?php endif; ?>
      <div >
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text"  placeholder="Enter Full Name" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" placeholder="Email Address" name="email" class="form-control" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
  </div>

  <div class="col-md-8">
   
      <h3>Registered Users </h3>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Joined</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
            if ($result->num_rows > 0):
              while($row = $result->fetch_assoc()):
            ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['created_at'] ?></td>
              <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</a>
              </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
              <td colspan="5" class="text-center" " >No data found</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (name,email) VALUES ('$name','$email')");
    header("Location: index.php?msg=User added successfully");
}
?>

</body>
</html>

