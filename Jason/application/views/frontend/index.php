<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
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
          if(!empty($newsList)) {
            foreach($newsList as $v) {
          ?>
          <div class="post-preview">
            <a href="<?=base_url('detail/'.$v['id'].'/'.slug($v['title']))?>">
              <h2 class="post-title">
                <?=$v['title']?>
              </h2>
              <h3 class="post-subtitle">
                <?=$v['details']?>
              </h3>
            </a>
            <p class="post-meta">Posted by
              on <?=$v['postdate']?></p>
          </div>
          <hr>
          <?php
            }
          }
          ?>
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary" href="<?=base_url('subscribe')?>">Subscribe us!</a>
          </div>
        </div>
      </div>
    </div>