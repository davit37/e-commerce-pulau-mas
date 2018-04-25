<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<div>
	<a href='index.php?mod=alamat&pg=alamat_kirim_view' class='btn btn-primary'>
		<i class='icon-arrow-left'>Back</i></a>
	<h2 id="headings"> Detail Alamat Dengan Nomor <?php echo $_GET['id']?></h2>
	<table  class="table table-striped ">
		<thead>
			<th><td><b>Nama Pelanggan</b></td><td><b>Nama Produk</b></td><td><b>Kode Pos</b></td><td><b>Alamat</b></td></th>
		</thead>
		<tbody>
<?php
$id=$_GET['id'];
$invoice=$_GET['noinvoice'];
$idpelanggan=$_GET['idpelanggan'];
$query="SELECT alamat_kirim.kodepos,alamat_kirim.alamat,transaksi.idproduk, invoice.noinvoice,pelanggan.nama, produk.nama_produk from alamat_kirim,transaksi,invoice,pelanggan,produk
where alamat_kirim.noinvoice=invoice.noinvoice 
and transaksi.idproduk=produk.idproduk
and pelanggan.idpelanggan=invoice.idpelanggan
and transaksi.noinvoice='$invoice' and invoice.idpelanggan='$idpelanggan' and alamat_kirim.noinvoice='$invoice' ";


$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){           											
			?>
			<tr>
				<td><?php echo $posisi+$no?></td>                
			<td><?php echo $rows -> nama; ?></td>
            <td><?php echo $rows -> nama_produk; ?></td>									
			<td><?php echo $rows -> kodepos; ?></td>
			<td><?php echo $rows -> alamat; ?></td>	
				
			</tr>
			
			<?php	$no++;
				}
			?>
			
		</tbody>
	</table>


</div>
