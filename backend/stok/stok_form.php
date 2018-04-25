<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
			$sql = "select * from stok where idstok='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form stok</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="stok/stok_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?php echo $id?>">

	<div class="control-group">
			<label class="control-label" for="idproduk">Nama Produk</label>
			<div class="controls">
				<select id='idproduk' name='idproduk' class="required " >
						<?php
   
    combo_produk($data->idproduk);
   	?>
				</select>
			</div>
		</div>
		
		
		<div class="control-group">
			<label class="control-label" for="lon">Harga Beli</label>
			<div class="controls">
				<input type="text" name='harga_beli' id='harga_beli' value='<?php echo $data->harga_beli?>' class='required'
				>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="lon">Harga Jual</label>
			<div class="controls">
				<input type="text" name='harga_jual' id='harga_jual' value='<?php echo $data->harga_jual?>' class='required'
				>
			</div>
		</div>
        
        <div class="control-group">
			<label class="control-label" for="lon">Harga Mitra</label>
			<div class="controls">
				<input type="text" name='harga_mitra' id='harga_mitra' value='<?php echo $data->harga_mitra?>' class='required'
				>
			</div>
		</div>
        
		<div class="control-group">
			<label class="control-label" for="lon">Jumlah</label>
			<div class="controls">
				<input type="text" name='jumlah' id='jumlah' value='<?php echo $data->jumlah?>' class='required'
				>
			</div>
		</div>
		

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?php echo $aksi?>'>
				<?php echo $aksi?>
				</button>
			</div>
		</div>

</form>
</div>