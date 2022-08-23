<body>
    <section class="main">
        <div class="container">  
            <div class="d-flex justify-content-center">          
                <img width="180" height="81" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
            </div>
        
            <div class="heading text-center">
                <p>Touch One Card And Read Today's Message From The Holy Mother</p>
            </div>
            <div class="card-wrapper">
                <div class="deck">
                    <?php 
                    for($index = 0; $index < 12; $index++){
                        echo "<a class='card_main card-" . $index . " card-yes-no-tarot' href='#'>";
                        echo "<img src='" . base_url() . "assets/img/card-back.png'>";
                        echo "</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>