<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('defines.php');

?>
<div id="propos">
	<!--    laisser car img se trouve dedans-->
</div>
<main xmlns="http://www.w3.org/1999/html">

	<!--   debut du projet-->


	<div id="wrapper_conf">
		<img src="<?= IMG_PATH . PHOTO8 ?>" alt="<?= ALT ?>"/>
		<div>
		<p>Merci d'avoir laissé votre critique !</p>
		<p>Nous espérons que vous avez apprécié nos services! </p>
		</div>

	<div class="link">
		<a href="<?= FDB ?>">Voir d'autres <?= FDB_PAGE_NAME?></a>
	</div>

	</div>

</main>
<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>
