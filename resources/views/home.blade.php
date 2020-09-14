
<!DOCTYPE html>
<html>
@include('admin.partials._head')
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app" class="wrapper">

<navbar></navbar>

  <sidebar></sidebar>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <betcon></betcon>

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
