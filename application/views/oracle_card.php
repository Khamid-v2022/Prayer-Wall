<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Oracle Cards</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico" sizes="32x32">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="<?=base_url()?>assets/plugin/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/app.css">
  <script type="text/javascript" src="<?=base_url()?>assets/js/app.js"></script>
  <script type="text/javascript">
    var site_url = "<?=site_url()?>";
  </script>
</head>

<body>
    <section class="main">
        <div class="d-flex justify-content-center pt-3">          
            <img width="300" height="119" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
        </div>
        <div class="google-ads-place">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9926134965337187" crossorigin="anonymous"></script>
            <!-- AGB mother top -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-9926134965337187"
                 data-ad-slot="2289784390"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        
        <div class="text-center py-5" style="background: rgba(00, 204, 255);">
            <h1 class="text-white font-46">VIRGIN MARY HAS A MESSAGE FOR YOU...</h2>
            <h3 class="text-white font-38 mt-3">Seek Her Grace, Wisdom, Miracles &amp; Ultimate Protection From The Blessed Mother</h3>
            <a href="#card_container" class="btn btn-primary mt-5 btn-send"> SELECT ONE CARD FROM THE CARD SPREAD BELOW </a>
        </div>
        
        <div class="google-ads-place">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9926134965337187" crossorigin="anonymous"></script>
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
        
        <div class="container" id="card_container">  
            <div class="text-center py-3">
                <img src="<?=base_url()?>assets/img/separator.png" style="height: 60px; width: auto">
            </div>
            <div class="heading text-center">
                <p>Select One Card And Read Today's Message From Blessed Mother Mother</p>
            </div>
            <div class="card-wrapper">
                <div class="deck">
                    <?php 
                    for($index = 0; $index < 12; $index++){
                        echo "<a class='card_main card-" . $index . " card-yes-no-tarot' href='#'>";
                        echo "<img src='" . base_url() . "assets/img/card-back-2.png'>";
                        echo "</a>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="google-ads-place">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9926134965337187" crossorigin="anonymous"></script>
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
    </section>
</body>