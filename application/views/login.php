<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
  <title>Pray</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="<?=base_url()?>assets/img/favicon.ico" sizes="32x32">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script type="text/javascript" src="<?=base_url()?>assets/plugin/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/app.css">
  <script type="text/javascript" src="<?=base_url()?>assets/js/login.js"></script>
  <script type="text/javascript">
    var site_url = "<?=site_url()?>";
  </script>
</head>
<body>
  <div class="container mt-4">
    <div style="max-width: 400px; margin-left: auto; margin-right: auto;">
      <form id="login_form">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form2Example1">Email</label>
          <input type="email" id="admin_id" class="form-control" required />
          
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form2Example1">Password</label>
          <input type="password" id="password" class="form-control" required />
        </div>

        <!-- Submit button -->
        <div class="d-flex" style="justify-content: space-between;">
          <a href="#" class="mt-2" data-bs-toggle="modal" data-bs-target="#requestModal">Forgot Password</a>
          <button type="submit" class="btn btn-primary mb-4">Sign in</button>
        </div>

      </form>
    </div>
  </div>




<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="request-form ">
                <form method="post" id="m_form">
                    <div class="form-group">
                      <label>Email:</label>
                      <input type="email" class="form-control" id="m_email" required>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn mt-5 btn-primary" id="reset_password">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
    
</body> 
</html>