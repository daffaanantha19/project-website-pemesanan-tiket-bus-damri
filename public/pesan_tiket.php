<?php
require "functions.php";

$harga = query("SELECT * FROM kelas");
$jsArray = "var hrgKls = new Array();\n";

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pemesanan Tiket Bus AKAP</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/style.css">
</head>
<body>
    <div class="container">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" align="center">Form Pemesanan Tiket Bus</h3>
            </div>
            <div class="panel-body">
                <!-- form -->
                    <form name = "fform" action="" method="post" class="form-horizontal" onsubmit="return validate(this);">
                        <!-- <h2>Form Pemesanan</h2> -->
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ktp" class="col-sm-2 control-label">Nomor Identitas</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Nomor Identitas" required pattern="[0-9]{14-16}" title="Harus angka tidak boleh huruf!!!">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-sm-2 control-label">No. Hp</label>
                            <div class="col-sm-10">
                            <input type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="No. Hp" required pattern="[0-9]{12-13}" title="Harus angka tidak boleh huruf!!!">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="col-sm-2 control-label">Kelas Penumpang</label>
                            <div class="col-sm-10">
                                <select name="kelas" class="form-control" onchange="changeValue(this.value)">
                                    <?php foreach( $harga as $row ) : ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["kelas"]; ?></option>
                                    <?php $jsArray .= "hrgKls['" . $row['id'] . "'] = {name:'" . addslashes($row['harga']) . "'};\n";  ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jadwal" class="col-sm-2 control-label">Jadwal Keberangkatan</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" name="jadwal" id="jadwal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penumpang_muda" class="col-sm-2 control-label">Jumlah Penumpang <small>Bukan Lansia (Usia < 60)</small></label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="penumpang_muda" id="penumpang_md" placeholder="Jumlah Penumpang" required min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penumpang_lansia" class="col-sm-2 control-label">Jumlah Penumpang Lansia <small>Usia 60 tahun ke atas</small></label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="penumpang_lansia" id="penumpang_ls" placeholder="Jumlah Penumpang Lansia" required min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="col-sm-2 control-label">Harga Tiket</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp. 000.000" readonly>

                        <!-- js -->
                            <script type="text/javascript">  
                                <?php echo $jsArray; ?>
                                function changeValue(id){
                                document.getElementById('harga').value = hrgKls[id].name;
                                };

                                function tekan() {
                                    // var jumlahtiket = parseFloat(document.fform.ijumlahtiket.value);
                                    var pelanggan_m = parseInt(document.fform.penumpang_muda.value);
                                    var pelanggan_l = parseInt(document.fform.penumpang_lansia.value);
                                    var hrg = parseInt(document.fform.harga.value);
                                    var diskon = 0.0;
                                    var total = 0.0
                                    var sub = 0.0
                                    if (pelanggan_m > -1) {
                                        if (pelanggan_l > -1) {
                                            sub = pelanggan_m*hrg;
                                            diskon = (0.10*hrg)*pelanggan_l;

                                            total = sub+diskon;
                                            document.fform.ttl.value = eval(total);
                                        }else{
                                            
                                            alert("Penumpang tidak boleh min");
                                        }
                                    }else{
                                        alert("Penumpang tidak boleh min");
                                    }

                                
                                }

                                function validate() {
                                    var checked=false;
                                    var elements = document.getElementsByName("sel[]");
                                    for(var i=0; i < elements.length; i++){
                                        if(elements[i].checked) {
                                            checked = true;
                                        }
                                    }
                                    if (!checked) {
                                        alert('Anda belum menyetujui syarat dari kami');
                                    }
                                    return checked;
                                }
                            </script>
                            
                        <!-- end js -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ttl" class="col-sm-2 control-label">Total Bayar</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Rp. 000.000" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="checkbox col-sm-10">
                                <label>
                                    <input type="checkbox" name="sel[]"> Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-primary" onclick="tekan()">Hitung Total Bayar</button>
                                <!-- <input type="button" class="btn btn-primary" value="Hitung Total Bayar" onclick="tekan()"> -->
                                <button type="submit" class="btn btn-success" name="submit">Pesan Tiket</button>
                                <a href="index.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
            </div>
        </div>

        
    </div>
</body>
</html>