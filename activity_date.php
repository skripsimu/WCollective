<?php  
// page title
$currentPage = "activity_date";
include 'function/f_activitydate.php';
include 'function/dataComboBox.php';
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard User Activity</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
              Generate Report</a> -->
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- START OF FILTER FIELD -->

            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-body">
                  <form action="activity_date.php" method="POST">
                    <table class="col-xl-12 col-lg-12">
                      <tr>
                        <th>Select Company:</th>
                        <th>
                          <select name="company" class="selectpicker" data-width="auto" required>
                            <option value="0">All</option>
                            <?php combobox($company,'COMPANY'); ?>
                          </select>
                        </th>
                        <th>Start Date:</th>
                        <th>
                          <input name="startDate" id="startDate" width="150" required />
                        </th>
                        <th>End Date:</th>
                        <th>
                          <input name="endDate" id="endDate" width="150" required />
                        </th>
                        <th>
                          <input class="btn btn-secondary btn-icon-split btn-sm" style=" width: 80px; padding-top: 3px; padding-bottom: 3px;"
                            type="submit" name="search" value="Filter">
                        </th>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>

            <!-- END OF FILTER FIELD -->

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-secondary"><?php echo $compName?> | <?php echo $startDate." to ".$endDate; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area" style="height: 400px">
                    <div id="chart-combination"></div>
                  </div>
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script> -->

  <!-- Load d3.js and c3.js -->
  <script src="vendor/c3/docs/js/d3-5.4.0.min.js" charset="utf-8"></script>
  <script src="vendor/c3/docs/js/c3.min.js"></script>


  <!-- Latest compiled and minified JavaScript -->
  <script src="vendor/select/dist/js/bootstrap-select.min.js"></script>

  <!-- Gijgo js for datepicker -->
  <script src="vendor/gijgo/gijgo.min.js" type="text/javascript"></script>

  <script>
    $(document).ready(function () {
      var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
      $('#startDate').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function() {
            var date = new Date();
            date.setDate(date.getDate()-7);
            return new Date(date.getFullYear(), date.getMonth(), date.getDate());
        },
        maxDate: function () {
          return $('#endDate').val();
        }
      });
      $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        iconsLibrary: 'fontawesome',
        minDate: function () {
          return $('#startDate').val();
        },
        maxDate: today
      });
      var chart = c3.generate({
        bindto: '#chart-combination', // id of chart wrapper
        data: {
          x: 'x',
          type: 'bar',
          types: {
            'User Terdaftar': 'line',
            'User Login di Aplikasi': 'line',
          },
          columns: [
            ['x', <?php daterange($startDate, $endDate); ?>],
            ['Mengirim Pesan', <?php echo $r_msg_sender; ?>],
            ['Menerima Pesan', <?php echo $r_msg_receiver; ?>],
            ['Panggilan VOiP', <?php echo $r_voip_sender; ?>],
            ['Menerima Panggilan VOiP', <?php echo $r_voip_receiver; ?>],
            ['Panggilan Video', <?php echo $r_ls_sender; ?>],
            ['Menerima Panggilan Video', <?php echo $r_ls_receiver; ?>],
            ['Melakukan Live Streaming', <?php echo $r_vid_sender; ?>],
            ['Menonton Live Streaming', <?php echo $r_vid_receiver; ?>],
            ['User Terdaftar', <?php echo $r_user_reg; ?>],
            ['User Login di Aplikasi', <?php echo $r_user_actv; ?>]
          ],
          axes: {
            'User Terdaftar': 'y2',
            'Menerima Pesan': 'y'
          }
        },
        axis: {
          x: {
            type: 'timeseries',
            tick: {
              format: '%Y-%m-%d',
              // rotate: 55,
              multiline: true,
            },
            label: {
              text: 'Tanggal Aktivitas',
              position: "inner-left"
            }
          },
          y2: {
            show: true
          }
        }
      });
    });
  </script>

</body>

</html>