<?php
$baca = $rows['dibaca'] + 1;
$total_komentar = $this->model_utama->view_where('komentar', array('id_berita' => $rows['id_berita']))->num_rows();
?>
<main id="main" class="mt-5">
	<div class="sh-table sh-titlebar-content sh-titlebar-height-medium">
		<div class="titlebar-title sh-table-cell">

			<h2>
				Blog Post </h2>

		</div>
		<div class="title-level sh-table-cell">

			<div id="breadcrumbs" class="breadcrumb-trail breadcrumbs"><span class="item-home"><a class="bread-link bread-home" href="https://jevelin.shufflehound.com/" title="Home">Home</a></span><span class="separator"> &gt; </span><span class="item-cat"><a href="https://jevelin.shufflehound.com/category/uncategorized/">Uncategorized</a></span><span class="separator"> &gt; </span><span class="item-current item-4271"><span class="bread-current bread-4271" title="The team watchers">The team watchers</span></span></div>
		</div>
	</div>
</main>