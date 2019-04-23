<?php  
$currentPage = "activity";
include 'function/f_activity.php';
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard User Statistik Indihub </h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
              Generate Report</a> -->
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- START OF FILTER FIELD -->

            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-body">
                  <form action="activity.php" method="POST">
                    <table>
                      <tr>
                        <th>Select Company:</th>
                        <th style="padding-left: 20px;">
                          <select name="company" class="selectpicker" data-width="auto"  onChange="getdivision(this.value)" >
                            <option value="0">All</option>
                            <?php combobox($company, 'CASE_COMPANY'); ?>
                          </select>
                        </th>

                        <th style="padding-left: 20px;">
                        <input class="btn btn-secondary btn-icon-split btn-sm" style="width: 80px; padding-top: 3px; padding-bottom: 3px;"
                              type="submit" name="search" value="Find">
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
                  <h6 class="m-0 font-weight-bold text-secondary"><?php echo $compName." ".date('d M Y');?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" >
                  <div class="chart-area" style="height: 400px">
                  <div id="chart"></div>
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
      var chart = c3.generate({
      bindto: '#chart',
      padding: {
        right: 30,
        left: 50,
      },
      size: {
        height: 400,
      },
      data: {
        x : 'x',
        columns: [
            ['x', 'User Terdaftar', 'User Login di Aplikasi', 'Mengirim Pesan', 'Menerima Pesan',
            'Panggilan VoIP', 'Menerima Panggilan VoIP', 'Panggilan Video', 'Menerima Panggilan Video',
            'Melakukan Live Stereaming','Menonton Live Streamong' ],
            ['terdaftar', <?PHP echo $r_user_reg."".$r_user_actv."".$r_msg_sender."".$r_msg_receiver."".$r_voip_sender."".$r_voip_receiver."".$r_vid_sender."".$r_vid_receiver."".$r_ls_sender."".$r_ls_receiver?> ],
        ],
        type: 'bar',
        labels: false,
      },
      legend: {
        show: false
      },
      axis: {
          x: {
              type: 'categorized',
              tick: {
                  centered: true,
                  rotate: 55
              }
          }
      }
});
    });
  </script>

</body>

</html>