<header class="top-bar">
  <form class="" action="index.html" method="post">
    <input type="text" name="" value="">
    <a href="#" class="button">Subscribe</a>
  </form>


  <nav>
    <ul class="top-bar-nav">
      <!-- visit callout btn-->
      <li>
        <a href="#visit" class="quickview-btn nav-callout" title="Plan Your Visit" aria-label="Plan Your Visit navigation trigger">
          <div >
            <span>Plan Your Visit</span>
            <span itemprop="hoursAvailable" itemtype="http://schema.org/OpeningHoursSpecification" class="open-times"></span>
          </div>
          <span class="nav-icon nav-icon-visit">
            <i class="icon -visit" aria-hidden="true"></i>
          </span>
        </a>
      </li>
      <!-- search nav btn-->
      <li>
        <button  class="nav-icon nav-icon-search quickview-btn" href="#search" aria-label="Search navigation trigger" title="Search">
          <i class="icon -search" aria-hidden="true"></i>
        </button>
      </li>
      <!-- mobile nav btn-->
      <li>
        <button class="nav-icon nav-icon-hamburger quickview-btn" href="#quickview-nav" aria-label="Menu" Title="Menu" role="button" aria-label="Mobile navigation trigger">
          <i class="icon -hamburger" aria-hidden="true"></i>
        </button>
      </li>
    </ul>
  </nav>

</header>

{{-- <div class="top-search-bar">

  <div class="searchbar-buttons">
    <button>Join</button>
    <button>Donate</button>
  </div>

  <form class="form-search" action="/" method="get" role="search">
    <legend class="screen-reader-text">Search form</legend>
    <fieldset>
      <label for="search-field">Search</label>
      <input type="text" name="s" placeholder="Search" />
    </fieldset>
    <button type="button" id="top-search-bar__button" name="button">
      <i class="fa fa-search" aria-hidden="true"></i></button>
  </form>

</div> --}}

<!-- quickview tray -->
<header class="quickview-container">
  <!-- quick visit -->
  <div class="quickview quickview-visit" id="visit">
    <figure itemprop="hoursAvailable" itemtype="http://schema.org/OpeningHoursSpecification" class="quickview-visit--details">
      <figcaption>Hours</figcaption>

    </figure>

    <figure class="quickview-visit--details">
      <figcaption>Admission</figcaption>


      <div class="quickview-visit--admission">
        <h3 class="featured-price">50% off regular admission
          weekdays after 3pm</h3>
      </div>
    </figure>

    <figure class="quickview-visit--callouts">
      <figcaption>What's going on?</figcaption>
        <aside>

        </aside>
    </figure>
  </div>

  <!-- mobile nav  -->
  <nav class="quickview quickview-nav" id="quickview-nav" role='navigation' aria-label="Global navigation" >
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => '']);
      endif;
    ?>
  </nav>

  <!-- search  -->
  <div class="quickview" id="search" >
    <form class="form-search" action="/" method="get" role="search">
      <legend class="screen-reader-text">Search form</legend>
      <fieldset>
        <input type="text" id="search-field" name="s" value="">
        <label for="search-field"> Search</label>
      </fieldset>
      <button type="submit" class="btn" title="Start search"><i class="icon -search"></i></button>
    </form>
  </div>

</header>
<div class="quickview-overlay"></div>

<!-- main header -->
<header class="header-main">

  <a href="/">
    <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="" class="site-header--logo"/>
  </a>

    <!-- desktop nav-->
    <nav class="desktop-nav-container" role='navigation' aria-label="Global navigation">

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'desktop-nav']) !!}
      @endif

    </nav>

</header>
