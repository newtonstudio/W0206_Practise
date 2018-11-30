<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Thank You</h1>
              <span class="subheading">Enjoy Benefits</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

        <?php
							if($soData['status'] == 1) {
							?>

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title text-center">Thank You <i class="fa fa-smile-o pl-10"></i></h1>
							<div class="separator"></div>
							<!-- page-title end -->
							<p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis a deleniti sequi necessitatibus, rem asperiores, magnam labore ullam sint placeat excepturi. Vero corrupti consequuntur id eum esse, rerum, iure neque.</p>
							<p class="text-center">
								<a href="<?=base_url()?>" class="btn btn-default btn-lg">See more Blogs!</a>	
							</p>
							<?php
							} else {
							?>
							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title text-center">Sorry, your payment is unsuccessful</h1>
							<div class="separator"></div>
							<!-- page-title end -->
							<p class="lead text-center"></p>
							<p class="text-center">
								<a href="<?=base_url('checkout_retry/'.$soData['id'])?>" class="btn btn-default btn-lg">Try again </a>	
							</p>

							<?php	
							}
							?>
          
        </div>
      </div>
    </div>

