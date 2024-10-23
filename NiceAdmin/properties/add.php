<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Property</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Properties</a></li>
        <li class="breadcrumb-item active">Add Property</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Property</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-12">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="description"
                  name="description"></textarea>
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"></textarea>
              </div>
              <div class="col-md-6">
                <label for="property_type" class="form-label">Type</label>
                <select
                  class="form-select"
                  id="property_type"
                  name="property_type">
                  <option value="House">House</option>
                  <option value="Apartment">Apartment</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                  <option value="Sale">Sale</option>
                  <option value="Rent">Rent</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="price" class="form-label">Price</label>
                <input
                  type="Number"
                  class="form-control"
                  id="price"
                  name="price" />
              </div>
              <div class="col-md-3">
                <label for="area" class="form-label">Area</label>
                <input
                  type="text"
                  class="form-control"
                  id="area"
                  name="area" />
              </div>
              <div class="col-md-3">
                <label for="rooms" class="form-label">Rooms</label>
                <input
                  type="text"
                  class="form-control"
                  id="rooms"
                  name="rooms" />
              </div>
              <div class="col-md-3">
                <label for="baths" class="form-label">Baths</label>
                <input
                  type="text"
                  class="form-control"
                  id="baths"
                  name="baths" />
              </div>
              <div class="col-12">
                <label for="location" class="form-label">Location</label>
                <textarea
                  class="form-control"
                  id="location"
                  name="location"></textarea>
              </div>
              <div class="col-md-6">
                <label for="property_image" class="form-label">Property Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="property_image" />
              </div>
              <div class="col-md-6">
                <label for="floor_plan" class="form-label">Floor plan image</label>
                <input type="file" class="form-control" id="floor_plan" />
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