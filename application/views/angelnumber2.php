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
                <!-- <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
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

            <div class="container my-4">
                <h1 class="mb-3 text-center">How Angels Can Contact Us Through Numbers</h1>
                <p>
                    Angels have long been a subject of fascination and intrigue for many people. Some believe that these celestial beings are constantly watching over us, guiding and protecting us in our daily lives. But how can we communicate with angels? One fascinating theory is that angels can contact us through numbers.
                </p>
                <p>
                    Numerology, the belief in the mystical significance of numbers, suggests that angels can communicate with us by repeatedly showing us certain numbers in our daily lives. These numbers, known as angel numbers, are believed to hold specific messages and guidance from the spiritual realm.
                </p>
                <p>
                    Each number carries its own unique meaning, and angels can use them to provide us with reassurance, guidance, and even warnings. For example, seeing the number 1111 repeatedly may indicate that the angels are inviting you to pay attention to your thoughts and desires, as they have the power to manifest them into reality.
                </p>
                <p>
                    Angel numbers can appear in various ways, such as on license plates, clocks, phone numbers, or even as a total on a bill. Many people report seeing these numbers in times of doubt or confusion, offering them a sense of comfort and support.
                </p>
                <p>
                    To interpret angel numbers, it is important to pay attention to your intuition and the circumstances surrounding their appearance. Often, the meaning of angel numbers can be deeply personal and may vary from person to person. For instance, seeing the number 777 might indicate that you are on the right path, and your efforts are being supported and blessed by the angels. However, for someone else, it might have a completely different connotation based on their own experiences and beliefs.
                </p>
                <p>
                    To invite the presence of angels and their guidance through numbers, it is recommended to stay open-minded, observe the patterns in your everyday life, and keep a journal of the angel numbers you encounter. By doing so, you can gain a deeper understanding of the messages they hold and apply their guidance to your life.
                </p>
                <p>
                    While the concept of angels communicating through numbers may seem abstract to some, it offers a sense of connection to something beyond the physical realm. Whether or not you fully embrace this belief, recognizing and acknowledging the presence of angel numbers can serve as a reminder to remain hopeful, trusting, and open to divine guidance in our lives.
                </p>
            </div> 

            <div class="google-ads-place">
                <!-- AGB mother bottom -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="7131047537"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <!-- <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script> -->
            </div>
        </div>
    </section>
</body>