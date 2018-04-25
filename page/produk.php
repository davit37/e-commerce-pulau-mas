<?php
//cek_akses_langsung();
?>
<section class="main-content">

	<div class="row">
		<div class="span9">
			<ul class="thumbnails listing-products">
				
				<?php 
				
				//Digunakan untuk membaca hak akses melalui level
				$idpelanggan=$_SESSION['idpelanggan'];
				$query2 = "select pelanggan.level from pelanggan where pelanggan.idpelanggan='$idpelanggan'";
				$result2 = mysql_query($query2) or die(mysgl_error());
				$rows2 = mysql_fetch_row($result2);
				
				$query = " SELECT produk.*,stok.* from produk,stok
				where produk.idproduk=stok.idproduk
				 ";
				$id = $_GET['idkategori'];
if(!empty($id)){				
$query = " SELECT produk.*,stok.*
 from produk,stok
  where produk.idkategori='$id'
  and produk.idproduk=stok.idproduk";
}
$result = mysql_query($query) or die(mysql_error());
$no = 1;
//proses menampilkan data
while($rows = mysql_fetch_object($result)) {
?>
				
				<li class="span3">
					<div class="product-box" >
						<span class="sale_tag"></span>
						<a href="#">    <?php
						if (!empty($rows -> foto)) {
							echo "<img style='height:230px; 'src='upload/produk/" . $rows -> foto . "' />";
						}
					?>	</a>
						<br/>
						<a href="#" class="title"><?php echo $rows->nama_produk ?></a>
						<br/>
						<a href="#" style="font-size:10px; " class="category"> <?php echo $rows->deskripsi?></a>
						<p class="price">
							<?php 
							//digunakan untuk membedakan harga hak akses
							
							if($rows2[0]=='mitra_kerja') {
								echo format_rupiah($rows->harga_mitra);
							} else{
								echo format_rupiah($rows->harga_jual);
							}  
							?>
						</p>
						<p>
							<span class="label label-warning">Stok <?php echo   get_status_stok($rows->jumlah)?></span>
						</p>
						<?php
						if(!empty($_SESSION['idpelanggan']) && ($rows->jumlah>0)){ ?>
						<a href='index.php?mod=chart&pg=chart&action=add&id=<?php echo $rows->idproduk?>' class='btn btn-warning'><i class='icon-shopping-cart icon-white'></i>Beli</a>
						<?php } ?>
					</div>
				</li>
		<?php } ?>
			<div class='clearfix'></div>
		
       
        
		</div>
<?php
include ('inc/sidebar-front.php');
?>
	</div>
</section>
