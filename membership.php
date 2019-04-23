<?php  
$currentPage = "membership";
include ('function/f_membership.php');
include ('function/combo_membership.php');
?>

<!DOCTYPE html>
<html lang="en">


<?php include 'head.php';?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'sidebar.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'topbar.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reporting</h1>
            <!-- Button to Open the Modal -->
            <form method="post" action="export2.php">
              <button type="submit"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" name="details"><i class="fas fa-download fa-sm text-white-50"></i>
                Export to .xls
              </button> 
            </form>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Export Options</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="post" action="export2.php">

                      <label class="container">Company Name
                        <input name="CompanyName" type="checkbox" checked="checked" value="CustomerName">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Organization
                        <input name="OrganizationName" type="checkbox" checked="checked" value="Address">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Sub-Organization
                        <input name="SubOrganization" type="checkbox" checked="checked" value="City">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Position
                        <input name="Position" type="checkbox" checked="checked" value="PostalCode">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Name
                        <input name="Username" type="checkbox" checked="checked" value="Country">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Phone Number
                        <input name="PhoneNumber" type="checkbox" checked="checked" value="Country">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Email
                        <input name="Email" type="checkbox" checked="checked" value="Country">
                        <span class="checkmark"></span>
                      </label>
                      <label class="container">Status
                        <input name="Status" type="checkbox" checked="checked" value="Country">
                        <span class="checkmark"></span>
                      </label>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="details" class="btn btn-success">Export</button>
                      </div>
                    </form>
                  </div>



                </div>
              </div>
            </div>

            <!-- The Modal End-->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- START OF FILTER FIELD -->

            <div class="col-xl-12 col-lg-12">
              <div id="company-list">
                <div class="card shadow mb-4">

                  <div class="card-body">
                    <form action="membership.php" method="POST">
                      <table class="col-xl-12 col-lg-12">
                        <tr>
                          <th>Select Company:</th>
                          <th>
                            <select name="company" class="btn btn-light dropdown-toggle" data-width="fit" onChange="getDivision(this.value)">
                              <option value="">Select Company</option>
                              <?php combobox($company, 'CASE_COMPANY'); ?>
                            </select>
                          </th>
                          <th>Select Organization:</th>
                          <th>
                            <select name="division" class="btn btn-light dropdown-toggle" data-width="fit" id="division-list">
                              <option value="">Select Organization</option>
                            </select>
                          </th>
                          <th>
                            <input class="btn btn-secondary btn-icon-split btn-sm" style=" width: 80px; padding-top: 3px; padding-bottom: 3px;"
                              type="submit" name="search" value="Find">
                          </th>
                        </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- END OF FILTER FIELD -->

            <!-- DataTales Example -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-secondary">Membership</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Perusahaan</th>
                          <th class="text-center">Organisasi</th>
                          <th class="text-center">Sub Organisasi</th>
                          <th class="text-center">Posisi</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">No. Handphone</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo $tablecontent ;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <?php include 'logout_modal.php';?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="vendor/select/dist/js/bootstrap-select.min.js"></script>

    <!-- Filter Bertingkat -->
    <script src="function/getComboBox.js"></script>

    <script>$('.selectpicker').selectpicker('refresh');</script>


</body>

</html>