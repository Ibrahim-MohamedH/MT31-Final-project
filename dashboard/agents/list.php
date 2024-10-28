<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $selectOneQuery = "SELECT `image` FROM `agents` where id = $id";
  $selectOne = mysqli_query($con, $selectOneQuery);
  $row = mysqli_fetch_assoc($selectOne);
  $imageName = 'uploads/' . $row['image'];
  $deleteQuery = "DELETE FROM `agents` where id = $id";
  $delete = mysqli_query($con, $deleteQuery);
  if ($delete) {
    unlink($imageName);
    dashboardPath('agents/list.php');
  }
}

$selectQuery = "SELECT * FROM `agents`";
$select = mysqli_query($con, $selectQuery);
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Agents</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item">Agents</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-sm-6">
                <h5 class="card-title">All Agents</h5>
              </div>
              <div class="col-sm-6 text-end">
                <a href="<?= dashboradURL("agents/add.php") ?>" class="btn btn-primary">Add Agent</a>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>email</th>
                  <th>title</th>
                  <th>address</th>
                  <th>Social-links</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($select as $index => $agents): ?>
                  <tr>
                    <td><?= $index ?></td>
                    <td><?= $agents['name'] ?></td>
                    <td><?= $agents['email'] ?></td>
                    <td><?= $agents['title'] ?></td>
                    <td><?= $agents['address'] ?></td>
                    <td>
                      <?php if (!empty($agents['facebook'])): ?>
                        <a target="_blank" href="<?= $agents['facebook'] ?>"><i class="bi bi-facebook"></i></a>
                      <?php endif; ?>
                      <?php if (!empty($agents['twitter'])): ?>
                        <a target="_blank" href="<?= $agents['twitter'] ?>"><i class="bi bi-twitter-x"></i></a>
                      <?php endif; ?>
                      <?php if (!empty($agents['linkedIn'])): ?>
                        <a target="_blank" href="<?= $agents['linkedIn'] ?>"><i class="bi bi-linkedin"></i></a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="./edit.php?edit=<?= $agents['id'] ?>" class="btn btn-warning">Edit</a>
                      <a href="?delete=<?= $agents['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
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