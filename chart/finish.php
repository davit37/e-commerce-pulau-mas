<a href='index.php?mod=chart&pg=invoice' class='btn btn-warning'>
		<i class='icon-arrow-left icon-white'></i>Back</a>
        
<section class="main-content">

	<div class="row">
		<div class="span9">
<div class='span8 offset1'>	
<?php
$kd_transaksi = $_GET['kd_transaksi'];
$totalBayar = $_GET['total_bayar'];?>

<h3> Selamat,Transaksi sukses di lakukan</h2>
<h3> Kode Pesan :<?php echo $kd_transaksi;?></h2>
<h3>Total Transaksi :<?php echo format_rupiah($totalBayar);?></h2>


</h2>
<p>
	<b>Silahkan Transfer Uang Ke : </b>
</p>
<blockquote>
	Indra Jaya
	<br>
	BNI  Lubuklinggau
	<br>
	No 051-3974573-IDR
	<br>
</blockquote>
 
<hr>
<p>
	Langkah selanjutnya :
	<ol>
	<li>Silahkan transfer sesuai dengan uang jumlah total transaksi</li> 
	<li>Konfirmasi lewat SMS /Telp ke no 0852 7339 1278 </li>
	<li>Cek status pembayaran dan pengiriman barang di halaman invoice </li>
	</ol>
</p>
</div>		
		</div>
<?php
include('inc/sidebar-front.php');
?>
	</div>
</section>		
