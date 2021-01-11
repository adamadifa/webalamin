<?php
$baca = $rows['dibaca'] + 1;
$total_komentar = $this->model_utama->view_where('komentar', array('id_berita' => $rows['id_berita']))->num_rows();
?>
detailberita