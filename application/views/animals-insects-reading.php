    <section class="animal-reading-page">
        <div class="main-wrapper">
            <div class="container">  
                <div class="google-ads-place">
                    <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="3060443802"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                </div>

                <div class="d-flex align-items-center flex-column mt-5">
                    <h1 style="color: mediumvioletred;">What does it mean to see a <?=$animal_name?>?</h1>
                </div>
                <div class="animal-main-wrapper">
                    <div class="text-center">
                        <img src="<?=base_url()?>assets/img/animalls/individual-animals/<?=strtolower($animal_name)?>-reading.jpg" alt="" class="animall-img" loading="lazy">
                    </div>
                    <div class="animal-description">
                        <?=$information?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="google-ads-place">
                <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9926134965337187"
                 data-ad-slot="1747362135"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            </div>
            <h1 class="text-center">9 Spiritual Meanings.</h1>
            <h3 class="text-center">One Answer. Reveal your answer now!</h3>
            <div class="row card-wrapper">
                <?php for($index = 0; $index < 9; $index++) { ?>
                    <div class="col-4 card-item-wrapper">
                        <a type="button" class="animall-item-btn mt-5" data-animal_name = "<?=$animal_name?>">
                            <img src="<?=base_url()?>assets/img/animalls/<?=$animal_name?>-tarot-card.png" alt="" class="animal-card-img" loading="lazy">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="google-ads-place">
                <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9926134965337187"
                 data-ad-slot="9434280460"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            </div>
        </div>
    </section>
</body>