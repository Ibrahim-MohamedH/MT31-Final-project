<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

$message = '';
$errrors = [];
if (isset($_POST['submit'])) {
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
    $insertQuery = "INSERT INTO `services` VALUES (NULL, '$title', '$description', '$icon')";
    $insert = mysqli_query($con, $insertQuery);
    if ($insert) {
      $message = 'Service has been added successfully';
    }
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= dashboradURL('services/list.php') ?>">Services</a></li>
        <li class="breadcrumb-item active">Add Service</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach ($errors as $error): ?>
                  <li><?= $error ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if (!empty($message)): ?>
            <div class="alert alert-success">
              <?= $message ?>
            </div>
          <?php endif; ?>
          <div class="card-body">
            <h5 class="card-title">Add New Service</h5>
            <form
              class="row g-3"
              method="post">
              <div class="col-md-6">
                <label for="title" class="form-label">title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="icon" class="form-label">Icon</label>
                <input
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
                  name="description"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  Submit
                </button>
                <button type="reset" class="btn btn-secondary">
                  Reset
                </button>
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