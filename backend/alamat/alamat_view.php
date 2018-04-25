

<?php 
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
//===========CODE DELETE RECORD ================

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from alamat_kirim where id_kirim='$id' ";
	mysql_query($sql) or die(mysql_error());

}
//==========================================
?>



	<h2 id="headings"> Data Alamat</h2>

	<table  class="table table-striped table-bordered table-condensed">
		<thead>
		<th><td><h6>ID Kirim</h6></td><td><h6>Nama Invoice</h6></td><td><h6>Tanggal</h6></td><td><h6>Kota Asal</h6></td><td><h6>Provinsi</h6></td><td><h6>Kota Tujuan</h6></td><td><h6>Jasa Pengiriman</h6></td><td><h6>Biaya Ongkir</h6></td><td><h6>Total Belanja</h6></td><td><h6>Total Transaksi</h6></td><td><h6>Aksi</h6></td></th>
		</thead>
		<tbody>
		<?php
						//bata paging 
	$batas=5;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}
$query="SELECT alamat_kirim.*, invoice.noinvoice,invoice.idpelanggan from alamat_kirim,invoice where alamat_kirim.noinvoice=invoice.noinvoice limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><?php echo $posisi+$no
			?></td>
            <td><a href='index.php?mod=alamat&pg=alamat_kirim_detail&id=<?php echo $rows -> id_kirim."&noinvoice=".$rows ->noinvoice."&idpelanggan=".$rows ->idpelanggan; ?>'><?php echo $rows -> id_kirim; ?></a></td>
             <td><?php echo $rows ->noinvoice; ?></td>
            <td><?php echo $rows -> tanggal; ?></td>
            <td><?php echo $rows -> kota_asal; ?></td>
           
            <?php
			$id_p =  $rows -> provinsi;
$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province?id=$id_p",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key:f993f0d31f1bebd7c494adc3cb7a3ca6"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

curl_close($curl);

$data = json_decode($response, true);
	
	$provinsi= $data['rajaongkir']["results"]["province"];
?>
            <td><?php echo $provinsi ?></td>
            
             <?php
			 $id_kt=$rows -> kota_tujuan;
			
$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=$id_kt",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key:f993f0d31f1bebd7c494adc3cb7a3ca6"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}

$data = json_decode($response, true);
	
$kota_tujuan= $data['rajaongkir']["results"]["city_name"];
	?>
            <td><?php echo $kota_tujuan; ?></td>
            <td><?php echo $rows -> jasa_pengiriman; ?></td>
			<td><?php echo $rows -> biaya_ongkir; ?></td>
			<td><?php echo $rows -> total_belanja; ?></td>
			<td><?php echo $rows -> total_transaksi; ?></td>
			
			
			<td><a href="index.php?mod=alamat&pg=alamat_view&act=del&id=<?php echo $rows -> id_kirim; ?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?php $no++;
		}
	?>

		
		</tbody>
	</table>

	
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("select id_kirim from alamat_kirim");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php
pagination($halaman,$jumlah_halaman,"alamat");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata;?> </strong></div>
<?php
	// KODE UNTUK MENAMPILKAN PESAN STATUS
	if (isset($_GET['status'])) {
		if ($_GET['status'] == 0) {
			echo " Operasi data berhasil";
		} else {
			echo "operasi gagal";
		}
	}

	//close database
	?>


