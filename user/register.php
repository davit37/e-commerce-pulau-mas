

<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<?php
						//jika login gagal 
						if($_GET['loginerror']){
							echo "<p class='text-error'>Maaf Login Gagal!</p>";
													}	?>		
						<form id='form1' action="user/login_action.php"  method="post" class=''>
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">E-Mail</label>
									<div class="controls">
										<input type="text" name='email' placeholder="Masukan email" id="email" class="input-xlarge required email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="masukan password" id="password" class="input-xlarge required" name='password' > 
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Login">
									<hr>
									
								</div>
							</fieldset>
						</form>	
						
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<?php
						//jika login gagal 
						if(isset($_GET['status'])){
							if($_GET['status']==0){
								echo "<p class='text-success'>Proses Registrasi  Berhasil, Silahkan Login!</p>";
							}else {
							echo "<p class='text-error'>Proses Registrasi  Gagal!</p>";
							}						}	?>		
						<form action="user/register_action.php"  id='form2' method="post" class="form-horizontal">
							<fieldset>
									<div class="control-group">
		<label class="control-label" for="nama">Nama Pelanggan</label>
		<div class="controls">
			<input type="text" name='nama' placeholder='Masukkan Nama' class='required'>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Jenis Kelamin</label>
		<div class="controls">
			<select name='kelamin' >
				<option value='L'>Laki laki</option>
				<option value='P'>Perempuan</option>
			</select>
			
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >E_Mail</label>
		<div class="controls">
			<input type="text" name='email' id='email' placeholder='Masukkan E_Mail' class='required email'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Password</label>
		<div class="controls">
			<input type="password" name='password' id='password' placeholder='Masukkan Password' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Telepon</label>
		<div class="controls">
			<input type="text" name='telp' id='telp' placeholder='Masukkan Telp' class='required'
			>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" >Nomor Pin</label>
		<div class="controls">
			<input type="text" name='telp' id='telp' placeholder='Masukkan Telp' class='required'
			>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" >Kota</label>
		<div class="controls">
			<input type="text" name='kota' id='kota' placeholder='Masukkan Kota' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" >Kode Post</label>
		<div class="controls">
			<input type="text" name='kodepos' id='kodepos' placeholder='Masukkan Kode Pos' class='required'
			>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="alamat">Alamat</label>
		<div class="controls">
			<textarea name='alamat' class="input-xlarge" placeholder='Masukkan Alamat'></textarea>
		</div>
	</div>

	
	


	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value='register'>
				Register
			</button>
		</div>
	</div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			