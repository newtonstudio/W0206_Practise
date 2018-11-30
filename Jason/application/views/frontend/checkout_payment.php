<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Payment</h1>
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
        <form method="post" role="form" class="form-horizontal" id="payment-information" action="<?=$endpoint?>">
								<fieldset>
									<legend>Payment</legend>

									<?php
									if(!empty($paymentMethodList)) {
										foreach($paymentMethodList as $k=>$v) {
									?>
									<div class="space"></div>
									<div class="row">
										<div class="col-lg-6">
											<div class="radio">
												<label>
													<input type="radio" name="PaymentId" value="<?=$k?>">
													<?=$v?><!--<i class="fa fa-cc-paypal pl-10"></i>-->
												</label>
											</div>
											<div class="space-bottom"></div>
										</div>										
									</div>
									<?php		
										}
									}
									?>
									<INPUT type="hidden" name="MerchantCode" value="<?=$merchantCode?>">
									<INPUT type="hidden" name="RefNo" value="<?=$RefNo?>">
									<INPUT type="hidden" name="Amount" value="<?=$salesData['amount']?>">
									<INPUT type="hidden" name="Currency" value="<?=$currency?>">
									<INPUT type="hidden" name="ProdDesc" value="one-year-subscription">
									<INPUT type="hidden" name="UserName" value="<?=$salesData['name']?>">
									<INPUT type="hidden" name="UserEmail" value="<?=$salesData['email']?>">
									<INPUT type="hidden" name="UserContact" value="<?=$salesData['tel']?>">
									<INPUT type="hidden" name="Remark" value="">
									<INPUT type="hidden" name="Lang" value="UTF-8">
									<INPUT type="hidden" name="Signature" value="<?=$signature?>">
									<INPUT type="hidden" name="ResponseURL"
									value="<?=base_url('checkout_completed/'.$salesData['id'])?>">
									<INPUT type="hidden" name="BackendURL"
									value="<?=base_url('checkout_callback')?>">									
									
								</fieldset>
								<div class="text-right">										
									<button type="submit" class="btn btn-primary ">Proceed to Payment Gateway <i class="icon-right-open-big"></i></button>
								</div>
							</form>
          
        </div>
      </div>
    </div>