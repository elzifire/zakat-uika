<?php 
session_start();
include 'head_admin.php';
include 'config/config.php'; 

if(isset($_POST['simpan'])){
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];

	if($password==$confirmpassword){
	$password=sha1($password);	

		if(simpandataadmin($nama,$email,$password,$level)){
			echo "<script>alert('Berhasil')</script>";
		}else{
			echo "<script>alert('Gagal')</script>";
		}
	}else{
		echo "<script>alert('Password Salah')</script>";
	}
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Mustahiq</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">[+] Data Mustahiq</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Mustahiq</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
<form id="quickForm" action="" method="post">
<div class="container">
<div class="row">
	<div class="col-md-5">
		<div class="header">
			<h2>Tambah Amil Baru</h2>
			<hr>
		</div>
		  <div class="form-group">
		    <label >Nama</label>
		    <input type="text" name="nama" class="form-control">
		  </div>
		  <div class="form-group">
		    <label >Email</label>
		    <input type="email" name="email" class="form-control">
		  </div>

		  <div class="form-group">
		    <label >Password</label>
		    <input type="password" name="password" class="form-control">
		  </div>

		  <div class="form-group">
		    <label >Konfirmasi Password</label>
		    <input type="password" name="confirmpassword" class="form-control">
		  </div>
		  <div class="form-group">
		    <label >Konfirmasi Password</label>
		    <input type="password" name="confirmpassword" class="form-control">
		  </div>
		  <input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
		  <a href="data_amil.php" class="btn btn-primary">Kembali</a>
	</div>
</div>
</form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<?php include 'foot_admin.php'; ?>