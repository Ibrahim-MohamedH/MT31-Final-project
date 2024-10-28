<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteQuery = "DELETE FROM `messages` where id = $id";
  $delete = mysqli_query($con, $deleteQuery);
  if ($delete) {
    dashboardPath('messages/list.php');
  }
}

$selectQuery = "SELECT * FROM `messages`";
$select = mysqli_query($con, $selectQuery);
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Messages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item">Messages</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">All Messages</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Message</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($select as $index => $message): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $message['name'] ?></td>
                    <td><?= $message['email'] ?></td>
                    <td><?= $message['phone'] ?></td>
                    <td><?= $message['message'] ?></td>
                    <td>
                      <a href="?delete=<?= $message['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->

<?php
require_once "../shared/scripts.php";
require_once "../shared/footer.php";

?>