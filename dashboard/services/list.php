<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $deleteQuery = "DELETE FROM `services` where id = $id";
  $delete = mysqli_query($con, $deleteQuery);
  if ($delete) {
    dashboardPath('services/list.php');
  }
}

$selectQuery = "SELECT * FROM `services`";
$select = mysqli_query($con, $selectQuery);

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item">Services</li>
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
                <h5 class="card-title">All Services</h5>
              </div>
              <div class="col-sm-6 text-end">
                <a href="<?= dashboradURL("services/add.php") ?>" class="btn btn-primary">Add Service</a>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon</th>
                  <th>Title</th>
                  <th>description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($select as $index => $service): ?>
                  <tr>
                    <td><?= $index + 1 ?></td>
                    <td class="text-center"><i class="<?= $service['icon'] ?>"></i></td>
                    <td><?= $service['service'] ?></td>
                    <td><?= $service['description'] ?></td>
                    <td>
                      <a href="./edit.php?edit=<?= $service['id'] ?>" class="btn btn-warning m-1">Edit</a>

                      <a href="?delete=<?= $service['id'] ?>" class="btn btn-danger m-1">Delete</a>
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