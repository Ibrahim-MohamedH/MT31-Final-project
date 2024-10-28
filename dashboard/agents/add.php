<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

$message = '';
$errors = [];
if (isset($_POST['submit'])) {
  $name = filterValidation($_POST['name']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirmation = $_POST['password_confirmation'];
  $address = filterValidation($_POST['address']);
  $title = filterValidation($_POST['title']);
  $facebook = $_POST['facebook'];
  $twitter = $_POST['twitter'];
  $linkedIn = $_POST['linkedIn'];
  $hashedPassword = sha1($_POST['password']);

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
  if ($password != $password_confirmation) {
    $errors[] = 'Password is not equal to the password confirmation';
  }

  // Image 
  $realName = $_FILES['image']['name'];
  $imageSize = $_FILES['image']['size'];
  $imagename = "hamdaState.com_" . rand(0, 2000) . time() . "_" . $realName;
  $tmpName = $_FILES['image']['tmp_name'];
  $location = 'uploads/' . $imagename;
  if (imageRequiredValidation($realName)) {
    $errors[] = "You must upload an image";
  }
  if (imageSizeValidation($imageSize, 3)) {
    $errors[] = "the image must be less than 3MB";
  }
  if (empty($errors)) {
    move_uploaded_file($tmpName, $location);
    $insertQuery = "INSERT INTO `agents` VALUES (NULL, '$name', '$email','$password','$address','$title','$facebook','$twitter','$linkedIn','$imagename')";
    $insert = mysqli_query($con, $insertQuery);
    if ($insert) {
      $message = 'Agent has been added successfully';
    }
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= dashboradURL() ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= dashboradURL("agents/list.php") ?>">Agents</a></li>
        <li class="breadcrumb-item active">Add Agent</li>
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
            <h5 class="card-title">Add New Agent</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="name" class="form-label">name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name" />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email" />
              </div>
              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password" />
              </div>
              <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input
                  type="password"
                  class="form-control"
                  id="password_confirmation"
                  name="password_confirmation" />
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"
                  rows="1"></textarea>
              </div>
              <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="facebook"
                  name="facebook" />
              </div>
              <div class="col-md-6">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="twitter"
                  name="twitter" />
              </div>
              <div class="col-md-6">
                <label for="linkedIn" class="form-label">LinkedIn URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="linkedIn"
                  name="linkedIn" />
              </div>
              <div class="col-md-6">
                <label for="image" class="form-label">Agent Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  name="image" />
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