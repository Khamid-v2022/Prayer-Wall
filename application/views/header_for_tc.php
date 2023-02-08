<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title><?=$title?></title>
  
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
  <section class="window-menu d-none d-xl-block">
    <div class="d-flex justify-content-center">          
      <a href="https://angelgraceblessing.com"><img width="200" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt=""></a>
    </div>
    <nav class="navbar">
      <ul class="nav navbar-nav">
        <li class="nav-item dropdown <?=$title=='Oracle Cards' || $title=='Mother Mary Message of The Day' ? 'active':''?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Our Lady Devotional
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <li><a class="dropdown-item <?=$title=='Oracle Cards'?'active':''?>" href="https://angelgraceblessing.com/pray/oraclecard">Our Lady Devotional</a></li>
            <li ><a class="dropdown-item <?=$title=='Mother Mary Message of The Day'?'active':''?>" href="https://angelgraceblessing.com/pray/mother-mary-message">Mother Mary Message of The Day</a></li>
          </ul>
        </li>  

        <li class="nav-item <?=$title=='Our Lord Messages'?'active':''?>"><a href="https://angelgraceblessing.com/pray/our-lord-message">Our Lord Messages</a></li>

        <li class="nav-item dropdown <?=$title=='Angel Number' || $title=='Hear Your Angels' ? 'active':''?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hear Your Angels
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item <?=$title=='Hear Your Angels'?'active':''?>" href="https://angelgraceblessing.com/pray/hear-your-angels">Hear Your Angels</a></li>
            <li ><a class="dropdown-item <?=$title=='Angel Number'?'active':''?>" href="https://angelgraceblessing.com/pray/angel-number-v2">Angel Numbers</a></li>
          </ul>
        </li>   
        <li class="nav-item <?=$title=='Prayer Quiz'?'active':''?>"><a href="https://angelgraceblessing.com/pray/your-area-of-prayer">Your Area of Prayer</a></li>
        <li class="nav-item <?=$title=='Daily Horoscope'?'active':''?>"><a href="https://angelgraceblessing.com/pray/daily-horoscope">Daily Horoscope</a></li> 
        <li class="nav-item dropdown <?=$title=='Chakra Affirmation' || $title=='Chakra Stones Reading' ? 'active':''?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chakra Affirmation
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
            <li><a class="dropdown-item <?=$title=='Chakra Affirmation'?'active':''?>" href="https://angelgraceblessing.com/pray/chakra-affirmations">Chakra Affirmation</a></li>
            <li ><a class="dropdown-item <?=$title=='Chakra Stones Reading'?'active':''?>" href="https://angelgraceblessing.com/pray/chakra-stone">Chakra Stones Reading</a></li>
          </ul>
        </li>   

        <li class="nav-item <?=$title=='Earthly Angel Message'?'active':''?>"><a href="https://angelgraceblessing.com/pray/earthly-angel-message">Earthly Angel Message</a></li>
      </ul>
    </nav>
  </section>
  <section class="mobile-menu d-xl-none">
    <nav class="navbar navbar-expand-xl navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="https://angelgraceblessing.com"><img class="brand-img" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item <?=$title=='Oracle Cards'?'active':''?>">
              <a class="nav-link" aria-current="page" href="https://angelgraceblessing.com/pray/oraclecard">Our Lady Devotional</a>
            </li>
            <li class="nav-item <?=$title=='Our Lord Messages'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/our-lord-message">Our Lord Messages</a>
            </li>
            <li class="nav-item <?=$title=='Angel Number'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/angel-number-v2">Angel Numbers</a>
            </li>
            <li class="nav-item <?=$title=='Hear Your Angels'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/hear-your-angels">Hear Your Angels</a>
            </li>
            <li class="nav-item <?=$title=='Prayer Quiz'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/your-area-of-prayer">Your Area of Prayer</a>
            </li>
            <li class="nav-item <?=$title=='Daily Horoscope'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/daily-horoscope">Daily Horoscope</a>
            </li>
            <li class="nav-item <?=$title=='Chakra Affirmation'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/chakra-affirmations">Chakra Affirmation</a>
            </li>
            <li class="nav-item <?=$title=='Chakra Stones Reading'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/chakra-stone">Chakra Stones Reading</a>
            </li>
            <li class="nav-item <?=$title=='Earthly Angel Message'?'active':''?>">
              <a class="nav-link" href="https://angelgraceblessing.com/pray/earthly-angel-message">Earthly Angel Message</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>