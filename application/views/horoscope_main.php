    <section class="main">
        <div class="container">  
            <div class="d-flex align-items-center  flex-column">
                <?php if($error){?>
                    <p class="text-danger"><?=$error?></p>
                <?php }?>
                <h1>Horoscopes</h1>
                <p>What do the Stars have in store for you today? Find out and take a glimpze into your future</p>
            </div>
            <div class="google-ads-place">
                <!-- angelgrace horoscope top -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="9252372162"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <!-- <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
            </div>
        </div>
        <div class="container text-center">  
            <h3 class="mb-3">Daily Horoscopes</h3>
            <div class="horoscopes">
                <a type="button" class="horoscope-btn" data-name="Aries">
                    <img src="<?=base_url()?>assets/img/horoscope/aries.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Taurus">
                    <img src="<?=base_url()?>assets/img/horoscope/taurus.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Gemini">
                    <img src="<?=base_url()?>assets/img/horoscope/gemini.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Cancer">
                    <img src="<?=base_url()?>assets/img/horoscope/cancer.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Leo">
                    <img src="<?=base_url()?>assets/img/horoscope/leo.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Virgo">
                    <img src="<?=base_url()?>assets/img/horoscope/virgo.png" alt="" class="horoscope-icon" loading="lazy">
                </a>     
                <a type="button" class="horoscope-btn" data-name="Libra">
                    <img src="<?=base_url()?>assets/img/horoscope/libra.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Scorpio">
                    <img src="<?=base_url()?>assets/img/horoscope/scorpio.png" alt="" class="horoscope-icon" loading="lazy">
                </a>     
                <a type="button" class="horoscope-btn" data-name="Sagittarius">
                    <img src="<?=base_url()?>assets/img/horoscope/sagittarius.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Capricorn">
                    <img src="<?=base_url()?>assets/img/horoscope/capricorn.png" alt="" class="horoscope-icon" loading="lazy">
                </a>
                <a type="button" class="horoscope-btn" data-name="Aquarius">
                    <img src="<?=base_url()?>assets/img/horoscope/aquarius.png" alt="" class="horoscope-icon" loading="lazy">
                </a>     
                <a type="button" class="horoscope-btn" data-name="Pisces">
                    <img src="<?=base_url()?>assets/img/horoscope/pisces.png" alt="" class="horoscope-icon" loading="lazy">
                </a>    
            </div>
        </div>

        <div class="container">
            <div class="google-ads-place">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-format="autorelaxed"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="3812612726"></ins>
               <!--  <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
            </div>
        </div>
    </section>
</body>