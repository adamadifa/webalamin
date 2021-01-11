<?php
$baca = $rows['dibaca'] + 1;
$total_komentar = $this->model_utama->view_where('komentar', array('id_berita' => $rows['id_berita']))->num_rows();
?>
<div class="container-fluid" style="margin-top:130px">

	<div class="row">

		<!-- Post Content Column -->
		<div class="col-lg-8">
			<!-- Title -->
			<div class="card">
				<div class="card-body">
					<h1 style="font-family: Cabin;"><?php echo "<b>$rows[judul]</b> <br><span style='font-size:14px; color:blue'>$rows[sub_judul] </span>"; ?></h1>
					<!-- Author -->
					<p class="lead">
						by
						<span class="badge badge-warning"><?php echo "$rows[nama_lengkap]"; ?></span>
					</p>
					<hr>
					<!-- Date/Time -->
					<p>Posted on <span class="badge badge-success"> <?php echo tgl_indo($rows['tanggal']) . ", $rows[jam] WIB"; ?></span></p>

					<hr>
					<!-- Preview Image -->
					<?php
					if ($rows['gambar'] != '') {
						echo "<img class='img-fluid rounded w-100' src='" . base_url() . "asset/foto_berita/$rows[gambar]' alt='$rows[judul]' />";
					}
					if ($rows['keterangan_gambar'] != '') {
						echo "<center><p><i><b>Keterangan Gambar :</b> $rows[keterangan_gambar]</i></p></center><br>";
					}
					?>

					<hr>
					<!-- Post Content -->
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

					echo "$content<hr>
								<div class='fb-like'  data-href='" . base_url() . "$rows[judul_seo]' 
									data-send='false'  data-width='600' data-show-faces='false'>
								</div> <br><br>";
					?>

					<hr>

					<!-- Comments Form -->
					<div class="card my-4">
						<h5 class="card-header">Leave a Comment:</h5>
						<div class="card-body">
							<form>
								<div class="form-group">
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>

					<!-- Single Comment -->
					<div class="media mb-4">
						<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
						<div class="media-body">
							<h5 class="mt-0">Commenter Name</h5>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
						</div>
					</div>

					<!-- Comment with nested comments -->
					<div class="media mb-4">
						<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
						<div class="media-body">
							<h5 class="mt-0">Commenter Name</h5>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

							<div class="media mt-4">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
								<div class="media-body">
									<h5 class="mt-0">Commenter Name</h5>
									Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								</div>
							</div>

							<div class="media mt-4">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
								<div class="media-body">
									<h5 class="mt-0">Commenter Name</h5>
									Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Sidebar Widgets Column -->
		<div class="col-md-4">
			<!-- Search Widget -->
			<div class="card my-4">
				<h5 class="card-header">Share this Article</h5>
				<div class="card-body">
					<script language="javascript">
						document.write("<a href='http://www.facebook.com/share.php?u=" + document.URL + " ' target='_blank' class='custom-soc icon-text'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
					</script>

				</div>
			</div>

			<!-- Categories Widget -->
			<div class="card my-4">
				<h5 class="card-header">Categories</h5>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-6">
							<ul class="list-unstyled mb-0">
								<li>
									<a href="#">Web Design</a>
								</li>
								<li>
									<a href="#">HTML</a>
								</li>
								<li>
									<a href="#">Freebies</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-6">
							<ul class="list-unstyled mb-0">
								<li>
									<a href="#">JavaScript</a>
								</li>
								<li>
									<a href="#">CSS</a>
								</li>
								<li>
									<a href="#">Tutorials</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!-- Side Widget -->
			<div class="card my-4">
				<h5 class="card-header">Side Widget</h5>
				<div class="card-body">
					You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
				</div>
			</div>

		</div>

	</div>
	<!-- /.row -->

</div>