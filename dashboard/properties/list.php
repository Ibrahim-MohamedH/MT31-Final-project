<?php
require_once "C:/xampp/htdocs/realState/app/configDB.php";
require_once "C:/xampp/htdocs/realState/app/functions.php";
require_once "../shared/head.php";
require_once "../shared/navbar.php";
require_once "../shared/sidebar.php";

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Properties</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Properties</li>
        <li class="breadcrumb-item active">List Properties</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">All Available Properties</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>description</th>
                  <th>address</th>
                  <th>property type</th>
                  <th>status</th>
                  <th>Price</th>
                  <th>Area</th>
                  <th>Rooms</th>
                  <th>Baths</th>
                  <th>created_by</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <img
                      width="50"
                      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0uK-P6SwPJ90JaBzkAebRHvJaNMTeHZIK-g&s"
                      alt="placeholder" />
                  </td>
                  <td>Unity Pugh</td>
                  <td>Unity Pugh</td>
                  <td>Unity Pugh</td>
                  <td>House</td>
                  <td>Rent</td>
                  <td>2005</td>
                  <td>205m2</td>
                  <td>3</td>
                  <td>2</td>
                  <td>John Doe</td>
                  <td>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
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