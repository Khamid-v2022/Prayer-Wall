<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Daily Horoscope</title>
  
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

<body class="daily-horoscope">
    <section class="main">
        <div class="d-flex justify-content-center pt-3">          
            <img width="300" height="119" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
        </div>
        <div class="container">  
            <div class="d-flex align-items-center  flex-column">
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
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
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
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </section>
    <script type="text/javascript" async src="//c.pubguru.net/pghb.angelgraceblessing_com.tc.js"></script>
</body>