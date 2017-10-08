<div id="kiri">

	<?php 
		
		echo kategori($kategori_id);
	
	?>
	
</div>
	
	
	<div id="frame-barang">

		<ul>
			<?php
				if($cari = $_POST['cari']){
					$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND nama_barang LIKE '%$cari%' ORDER BY rand() DESC LIMIT 9");
				}else{
					$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
				}
				
				$no=1;
				while($row=mysqli_fetch_assoc($query)){
					
					$style=false;
					if($no == 3){
						$style="style='margin-right:0px'";
						$no=0;
					}
					
					echo "<li $style>
							<p class='price'>".rupiah($row['harga'])."</p>
							<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
								<img src='".BASE_URL."images/barang/$row[gambar]' />
							</a>
							<div class='keterangan-gambar'>
								<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
								<span>Stok : $row[stok]</span>
							</div>
							<div class='button-add-cart'>
								<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>Tambahkan Ke Kantung Belanja</a>
							</div>";
					
					$no++;
				}
			
			?>
		</ul>
	</div>

</div>