<?php  
$currentPage = "activity_reporting";
include 'function/f_activity_report.php';
include 'function/combo_membership.php';
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
            <form method="post" action="export2.php">
              <button type="submit"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" name="activity"><i class="fas fa-download fa-sm text-white-50"></i>
                Export to .xls
              </button> 
            </form>
          </div>
          <!-- Start The code here -->

          <!-- Custom styles for this page -->
          <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

          <!-- Content Wrapper -->
          <!-- <div id="content-wrapper" class="d-flex flex-column"> -->

          <!-- Main Content -->
          <div class="col-xl-12 col-lg-12">
              <div id="company-list">
                <div class="card shadow mb-4">

                  <div class="card-body">
                    <form action="activity_reporting.php" method="POST">
                      <table>
                        <tr>
                          <th>Select Company:</th>
                          <th style="padding-left: 20px;">
                            <select name="company" class="selectpicker" data-width="auto" onChange="getdivision(this.value)">
                              <option value="">Select Company</option>
                              <?php combobox($company, 'CASE_COMPANY'); ?>
                            </select>
                          </th>
                          <th style="padding-left: 20px;">
                            <!--  <a class="btn btn-primary btn-icon-split btn-sm" style=" width: 80px; padding-top: 3px; padding-bottom: 3px;"
                              type="submit">
                              <span class="text">Filter</span></a> -->
                            <input class="btn btn-secondary btn-icon-split btn-sm" style="width: 80px; padding-top: 3px; padding-bottom: 3px;"
                              type="submit" name="search" value="Find">
                          </th>
                        </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Begin Page Content -->
          <div class="col-xl-12 col-lg-12">

              <!-- DataTales Example -->
              <div class="card shadow mb-4">

                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-secondary">Activity</h6>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th rowspan="2" style="vertical-align:middle; text-align:center">No</th>
                          <th rowspan="2" style="vertical-align:middle; text-align:center">Perusahaan</th>
                          <th colspan="2" style="text-align:center">VoIP</th>
                          <th colspan="2" style="text-align:center">Video Call</th>
                          <th colspan="2" style="text-align:center">Live Streaming</th>
                        </tr>
                        <tr>
                          <th style="text-align:center">Initiate</th>
                          <th style="text-align:center">Receive</th>
                          <th style="text-align:center">Initiate</th>
                          <th style="text-align:center">Recieve</th>
                          <th style="text-align:center">Initiate</th>
                          <th style="text-align:center">Receive</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo $tableContent; ?>
                      </tbody>
                    </table>
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

      <!-- Drop down -->
      <script src="vendor/select/dist/js/bootstrap-select.min.js"></script>

</body>

</html>