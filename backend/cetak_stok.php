<?php
// memanggil library FPDF
require('../inc/fpdf181/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();

//Menambahkan Gambar


// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'TOKO PULAU MAS INDAH ELEKTRONIK',0,1,'C');

$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,7,'KOTA LUBUKLINGGAU',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(190,7,'Jl. Yos Sudarso No. 107 Kel. Jawa Kanan Kec. Lubuklinggau Timur II Telp :(0733) 321-362',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(200,1,'===============================================================================',0,1,'L');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,3,'',0,1,'C');
// mencetak string 
$pdf->Cell(190,7,'LAPORAN DATA STOK PRODUK',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(40,6,'Nama Produk',1,0,'C');
$pdf->Cell(30,6,'Nama Kategori',1,0,'C');
$pdf->Cell(34,6,'Harga Beli',1,0,'C');
$pdf->Cell(34,6,'Harga Jual',1,0,'C');
$pdf->Cell(34,6,'Harga Mitra',1,0,'C');
$pdf->Cell(15,6,'Jumlah',1,1,'C');
$pdf->SetFont('Arial','',10);

include ('../inc/config.php');
include ('../inc/function.php');
$cari=$_GET['cari'];

if($cari==''){

$query="SELECT stok.*,produk.nama_produk, kategori.nama_kategori
 from stok,produk,kategori
 where stok.idproduk=produk.idproduk and produk.idkategori=kategori.idkategori";
}else{
	$query="SELECT stok.*,produk.*, kategori.*
 from stok,produk,kategori
 where stok.idproduk=produk.idproduk and produk.idkategori=kategori.idkategori  and nama_kategori 
 like '%$cari%' ";
}
$result=mysql_query($query) or die(mysql_error());
$no=0;
$no=$no+1;
while ($row = mysql_fetch_array($result)){
    $pdf->Cell(10,6,$no,1,0,'C');
	$pdf->Cell(40,6,$row['nama_produk'],1,0);
    $pdf->Cell(30,6,$row['nama_kategori'],1,0);
    $pdf->Cell(34,6,format_rupiah($row['harga_beli']),1,0);
    $pdf->Cell(34,6,format_rupiah($row['harga_jual']),1,0);
	$pdf->Cell(34,6,format_rupiah($row['harga_mitra']),1,0);
	$pdf->Cell(15,6,$row['jumlah'],1,1,'C');

	$no++; 
	}

$pdf->SetFont('Arial','',12);

$pdf->SetX(148);
$pdf->Cell(200,10,'Lubuklinggau, '. date("j F Y"),0,1,'L');
$pdf->SetX(148);
$pdf->Cell(200,1,'Mengetahui,',0,1,'L');
$pdf->SetX(148);
$pdf->Cell(200,30,'Harsono Halim',0,1,'L');

$pdf->Output();
?>