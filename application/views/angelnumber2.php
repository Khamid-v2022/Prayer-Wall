    <section class="main angel-number-v2">
        <div class="container">
            <div class="text-center title">
                <h1 class="font-46">Angel Number Reading</h2>
                <img src="<?=base_url()?>assets/img/angelwings.gif" class="tarot-spread">
                <p class="font-38 mt-3" style="color:black">Numbers are a common way for our angels to contact us.<br/> Your guardian angel is attempting to communicate with you if you have been noticing a particular number lately.</p>
            </div>
        </div>
        <div class="container">  
            <div class="google-ads-place">
                <!-- AGB mother middle -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="4888027575"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            
            <div class="row my-5"> 
                <div class="col-sm-10 mx-auto text-center"> 
                    <h2 class="text-center">Which Angel Number Do You Want To Hear From Today?</h2> 
                    <p class="mt-3 font-18">
                        <span class="step">Step 1:</span> Navigate through angel number digits from 1 to 9 below
                    </p> 
                </div> 
            </div>
            <div class="col-sm-10 mx-auto mt-3 mb-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <?php 
                        for($index = 0; $index < 10; $index++){
                            echo '<button class="nav-link ';
                            if($index == 0)
                                echo 'active';
                            echo '" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-' . $index . '" type="button" role="tab" aria-controls="nav-' . $index . '" aria-selected="';
                            if($index == 0)
                                echo 'true';
                            else 
                                echo 'false'; 
                            echo '">' . $index . '</button>';
                        }
                    ?>
                    </div>
                </nav>
                <p class="text-center mt-5 font-18">
                    <span class="step">Step 2:</span> Touch one angel number below to see your angel message for today!
                </p>
                <div class="tab-content" id="nav-tabContent">
                    <?php 
                        for($index = 0; $index < 10; $index++){
                            echo '<div class="tab-pane fade '; 
                            if($index == 0)
                                echo 'show active';
                            echo  '" id="nav-' . $index . '" role="tabpanel" aria-labelledby="nav-' . $index . '-tab">'; 

                                foreach($list[$index] as $item){
                                    echo '<a class="number" href="' . $item['link'] . '">' . $item['number'] . '</a>';
                                }
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>

            <div class="google-ads-place">
                <!-- AGB mother bottom -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="7131047537"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </section>
</body>