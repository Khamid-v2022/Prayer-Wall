<body>
    <section class="main">
        <div class="container">  
            <div class="d-flex justify-content-center">          
                <img width="180" height="81" src="<?=base_url()?>assets/img/agb-logo-skyblue.png" alt="">
            </div>
        
            <div class="heading text-center">
                <h1>"Ask And You Shall Receive..."</h1>
                <p>Leave your prayer request into the prayer wall, and let your prayers be heard by the Lord, with many others.</p>
            </div>

            <div class="form_wrapper bg-white shadow rounded mb-5 p-2">
                <div class="prayer-count p-1">
                    <?=number_format($today_count)?> Prayer Requests as of Today (<?=date("M j, Y");?>)
                </div>
                <div class="row">
                    <div class="col-md-6 prayer-list">
                        <?php 
                        foreach($prayer_list as $item)
                        { ?>
                        <div class="prayer-item d-flex p-1">
                            <img src="<?=base_url()?>assets/img/icon.webp">
                            <div class="ms-3">
                                <div class="fw-bold"><?=$item['first_name']?></div>
                                <div>
                                    <?=$item['note']?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                    <div class="col-md-6 d-none d-md-block ">
                        <div class="request-form">
                            <p class="text-center">
                                Leave your prayer requests and messages here in the 'comments' box below, for the 7 Day Prayer Miracle Wall
                            </p>

                            <p class="mb-5 text-center fs-5">May you be blessed with the miracles you seek.</p>

                            <form method="post" id="pray_form">
                                <input type="hidden" id="ip_address" value="">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="FIRST NAME" autocomplete="off" required>
                                <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" autocomplete="off" required>
                                <textarea class="form-control" placeholder="PRAYER REQUEST" id="note" rows=8 autocomplete="off" required></textarea>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="display">
                                    <label class="form-check-label" for="display">
                                        Display my name and request on the prayer wall
                                    </label>
                                </div>

                                <div class="text-center my-4">
                                    <button type="submit" class="btn btn-post-msg btn-primary" name="post_my_msg">POST MY REQUEST</button>
                                    <button type="button" onclick="submit_test()" style="display:hidden" name="post_my_msg">POST MY REQUEST</button>
                                </div>
                            </form>
                        </div>
                        <div class="loader d-none"></div>
                        <div class="dpm-response d-none">
                            <p class="alert alert-danger d-none">Email not valid - Please try with another email address!</p>
                            <p class="alert alert-info d-none">Validating your contact details...</p>
                            <p class="alert alert-success d-none">Valid Email address!</p>
                        </div>
                    </div>
                    
                    <div class="d-md-none text-center fixed-bottom py-3 bg-white ">
                        <button type="button" class="btn btn-post-msg btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">POST A PRAYER REQUEST</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>



<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Let's Pray Together!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="request-form ">
                <p class="text-center">
                    Leave your prayer requests and messages here in the 'comments' box below, for the 7 Day Prayer Miracle Wall
                </p>

                <p class="mb-5 text-center fs-5">May you be blessed with the miracles you seek.</p>

                <form method="post" id="m_pray_form">
                    <input type="text" class="form-control" name="first_name" id="m_first_name" placeholder="FIRST NAME" autocomplete="off" required>
                    <input type="email" class="form-control" name="email" id="m_email" placeholder="EMAIL" autocomplete="off" required>
                    <textarea class="form-control" placeholder="PRAYER REQUEST" id="m_note" rows=8 autocomplete="off" required></textarea>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="m_display">
                        <label class="form-check-label" for="m_display">
                            Display my name and request on the prayer wall
                        </label>
                    </div>

                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-post-msg mt-5 btn-primary" name="post_my_msg">POST MY REQUEST</button>
                    </div>
                </form>
            </div>
            <div class="loader d-none"></div>
            <div class="dpm-response d-none">
                <p class="alert alert-danger d-none">Email not valid - Please try with another email address!</p>
                <p class="alert alert-info d-none">Validating your contact details...</p>
                <p class="alert alert-success d-none">Valid Email address!</p>
            </div>
            
        </div>
    </div>
  </div>
</div>