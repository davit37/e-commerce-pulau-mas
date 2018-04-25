<?php //===========CODE DELETE RECORD ================
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from bukti_pembayaran where idpembayaran='$id' ";
	mysql_query($sql) or die(mysql_error());

}
					?>

<div>
	<h2 id="headings"> Data Bukti Pembayaran</h2>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th> <td><b>ID Pembayaran </b></td><td><b>Tanggal </b></td><td><b>Nomor Invoice</b></td><td><b>Keterangan</b></td><td style='min-width: 100px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="bukti";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT *from bukti_pembayaran
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
                <td><a href='index.php?mod=bukti&pg=konfirmasi_detail&id=<?php echo $rows -> idpembayaran; ?>'><?php echo $rows -> idpembayaran; ?></a></td>
				<td><?php echo $rows -> tanggal; ?></td>
				<td><?php echo $rows ->noinvoice; ?></td>
				<td><?php echo $rows -> keterangan; ?></td>
			
				<td>	
					
				<a href="index.php?mod=bukti&pg=konfirmasi_view&act=del&id=<?php echo $rows -> idpembayaran; ?>"
				onclick="return confirm('Yakin data bukti pembayaran akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
				}
			?>

			
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT idpembayaran from bukti_pembayaran");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "retur"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata; ?> </strong></div>
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

</div>
