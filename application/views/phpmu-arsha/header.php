<?php
echo "
<div class='container d-flex align-items-center'>";
$iden = $this->model_utama->view('identitas')->row_array();
$logo = $this->model_utama->view_ordering_limit('logo', 'id_logo', 'DESC', 0, 1);

echo "
<h1 class='logo mr-auto'><a href='index.html'>";
foreach ($logo->result_array() as $row) {
	echo "<a href='" . base_url() . "'><img style='max-height:70px' src='" . base_url() . "asset/logo/$row[gambar]'/></a>";
}
echo "
</h1>
<nav class='nav-menu d-none d-lg-block'>
";
function main_menu()
{
	$ci = &get_instance();
	$query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM menu where aktif='Ya' AND position='Bottom' order by urutan");
	$menu = array('items' => array(), 'parents' => array());
	foreach ($query->result() as $menus) {
		$menu['items'][$menus->id_menu] = $menus;
		$menu['parents'][$menus->id_parent][] = $menus->id_menu;
	}
	if ($menu) {
		$result = build_main_menu(0, $menu);
		return $result;
	} else {
		return FALSE;
	}
}

function build_main_menu($parent, $menu)
{
	$html = "";
	if (isset($menu['parents'][$parent])) {
		if ($parent == '0') {
			$html .= "<ul>
		            			<li><a href='" . base_url() . "'>Beranda</a></li>";
		} else {
			$html .= "<ul>";
		}
		foreach ($menu['parents'][$parent] as $itemId) {
			if (!isset($menu['parents'][$itemId])) {
				if (preg_match("/^http/", $menu['items'][$itemId]->link)) {
					$html .= "<li ><a target='_BLANK' href='" . $menu['items'][$itemId]->zlink . "'>" . $menu['items'][$itemId]->nama_menu . "</a></li>";
				} else {
					$html .= "<li><a href='" . base_url() . '' . $menu['items'][$itemId]->link . "'>" . $menu['items'][$itemId]->nama_menu . "</a></li>";
				}
			}
			if (isset($menu['parents'][$itemId])) {
				if (preg_match("/^http/", $menu['items'][$itemId]->link)) {
					$html .= "<li><a target='_BLANK' href='" . $menu['items'][$itemId]->link . "'><span>" . $menu['items'][$itemId]->nama_menu . "</span></a>";
				} else {
					$html .= "<li class='drop-down'><a href='" . base_url() . '' . $menu['items'][$itemId]->link . "'><span>" . $menu['items'][$itemId]->nama_menu . "</span></a>";
				}
				$html .= build_main_menu($itemId, $menu);
				$html .= "</li>";
			}
		}
		$html .= "</ul>";
	}
	return $html;
}
echo main_menu();
echo "
</nav>
<a href='#' class='get-started-btn scrollto'>Daftar</a>
</div>

";
