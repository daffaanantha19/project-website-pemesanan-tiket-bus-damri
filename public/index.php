<?php
require "functions.php";

$harga = query("SELECT * FROM kelas");

$pesan_tiket = query("SELECT * FROM pesan_tiket, kelas WHERE pesan_tiket.id_kelas=kelas.id");


?>
<!DOCTYPE html>
<html lang="en" id="home">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Tiket Bus Damri</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/style.css">
</head>
<body>
    <!-- <div class="container"> -->
        <!-- Navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home">Aplikasi Pemesanan Tiket</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#Kelas">Kelas Bus</a></li>
                    <li><a href="#history">Data Penumpang Bus</a></li>
                    
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End Navbar -->

        <!-- Jumbotron -->
        <div class="jumbotron text-center">
          <h1>Aplikasi Pemesanan Tiket Bus Damri</h1>
          <p align="justify">Tiket damri Kemayoran adalah salah satu alternatif naik bus dari Jakarta ke berbagai tujuan seperti Pulo Gebang (Cakung), Jatibarang, Cirebon, Tegal, Purwokerto, Purbalingga, Bobotsari Jawa Tengah. Selain itu juga ke Bandung, Cilacap, Pemalang, Semarang, Jogja dan Wonosobo. Bahkan ke Bandara Soekarno Hatta. Harga tiket bus damri Kemayoran dan Jadwal Bus Damri Kemayoran ini berbeda beda di setiap rutenya. Namun ada yang satu jalur dan berangkat pada jam operasional yang sama. Contohnya jadwal bus damri Kemayoran Cilacap yang sama dengan rute jadwal damri Kemayoran Bandung. Namun berbeda jadwal bus damri Kemayoran ke Wonosobo. Begitu juga damri Kemayoran Wonsobo yang jadwal damri Kemayoran ke Jogja berbeda.</p>
        </div>
        <!-- Akhir Jumbotron -->

        <!-- kelas -->
        <section id="Kelas">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="text-center">Kelas Bus</h2>
              <hr>
            </div>
          </div>
          
          <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <img src="../node_modules/bootstrap/dist/img/ekonomi.PNG" alt="...">
                    <div class="caption">
                        <h3 align="center"> <b> Kelas Ekonomi </b> </h3>
              
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <img src="../node_modules/bootstrap/dist/img/bisnis.jpeg" alt="...">
                    <div class="caption">
                        <h3 align="center"><b> Kelas Bisnis </b> </h3>
                        <h4></h4>
                        
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                    <img src="../node_modules/bootstrap/dist/img/eksekutif.jpg" alt="...">
                    <div class="caption">
                        <h3 align="center"><b> Kelas Eksekutif </b> </h3>
                        
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End kelas -->

        

          
        
        <!-- End daftarharga -->

        <!-- history -->
        <section id="history">
          <div class="row">
            <div class="col-sm-12">
              <h2 class="text-center">Data Penumpang</h2>
              <hr>
            </div>
          </div>

          <div class="container">
            <a href="pesan_tiket.php" class="btn btn-success">
                Pesan Tiket
            </a> <br> <br>
            <div class="panel panel-info">
              <!-- Default panel contents -->
                <div class="panel-heading">Data Penumpang</div>

                <!-- Table -->
                <table class="table table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No. Identitas</th>
                        <th>No. HP</th>
                        <th>Kelas Penumpang</th>
                        <th>Jadwal Keberangkatan</th>
                        <th>Jumlah Penumpang Muda</th>
                        <th>Jumlah Penumpang Lansia</th>
                        <th>Harga Tiket</th>
                        <th>Total Bayar</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach( $pesan_tiket as $row ) : ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["no_ktp"]; ?></td>
                        <td><?php echo $row["no_hp"]; ?></td>
                        <td><?php echo $row["kelas"]; ?></td>
                        <td><?php echo $row["jadwal"]; ?></td>
                        <td><?php echo $row["penumpang_muda"]; ?></td>
                        <td><?php echo $row["penumpang_lansia"]; ?></td>
                        <td><?php echo $row["harga"]; ?></td>
                        <td><?php echo $row["total"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
          </div>
        </section>
        <!-- end history -->

        <!-- Footer -->
        <footer>
          <div class="container text-center">
            <div class="row">
              <div class="col-sm-12">
                <p>&copy; Copyright 2022 | with Daffa Anantha</a>.</p>
              </div>
            </div>
            <div class="row">
          
            </div>
          </div>
        </footer>
        <!-- End Footer -->

    <!-- </div> -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../node_modules/bootstrap/dist/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="js/jquery.easing.1.3.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script src="../node_modules/bootstrap/dist/js/script.js"></script>
</body>
</html>