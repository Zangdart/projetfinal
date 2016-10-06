<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('defines.php');
?>
    <div id="propos">
        <!--    laisser car img se trouve dedans-->
    </div>

    <div id="wrapper">
        <h1 class="center">Volition : Nos réalisations</h1>

        <div id="owl-demo" class="owl-carousel owl-theme">

            <div class="item"><img src="<?= IMG_PATH . PHOTO7 ?>" alt="<?= ALT ?>"/></div>
            <div class="item"><img src="<?= IMG_PATH . PHOTO4 ?>" alt="<?= ALT ?>"/></div>
            <div class="item"><img src="<?= IMG_PATH . PHOTO5 ?>" alt="<?= ALT ?>"/></div>
            <div class="item"><img src="<?= IMG_PATH . PHOTO4 ?>" alt="<?= ALT ?>"/></div>


        </div>

        <div id="trois-container">
            <div class="trois">
                <figure>
                    <img src="<?= IMG_PATH . PHOTO7 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC3?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO4 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC1?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO5 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC2?></figcaption>
                </figure>
            </div>

            <div class="trois">
                <figure>
                    <img src="<?= IMG_PATH . PHOTO12 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO10 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC4?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO11 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC5?></figcaption>
                </figure>
            </div>

            <div class="trois">
                <figure>
                    <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC?></figcaption>
                </figure>
                <figure>
                    <img src="<?= IMG_PATH . PHOTO1 ?>" alt="<?= ALT ?>"/>
                    <figcaption><?= FGC?></figcaption>
                </figure>
            </div>
        </div>

    </div> <!--fin du wrapper-->



<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>