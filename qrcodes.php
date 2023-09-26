<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Litcaf | QRcodes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LitCaf</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-sign-out"></i>
              <p>
                logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QR codes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">QR Codes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage QR codes here</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><input type="checkbox" id="selectAllCheckbox"></th>
                      <!-- <th>Select</th> -->
                      <th>Token</th>
                      <th>QRcode</th>
                      <th>Print Status</th>
                      <th>Assignment Status</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php include_once 'get_all_codes.php'; ?>

                    <?php foreach ($qrcodes as $key => $qrcode) {?>
                    <tr>
                      <td><input type="checkbox" class="select-checkbox" value="<?=$qrcode['id']?>"></td>
                      <td><?=$qrcode['token']?></td>
                      <td><img src="<?=$qrcode['qrcode']?>" alt="QR code" srcset="" style="width: 100px; height: 100px"></td>
                      <td><?php if($qrcode['printed']) echo "printed"; else echo "unprinted"; ?></td>
                      <td><?php if($qrcode['is_assigned']) echo "assigned"; else echo "unassigned";?></td>
                    </tr>
                    <?php } ?>
                    <!-- Add more rows as needed -->
                  </tbody>
                  
                  <tfoot>
                    <tr>
                      <th><input type="checkbox" id="selectAllCheckbox"></th>
                      <!-- <th>Select</th> -->
                      <th>Token</th>
                      <th>QRcode</th>
                      <th>Print Status</th>
                      <th>Assignment Status</th>
                    </tr>
                  </tfoot>
                </table>

                <br><br>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group col-3">
                      <select id="bulkOperation" class="form-control">
                        <option value="">Select Operation</option>
                        <option value="delete">Delete</option>
                        <option value="makePrinted">Make Printed</option>
                        <option value="markAssigned">Mark Assigned</option>
                      </select>
                    </div>
                    <div class="form-group col-3">
                      <button id="performBulkOperation" class="btn btn-primary form-control" disabled>Perform Bulk Operation</button>
                    </div>
                  </div>
                </div>

                
                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2023 <a href="https://litcaf.com">LitCaf</a>.com</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function () {
    // DataTable initialization
    var table = $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    // Handle "Select All" checkbox
    $("#selectAllCheckbox").click(function () {
      var isChecked = $(this).prop("checked");
      $(".select-checkbox").prop("checked", isChecked);
      updateBulkOperationButton();
    });

    // Handle individual checkbox change
    $('.select-checkbox').change(function () {
      updateBulkOperationButton();
    });

    // Handle select element change
    $('#bulkOperation').change(function () {
      updateBulkOperationButton();
    });

    // Function to enable/disable the button based on conditions
    function updateBulkOperationButton() {
      var selectedCheckboxes = $('.select-checkbox:checked').length > 0;
      var selectedOperation = $("#bulkOperation").val();
      var isButtonDisabled = !(selectedCheckboxes && selectedOperation !== '');

      $("#performBulkOperation").prop("disabled", isButtonDisabled);
    }

    // Handle bulk operation button click
    $('#performBulkOperation').click(function () {
      var selectedIds = [];
      $('.select-checkbox:checked').each(function () {
        selectedIds.push($(this).val());
      });

      var selectedOperation = $("#bulkOperation").val();

      // Perform bulk operation based on the selectedOperation value
      switch (selectedOperation) {
        case "delete":
          // Implement your delete operation logic here
          console.log("Deleting selected IDs: " + selectedIds.join(", "));
          break;
        case "makePrinted":
          // Implement your makePrinted operation logic here
          console.log("Making Printed for selected IDs: " + selectedIds.join(", "));
          break;
        case "markAssigned":
          // Implement your markAssigned operation logic here
          console.log("Marking Assigned for selected IDs: " + selectedIds.join(", "));
          
          break;
        default:
          console.log("No operation selected.");
          break;
      }
    });
  });
</script>




</body>
</html>
