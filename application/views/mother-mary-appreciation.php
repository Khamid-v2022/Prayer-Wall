    <section class="mother-mary-appreciation-page">
        <div class="title-wrapper">
            <div class="container">  
                <h2 class="mt-5 text-center main-title">Today's Message from Mother Mary:</h2>
                <h1 class="mb-5 text-center stop-message">APPRECIATE!</h1>
                <div class="text-center">
                    <img src="<?=base_url()?>assets/img/mothermaryappreciationbg.png" style="max-width: 500px; height: auto;">
                </div>
                <div class="google-ads-place">
                    <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-9926134965337187"
                     data-ad-slot="3220163230"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-3">
                <h1 style="color:tomato;">Pick ONE of the 9 Cards</h1>
                <h3>Below for the FULL Message</h3>
            </div>
            <div class="text-center py-3">
                <img src="<?=base_url()?>assets/img/separator.png" style="height: 60px; width: auto">
            </div>
            <div class="row card-wrapper">
                <?php 
                for($index = 0; $index < 9; $index++){
                    echo "<div class='col-4 mt-4'>";
                    echo "<a class='mother-mary-card-item' href='javascript:;'>";
                    echo "<img src='" . base_url() . "assets/img/mother-mary-appreciation.png'>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="mt-5 mx-auto" style="max-width: 800px">
                <h3 class="text-center">Honoring Mother Mary: A Beacon of Faith and Devotion</h3>
                <p>In the tapestry of religious devotion, few figures shine as brightly as Mother Mary. Across cultures, continents, and centuries, her grace and compassion have woven a thread of solace and hope in the hearts of millions. As we gather on this page, we honor her timeless presence and the profound impact she continues to have on our lives.</p><p>
                Mother Mary, revered as the Mother of Jesus Christ in Christianity, embodies the epitome of love, strength, and unwavering faith. From the moment of the Annunciation to her tender presence at the foot of the cross, her journey is a testament to courage in the face of adversity and compassion in the midst of suffering.</p><p>
                Through prayers, hymns, and devotions, believers seek solace and guidance in her intercession. Her gentle spirit offers comfort to the weary, healing to the afflicted, and hope to the downtrodden. In times of joy, she rejoices with us, and in times of sorrow, she embraces us with her motherly embrace.</p><p>
                But Mother Mary's influence extends far beyond the confines of religious doctrine. She is a symbol of maternal love, a beacon of light in the darkness, and a source of inspiration for all who seek guidance on their spiritual journey. Regardless of creed or denomination, her message transcends boundaries, uniting hearts in a shared reverence for the divine feminine.</p><p>
                On this page, we celebrate her myriad titles – Mother of Mercy, Queen of Heaven, Our Lady of Grace – each a testament to her multifaceted presence in our lives. Through reflections, testimonials, and shared prayers, we deepen our connection to her boundless love and grace.</p><p>
                As we navigate the complexities of modern life, may we draw strength from Mother Mary's example of humility, faith, and unwavering devotion. Let us emulate her virtues of compassion and kindness, spreading love and healing in a world often fraught with division and despair.</p><p>
                Together, let us honor Mother Mary – our guiding star, our intercessor, our eternal mother – with hearts full of gratitude and reverence. In her embrace, we find solace; in her prayers, we find hope; and in her love, we find eternal peace. Amen.</p>
            </div>
            <div class="google-ads-place my-4">
                <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="autorelaxed"
                 data-ad-client="ca-pub-9926134965337187"
                 data-ad-slot="8280918227"></ins>
            </div>
        </div>

    </section>
</body>