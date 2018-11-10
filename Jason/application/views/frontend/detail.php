<!-- Page Header -->
<header class="masthead" style="background-image: url('<?=base_url('assets/'.$newsData['image_url'])?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?=$newsData['title']?></h1>
              
              <span class="meta">Posted                
                on <?=$newsData['postdate']?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?=$newsData['details']?>
          </div>
        </div>
      </div>
    </article>