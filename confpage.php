<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('defines.php');

?>
<main xmlns="http://www.w3.org/1999/html">

	<!--   debut du projet-->


	<div id="wrapper_conf">
		<img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
		<p>Merci de nous avoir contacté ! </p>
		<p>Nous vous répondrons sous peu! </p>

	<div class="link">
		<a href="<?= HOME_PAGE ?>"><?= HOME_PAGE_NAME?></a>
	</div>

	</div>

</main>
<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>
