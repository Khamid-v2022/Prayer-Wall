<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Prayer Quiz</title>
  
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
    <section class="main love-quiz">
        <div class="d-flex justify-content-center pt-3">          
            <img width="300" height="119" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
        </div>

        <div class="google-ads-place">
           <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-9926134965337187"
                data-ad-slot="6920053024"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>


        <div class="text-center py-5">
            <h1 class="font-46" style="color: rgba(00, 204, 255)"> Choose Your Area of Prayer </h2>
        </div>
        
        <div class="container">  
            <div class="row d-flex align-items-center justify-content-center my-5">
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn" data-topic="love-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/love.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Love
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn" data-topic="wealth-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/wealth.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Wealth
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn" data-topic="protection-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/protection.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Protection 
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn " data-topic="health-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/health.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Health
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn " data-topic="forgiveness-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/forgiveness.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Forgiveness
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn" data-topic="wisdom-prayer" >
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/wisdom.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Wisdom 
                            </div>
                        </div>
                    </a>
                </div>  

                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn " data-topic="growth-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/growth.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Growth 
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn " data-topic="strength-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/strength.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Strength 
                            </div>
                        </div>
                    </a>
                </div>   
                <div class="flip-box col-md-4 col-6">
                    <a href="javascript:;" class="quiz-btn" data-topic="clarity-prayer">
                        <div class="flip-container flip-box-inner">
                            <div class="flip-box-front">
                                <img src="<?=base_url()?>assets/img/prayer-quiz/clarity.jpg" >
                            </div>
                            <div class="flip-box-title">
                                Clarity 
                            </div>
                        </div>
                    </a>
                </div>  
            </div>
        </div>

        <div class="google-ads-place">
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-9926134965337187"
                data-ad-slot="8727371988"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </section>
    <script type="text/javascript" async src="//c.pubguru.net/pghb.angelgraceblessing_com.tc.js"></script>
</body>