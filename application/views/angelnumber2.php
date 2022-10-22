<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Angel Number</title>
  
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
    <section class="main angel-number-v2">
        <div class="d-flex justify-content-center pt-3">          
            <img width="300" height="119" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
        </div>
        <div class="container">
            <div class="text-center py-3 title">
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
    <script type="text/javascript" async src="//c.pubguru.net/pghb.angelgraceblessing_com.tc.js"></script>
</body>