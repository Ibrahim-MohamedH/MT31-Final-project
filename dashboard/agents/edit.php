<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

$name = '';
$email = '';
$address = '';
$title = '';
$facebook = '';
$twitter = '';
$linkedIn = '';
$image = '';
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $selectOneQuery = "SELECT * FROM `agents` where id = $id";
  $selectOne = mysqli_query($con, $selectOneQuery);
  $row = mysqli_fetch_assoc($selectOne);
  $name = $row['name'];
  $email = $row['email'];
  $address = $row['address'];
  $title = $row['title'];
  $facebook = $row['facebook'];
  $twitter = $row['twitter'];
  $linkedIn = $row['linkedIn'];
  $image = $row['image'];
  if (isset($_POST["update"])) {
    $name = filterValidation($_POST['name']);
    $email = $_POST['email'];
    $address = filterValidation($_POST['address']);
    $title = filterValidation($_POST['title']);
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $linkedIn = $_POST['linkedIn'];

    if (stringValidation($name, 5)) {
      $errors[] = 'You must add a name and it must be at least 5 characters';
    }
    if (stringValidation($email, 1)) {
      $errors[] = 'You must add an email address';
    }
    if (stringValidation($address, 1)) {
      $errors[] = 'You must add an address';
    }
    if (stringValidation($title, 1)) {
      $errors[] = 'You must add a job title';
    }

    // Image 
    $realName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imagename = "hamdaState.com_" . rand(0, 2000) . time() . "_" . $realName;
    $tmpName = $_FILES['image']['tmp_name'];
    $location = 'uploads/' . $imagename;
    if ($realName) {
      if (imageSizeValidation($imageSize, 3)) {
        $errors[] = "the image must be less than 3MB";
      }
    }

    if (empty($errors)) {
      if ($realName) {
        move_uploaded_file($tmpName, $location);
        $oldImage = 'uploads/' . $image;
        unlink($oldImage);
      } else {
        $imagename = $image;
      }
      $updateQuery = "UPDATE `agents` SET `name` = '$name', email = '$email', `address` = '$address',title = '$title',facebook = '$facebook',twitter = '$twitter',linkedIn = '$linkedIn',`image` ='$imagename'";
      $update = mysqli_query($con, $updateQuery);
      if ($update) {
        dashboardPath("agents/list.php");
      }
    }
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= dashboradURL('agents/list.php') ?>">Agents</a></li>
        <li class="breadcrumb-item active">Edit Agent</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Agent</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="name" class="form-label">name</label>
                <input
                  value="<?= $name ?>"
                  type="text"
                  class="form-control"
                  id="name"
                  name="name" />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input
                  value="<?= $email ?>"
                  type="email"
                  class="form-control"
                  id="email"
                  name="email" />
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"
                  rows="1"><?= $address ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input
                  value="<?= $title ?>"
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input
                  value="<?= $facebook ?>"
                  type="text"
                  class="form-control"
                  id="facebook"
                  name="facebook" />
              </div>
              <div class="col-md-6">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input
                  value="<?= $twitter ?>"
                  type="text"
                  class="form-control"
                  id="twitter"
                  name="twitter" />
              </div>
              <div class="col-md-6">
                <label for="linkedIn" class="form-label">LinkedIn URL</label>
                <input
                  value="<?= $linkedIn ?>"
                  type="text"
                  class="form-control"
                  id="linkedIn"
                  name="linkedIn" />
              </div>
              <div class="col-md-6">
                <label for="image" class="form-label">Agent Image</label>
                <input
                  type="file"
                  class="form-control mb-3"
                  id="image"
                  name="image" />
                <img width="200" src="./uploads/<?= $image ?>" alt="">
              </div>
              <div class="text-center">
                <button type="update" name="update" class="btn btn-warning">
                  Update
                </button>
                <a href="<?= dashboradURL('agents/list.php') ?>" class="btn btn-secondary">
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