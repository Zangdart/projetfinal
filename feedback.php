<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('defines.php');
?>

    <div id="wrapper">

<div id="owl-demo" class="owl-carousel owl-theme">

<div class="item"><img src="assets/img/demo-slides/zombie.png"/></div>
<div class="item"><img src="assets/img/demo-slides/grab.png"/></div>
<div class="item"><img src="assets/img/demo-slides/multi.png"/></div>
<div class="item"><img src="assets/img/demo-slides/touch.png"/></div>

</div>

<div id="trois-container">
    <div class="trois">
        <figure>
            <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
            <figcaption>Réalisation d'une pokeball.</figcaption>
        </figure>
        <figure>
            <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
            <figcaption>Réalisation d'une pokeball.</figcaption>
        </figure>
        <figure>
            <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
            <figcaption>Réalisation d'une pokeball.</figcaption>
        </figure>
    </div>

        <div class="trois">
            <figure>
                <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                <figcaption>Réalisation d'une pokeball.</figcaption>
            </figure>
            <figure>
                <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                <figcaption>Réalisation d'une pokeball.</figcaption>
            </figure>
            <figure>
                <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                <figcaption>Réalisation d'une pokeball.</figcaption>
            </figure>
        </div>
</div>
        <div class="link">
            <a href="<?= GFDB ?>"><?= GFDB_PAGE_NAME?></a>
        </div>

    </div> <!--fin du wrapper-->



<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>