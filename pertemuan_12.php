<?php
    include "tampilkan_data.php";
    include "edit_data.php";

    $data_edit = mysqli_fetch_assoc($proses_ambil);
?>

<html>
    <header>
        <title>
        </title>

        <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="library/assets/styles.css" rel="stylesheet" media="screen">
        <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </header>

    <body>

        <div class="span9" id="content">
            <div class="row-fluid">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Data Mahasiswa</div>                        
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php
                                if (isset($_GET['id']) && $_GET['id'] != ''){
                            ?>
                                <form action="edit_data.php?id=<?php echo $data_edit['id'] ?>&proses=1" method="POST">
                            <?php
                                }else {
                            ?>
                                <form action="proses_pertemuan_12.php" method="POST">
                            <?php
                                }
                            ?>

                              <fieldset>
                                <legend>Input Data Mahasiswa</legend>

                                <div class="control-group">
                                    <label class="control-label" for="nama">NAMA MAHASISWA : </label>
                                    <div class="controls">
                                        <input type="hidden" class="input-xlarge focused" id="npm" name="npm" 
                                        value="<?php if($data_edit['id'] != "") echo $data_edit['id'];?>">

                                        <input type="text" class="input-xlarge focused" id="nama" name="nama" 
                                        value="<?php if (isset($data_edit['nama_mahasiswa']) && $data_edit['nama_mahasiswa'] != "") echo $data_edit['nama_mahasiswa']; ?>">
                                    </div>
                                </div>

                                <div class="control-group"> 
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                        <label class="control-label" for="jenis_kelamin">Jenis Kelamin : </label>
                                        <div class="controls">
                                            <input type="radio" name="jenis_kelamin" value="Tidak Diketahui"> Tidak Diketahui <br>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki - Laki <br>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan <br>
                                            
                                        </div>
                                    </form>
                                </div>
                                            
                                <div class="control-group">
                                    <label class="control-label" for="prodi ">PROGRAM STUDI : </label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="prodi" name="prodi" 
                                        value="<?php if (isset($data_edit['prodi']) && $data_edit['prodi'] != "") echo $data_edit['prodi'];?>">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">PROSES</button>
                                    <button type="reset" class="btn">CANCEL</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Data Mahasiswa</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
  							<table class="table">
						        <thead>
						        <tr>
						            <th>ID</th>
						            <th>Nama Mahasiswa</th>
						            <th>Program Studi</th>
                                    <th>Jenis Kelamin</th>
						            <th>Action</th>
						        </tr>
						        </thead>
						        <tbody>

                                <?php
                                    while($data = mysqli_fetch_assoc($proses)) {
                                ?>

						        <tr>
						            <td><?php echo $data['id'] ?></td>
						            <td><?php echo $data['nama_mahasiswa'] ?></td>
						            <td><?php echo $data['prodi'] ?></td>
                                    <td><?php echo $data['jenis_kelamin'] ?></td>
						            <td>
                                        <a href="pertemuan_12.php?id=<?php echo $data['id']; ?>"> Edit </a>  
                                        | 
                                        <a href="hapus_data.php?id=<?php echo $data['id']; ?>"> Hapus </a>
                                    </td>
						        </tr>

                                <?php
                                    }
                                ?>
						        </tbody>
						    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>