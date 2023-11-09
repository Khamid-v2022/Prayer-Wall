    <section class="tarot-card">
        <div class="container">  
            <section class="text-center mt-5">
                <h4>Reveal Your tarot card for Today!</h4>
                <div class="card-wrapper">
                    <?php for($index = 0; $index < 7; $index++) { ?>
                    <a class="tarot-card-item tarot-card-item-<?=$index?>" href="javascript:;">
                        <img src="<?=base_url()?>assets/img/card_face.png" alt="" loading="lazy">
                    </a>
                    <?php } ?> 
                </div>
            </section>
        </div>
    </section>
</body>
