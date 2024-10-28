<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

$icon = '';
$title = '';
$description = '';
$errrors = [];
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $selectOneQuery = "SELECT * FROM `services` where id = $id";
  $selectOne = mysqli_query($con, $selectOneQuery);
  $row = mysqli_fetch_assoc($selectOne);
  $icon = $row['icon'];
  $title = $row['service'];
  $description = $row['description'];
  if (isset($_POST['update'])) {
    $icon = filterValidation($_POST['icon']);
    $title = filterValidation($_POST['title']);
    $description = filterValidation($_POST['description']);

    if (stringValidation($icon, 1)) {
      $errors[] = "You must add Icon class";
    }
    if (stringValidation($title, 3)) {
      $errors[] = "The Service must have a title";
    }
    if (stringValidation($description, 3)) {
      $errors[] = "The Service must have a description";
    }
    if (empty($errors)) {
      $updateQuery = "UPDATE `services` SET `service`='$title', icon = '$icon', `description` = '$description' where id = $id";
      $update = mysqli_query($con, $updateQuery);
      if ($update) {
        dashboardPath('services/list.php');
      }
    }
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= dashboradURL('services/list.php') ?>">Services</a></li>
        <li class="breadcrumb-item active">Edit Service</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Service</h5>
            <form
              class="row g-3"
              method="post">
              <div class="col-md-6">
                <label for="title" class="form-label">title</label>
                <input
                  value="<?= $title ?>"
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="icon" class="form-label">Icon</label>
                <input
                  value="<?= $icon ?>"
                  type="text"
                  class="form-control"
                  id="icon"
                  name="icon" />
              </div>
              <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="description"
                  name="description"><?= $description ?></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="update" class="btn btn-warning">
                  update
                </button>
                <a href="<?= dashboradURL('services/list.php') ?>" class="btn btn-secondary">
                  Cancel
                </a>
              </div>
            </form>
            <!-- End Multi Columns Form -->
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