
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="user-menu">
							<li><a href="index.php">Homepage</a></li>  
							<li><a href="index.php?mod=page&pg=about">About Us</a></li>
							<li><a href="index.php?mod=page&pg=contact">Contac Us</a></li>
												
						</ul>					
					</div>
					<div class="span4">
						
					</div>
					<div class="span5">
						<p style="Font-size:23px; color:#FF0000;width: 300px;" class="logo"><b>PMI GO E-COMMERCE</b></p>
						<p>PMI GO Merupakan Perusahaan Dagang Yang Menyedikan Berbagai Macam Produk Elektronik Kebutuhan Rumah Tangga.
						<br/>
						
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2017 PMI GO Ecommerce</span>
			</section>
		</div>
		<script src="assets/themes-front/js/common.js"></script>
		<script src="assets/themes-front/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
			/*
			var namaProvinsi = document.getElementById('namaProvinsi');
			var namakota = document.getElementById('namakota');
			var namaKec = document.getElementById('namaKec');
			var biaya = document.getElementById('biaya');
			var biaya1 = document.getElementById('biaya1');
			var noinvoice = document.getElementById('noinvoice');
			var totaltransaksi =document.getElementById('totaltransaksi');
			var totaltransaksi1 =document.getElementById('totaltransaksi1');
			var totalbayar =document.getElementById('totalbayar');
			console.log(namakota.innerHTML);
			console.log(namaKec.innerHTML);
			console.log(biaya.value);
			
			function getKota()
			{
				
				var prov = namaProvinsi.value;
				console.log(namaProvinsi.value)
				var request =new XMLHttpRequest();
				request.open('GET','inc/tabel_kota.php?n='+prov, false);
				request.send();
				console.log(namakota.innerHTML);
				namakota.innerHTML = request.responseText;
			}
			function getKec()
			{
				
				var kec = namakota.value;
				console.log(namaProvinsi.value)
				var request =new XMLHttpRequest();
				request.open('GET','inc/tabel_kec.php?n='+kec, false);
				request.send();
				
				namaKec.innerHTML = request.responseText;
			}
			function getBiaya()
			{
				
				var kec = namaKec.value;
				var no = noinvoice.value;
				console.log('n='+kec+'&no='+no+"kkkk")
				var request =new XMLHttpRequest();
				request.open('GET','inc/tabel_biaya.php?n='+kec+'&no='+no, false);
				request.send();
				var biayaNilai = Number.parseInt(request.responseText);
				console.log(biayaNilai);
				biaya.value = "Rp."+biayaNilai.toLocaleString('id-ID');
				var nilaiTotal =Number.parseInt(totalbayar.value) + biayaNilai;
				totaltransaksi.value= "Rp."+nilaiTotal.toLocaleString('id-ID');
				totaltransaksi1.value = nilaiTotal;
				biaya1.value = biayaNilai;
			}
			namaKec.addEventListener('click', getBiaya);
			namakota.addEventListener('click', getKec);
			namaProvinsi.addEventListener('change', getKota);
			window.addEventListener('load', getKota);
			
			*/
		</script>
       
    </body>
</html>