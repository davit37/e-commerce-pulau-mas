<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<div>
	<a href='index.php?mod=bukti&pg=konfirmasi_view' class='btn btn-primary'>
		<i class='icon-arrow-left'>Back</i></a>
	<h2 id="headings"> Detail Bukti Pembayaran Dengan Nomor <?php echo $_GET['id']?></h2>
	<table  class="table table-striped ">
		<thead>
			<th><td><b>Nama</b></td><td><b>Kota</b></td><td><b>Alamat</b></td><td><b>Foto</b></td></th>
		</thead>
		<tbody>
<?php
$id=$_GET['id'];
$query="SELECT bukti_pembayaran.*,invoice.*,pelanggan.*,bukti_pembayaran.alamat,bukti_pembayaran.kota from bukti_pembayaran,invoice,pelanggan
where bukti_pembayaran.noinvoice=invoice.noinvoice and invoice.idpelanggan=pelanggan.idpelanggan and bukti_pembayaran.idpembayaran='$id'";

$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){           											
			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			        <td><?php echo $rows ->nama;?></td>
				    <td><?php echo $rows ->kota;?></td>
			        <td><?php echo $rows ->alamat;?></td>	
				<td>
					<img src='../upload/buktibayar/<?php echo $rows ->foto ?>'  width='96px' height='128px'>
					</td>
			</tr>
			
			<?php	$no++;
				}
			?>
			
		</tbody>
	</table>


</div>
