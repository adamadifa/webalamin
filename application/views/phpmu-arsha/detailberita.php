<?php
$baca = $rows['dibaca'] + 1;
$total_komentar = $this->model_utama->view_where('komentar', array('id_berita' => $rows['id_berita']))->num_rows();
?>
<div class="container-fluid" style="margin-top:100px">
	<div class="row">
		<div class="col-md-12">
			<div class="sh-titlebar sh-titlebar-mobile-layout-compact sh-titlebar-mobile-title-on">
				<div class="container">
					<h4 style="font-family: Montserrat;">Blog Post </h4>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
			if ($rows['gambar'] != '') {
				echo "<img  class='img-fluid rounded mt-3' src='" . base_url() . "asset/foto_berita/$rows[gambar]' alt='$rows[judul]' /></a><br><br>";
			}
			if ($rows['keterangan_gambar'] != '') {
				echo "<center><p><i><b>Keterangan Gambar :</b> $rows[keterangan_gambar]</i></p></center><br>";
			}
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			?>
			<h2 style="font-family:Montserrat; color:#505050"><?php echo "<b>$rows[judul]</b> <br><span style='font-size:14px; color:blue'>$rows[sub_judul] </span>"; ?></h2>
			<div class="mb-2">
				<span class="badge badge-success"> <?php echo "$rows[nama_lengkap]"; ?> </span>
				<span class="badge badge-primary"> <?php echo tgl_indo($rows['tanggal']) . ", $rows[jam] WIB"; ?> </span>
				<a href="<?php echo base_url() . "kategori/detail/$rows[kategori_seo]"; ?>"><span class="tag badge badge-dark"><?php echo "$rows[nama_kategori]"; ?></span></a>
			</div>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-google"></a>
			<p style="font-family: Montserrat; text-align:right !important">
				<?php
				$paragraph = explode("</p>", $rows['isi_berita']);
				if (empty($paragraph[3])) {
					$content = $paragraph[0] . $paragraph[1] . $paragraph[2] . "</p>";
				} else {
					$content = $paragraph[0] . $paragraph[1] . $paragraph[2] . "</p>";
					$content .= "<h4>Baca Lainnya : </h4><ul>";
					$pisah_kata  = explode(",", $rows['tag']);
					$jml_katakan = (int)count($pisah_kata);
					$jml_kata = $jml_katakan - 1;
					$ambil_id = substr($rows['id_berita'], 0, 4);
					$cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (";
					for ($i = 0; $i <= $jml_kata; $i++) {
						$cari .= "tag LIKE '%$pisah_kata[$i]%'";
						if ($i < $jml_kata) {
							$cari .= " OR ";
						}
					}
					$cari .= ") ORDER BY id_berita DESC LIMIT 5";
					$hasil  = $this->db->query($cari);
					foreach ($hasil->result_array() as $row) {
						$total_komentar_terkait = $this->model_utama->view_where('komentar', array('id_berita' => $row['id_berita']))->num_rows();
						$content .= "<li style='padding:0px'><a style='color:blue' href='" . base_url() . "$row[judul_seo]''>$row[judul]</a><a href='#' class='h-comment'>$total_komentar_terkait</a></li>";
					}
					$content .= "</ul>";

					for ($i = 3; $i <= count($paragraph) - 1; $i++) {
						$content .= $paragraph[$i];
					}
				}

				echo "$content<hr>";
				?>
			</p>
			<?php
			$ia = $this->model_utama->view_ordering_limit('iklantengah', 'id_iklantengah', 'ASC', 3, 1)->row_array();
			echo "<a href='$ia[url]' target='_blank'>";
			$string = $ia['gambar'];
			if ($ia['gambar'] != '') {
				if (preg_match("/swf\z/i", $string)) {
					echo "<embed style='margin-top:-10px' src='" . base_url() . "asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
				} else {
					echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='" . base_url() . "asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
				}
			}
			echo "</a>";
			?>

		</div>
	</div>
</div>