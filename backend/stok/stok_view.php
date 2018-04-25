<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
 
 				//===========CODE DELETE RECORD ================

					if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from stok where idstok='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
					if(isset($_POST['update'])) {
						$persen = $_POST['persen'];
						$persen=$persen/100;
						$sql = "update stok set harga_jual=harga_jual+(harga_jual*$persen) ";
						mysql_query($sql) or die(mysql_error());

					}
					?>

<div>
	
	
	<h3>Data Stok Produk</h3>
	  <form  class="form-horizontal" method="POST" id="form1" 
	  action="index.php?mod=stok&pg=stok_view">
	<input type='text' name='persen' >% (persen)
	
	<button type="submit" class="btn btn-success" name='update' >Update Harga</button>
</form>	

    <form action="" method="post" name="form1" class="form-horizontal">			           
		  <input type='text' name='cari' placeholder="Masukan Nama Kategori">				               
                  <input type="submit" class="btn btn-success btn-sm" name="cari3" value="Cari" />
					<a href="cetak_stok.php?cari=<?php echo $_POST['cari']; ?>" target="_blank" class="btn btn-success btn-sm"> Cetak</a>         
            </form>
    
	<!--<a href='index.php?mod=stok&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama produk </b></td><td><b>Kategori</b></td><td><b>Harga Beli</b></td><td><b>Harga Jual</b></td><td><b>Harga Mitra</b></td><td><b>Jumlah</b></td><td><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="stok";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$cari=$_POST['cari'];
echo $cari;
if($cari==''){

$query="SELECT stok.*,produk.nama_produk, kategori.nama_kategori
 from stok,produk,kategori
 where stok.idproduk=produk.idproduk and produk.idkategori=kategori.idkategori
 limit $posisi,$batas ";
}else{
	$query="SELECT stok.*,produk.*, kategori.*
 from stok,produk,kategori
 where stok.idproduk=produk.idproduk and produk.idkategori=kategori.idkategori  and nama_kategori 
 like '%$cari%'   limit $posisi,$batas ";
}
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td><?php		echo $rows -> nama_produk;?></td>
                <td><?php		echo $rows -> nama_kategori;?></td>
			<td align='right'><?php		echo format_rupiah($rows ->harga_beli);?></td>
			<td align='right'><?php		echo format_rupiah($rows ->harga_jual);?></td>
            <td align='right'><?php		echo format_rupiah($rows ->harga_mitra);?></td>
			<td align='right'><?php		echo $rows ->jumlah;?></td>
			
				<td>	
					
					<a href="index.php?mod=stok&pg=stok_form&id=<?php echo $rows -> idstok;?>"

				class='btn btn-warning'> <i class="icon-pencil"></i></a><a href="index.php?mod=stok&pg=stok_view&act=del&id=<?php echo	$rows -> idstok;?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php	$no++;
	}?>

			<tr>
				<td colspan='7' ></td><td><a href="index.php?mod=stok&pg=stok_form"
				class='btn btn-primary'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idstok from stok");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php
pagination($halaman, $jumlah_halaman,"stok");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?php echo $jmldata;?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database?>

</div>
