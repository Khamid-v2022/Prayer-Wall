    <div class="daily-horoscope">
        <section class="main">
            <div class="container">
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
                <div class="d-flex">
                    <div class="horoscope-detail-wrapper ">
                        <div class="d-flex mb-5">
                            <div>
                                <img src="<?=base_url()?>assets/img/horoscope/<?=strtolower($sel_horo)?>.png" class="horoscope-icon">
                            </div>
                            <div class="ps-3 pt-2">
                                <input type="hidden" value="<?=$sel_horo?>" id="sel_horo">
                                <h1><?=$sel_horo?></h1>
                                <h5>Daily Horoscope For <?=$response->current_date?></h5>
                                <div class="mt-4">
                                    <button class="btn <?=$sel_date=='yesterday'?'btn-primary':'btn-secondary'?> me-2 mt-2 horoscope-select-date" data-date="yesterday">Yesterday</button>
                                    <button class="btn <?=$sel_date=='today'?'btn-primary':'btn-secondary'?> me-2 mt-2 horoscope-select-date" data-date="today">Today</button>
                                    <button class="btn <?=$sel_date=='tomorrow'?'btn-primary':'btn-secondary'?> mt-2 horoscope-select-date"  data-date="tomorrow">Tomorrow</button>
                                </div>
                            </div>
                        </div>
                        <div class="daily-horoscope-description">
                            <p id="description"><?=$response->description?></p>
                            <div>
                                <label class="form-label">Favorite Color: </label><span id="favorite_color"><?=$response->color?></span>
                            </div>
                            <div>
                                <label class="form-label">Lucky Number: </label><span id="lucky_number"><?=$response->lucky_number?></span>
                                </div>
                            <div>
                                <label class="form-label">Lucky Time: </label><span id="lucky_time"><?=$response->lucky_time?></span>
                            </div>
                            <div>
                                <label class="form-label">Mood: </label><span id="mood"><?=$response->mood?></span>
                            </div>
                        </div>
                        <div class="click-here-wrapper mt-4 mb-4">
                            <p data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-bottom: 1px !important;">
                                <a id="click-here-btn" href="https://angelgraceblessing.com/callofdestiny" style="margin-right: .5em;cursor:pointer" target="_blank">Click here <i class="fa fa-arrow-right"></i>
                                </a>
                                For Full Detailed Horoscope Reading
                            </p>
                        </div>
                    </div>
                    <div class="horoscopes side-horoscopes text-center d-none d-xl-block ms-3 p-3">
                        <h4>Check Out Other Horoscopes</h4>
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
                <div class="horoscopes text-center mt-5">
                    <h1 class="mb-5">More Horoscopes for You</h1>
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

                <div class="google-ads-place">
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="autorelaxed"
                         data-ad-client="ca-pub-9926134965337187"
                         data-ad-slot="3812612726"></ins>
                    <!-- <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script> -->
                </div>
            </div>
        </section>
        
    </div>
</body>