
<?php
cek_status_login($_SESSION['idpelanggan']);
?>
<section class="main-content">

	<div class="row">
		<div class="span9">

	


	<h4 id="headings"> Data invoice</h4>
	<!--<a href='index.php?mod=invoice&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Nama </b></td><td><b>Nomor Invoice</b></td><td><b>Tanggal Transaksi</b></td><td><b>Total Transaksi+Ongkir</b></td><td><b>Pembayaran</b></td><td><b>Tgl Kirim</b></td><td><b>Konfirmasi</b></td></th>
		</thead>
		<tbody>
<?php

$id=$_SESSION['idpelanggan'];
$query="SELECT invoice.*,pelanggan.nama,alamat_kirim.total_transaksi
 from invoice,pelanggan,alamat_kirim
 where invoice.idpelanggan=pelanggan.idpelanggan and invoice.noinvoice=alamat_kirim.noinvoice
 and pelanggan.idpelanggan='$id'
";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $result+$no
				?></td>
			
				<td><?php echo $rows -> nama; ?></td>
			<td><a href='index.php?mod=chart&pg=invoice_detail&total=<?php echo $rows ->total_transaksi ?>&id=<?php echo $rows -> noinvoice; ?>'><?php echo $rows -> noinvoice; ?></a></td>
			<td><?php echo $rows -> tanggal; ?></td>
			<td><?php echo format_rupiah($rows ->total_transaksi); ?></td>
			<td><?php echo get_status_invoice($rows -> transfer); ?></td>
			<td><?php echo tglkirim($rows -> tglkirim); ?>
				
				</td>
			
				<td>
				 <a title='Konfirmasi Ulang Alamat'href="index.php?mod=chart&pg=ongkir&total_bayar=<?php echo $rows -> totalbayar; ?>&kd_transaksi=<?php echo $rows -> noinvoice; ?>"><button type="submit" class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i>Alamat</button></a>
                 
                 <a title='Konfirmasi Bukti Pembayaran'href="index.php?mod=chart&pg=konfirmasi&id=<?php echo $rows -> noinvoice; ?>"><button type="submit" class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i>Bukti Bayar</button></a>
				 </td>
			
				
			</tr>
			<?php $no++;
				}
			?>

			
		</tbody>
	</table>


</div>
	
		
<?php
include('inc/sidebar-front.php');
?>
	</div>
</section>	
