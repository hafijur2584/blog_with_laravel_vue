
<!DOCTYPE html>
<html>
@include('admin.partials._head')
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app" class="wrapper">

<navbar></navbar>

  <sidebar></sidebar>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><rou href="#">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <admin-master></admin-master>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.partials._footer')

</div>
<!-- ./wrapper -->


</body>
</html>
