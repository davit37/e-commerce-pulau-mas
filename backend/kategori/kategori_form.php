<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	

				$aksi = 'tambah';
				if(isset($_GET['id'])) {
					$aksi = "edit";
					$id = $_GET['id'];
					//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
					$sql = "select * from kategori where idkategori='$id' ";
					$result = mysql_query($sql) or die(mysql_error());
					$baris = mysql_fetch_object($result);

				} else {
					$aksi = "tambah";
				}?>

<form  id="form1" class="form-horizontal" method="POST" 
enctype="multipart/form-data" action="kategori/kategori_action.php">
	<legend>
		kategori
	</legend>
	<input type='hidden' name='id' value="<?php echo $id?>">
	<div class="control-group">
		<label class="control-label" for="nama">Nama kategori</label>
		<div class="controls">
			<input type="text" name='nama_kategori'
			palceholder='Masukan Kategori'
			>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value=<?php echo $aksi?>>
			<?php echo $aksi
			?>
			</button>
			</div>
			</div>
			</form>
			