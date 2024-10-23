<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Agents</a></li>
        <li class="breadcrumb-item active">Add Agent</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
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
              <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"></textarea>
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
              <div class="text-center">
                <button type="submit" class="btn btn-primary">
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