{{-- <header class="sign-up-header">
  <form class="" action="index.html" method="post">
    <input type="text" name="" value="">
    <a href="#" class="button">Subscribe</a>
  </form>
</header> --}}
<div class="top-search-bar">

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

</div>

<div class="overlay"></div>
<header class="site-header">
    <a href="/">
      <img src="<?= App\asset_path('images/logo--cmp.svg') ?>" alt="" class="site-header--logo"/>
    </a>
    {{-- <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a> --}}
{{--
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif

      <ul class="nav-tray nav__mobile">
         <li class="nav__plan">Plan your visit </li>
         <div class="nav__symbols">
           <li class="nav__symDown"> <i class="fa fa-chevron-down" aria-hidden="true"></i>  </li>
           <li class="nav__symSearch"> <i class="fa fa-search" aria-hidden="true"></i> </li>
           <li class="nav__symHamburger"> <i class="fa fa-bars" aria-hidden="true"></i> </li>
         </div>
       </ul>

       <div class="nav-tray navMobile__search">
         <form class="form-search" action="/" method="get" role="search">
           <legend class="screen-reader-text">Search form</legend>
           <fieldset>
             <label for="search-field">Search</label>
             <input type="text" id="search-field" name="s" placeholder="Search" />
           </fieldset>
           <button type="button" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>
         </form>
       </div>

       <div class="nav-tray navmobile__planDrop"></div>

      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav--mobile']) !!}
      @endif
    </nav> --}}


    <!-- global nav primary-->
    <nav class="nav-container container-full" role='navigation' aria-label="Global navigation">

      <!-- persistant global nav -->
      <ul class="nav-global-persistant"  >
        <li>
          <button  class="nav-icon nav-icon-search quickview-btn" href="#search" aria-label="Search navigation trigger" title="Search">
            <i class="icon -search" aria-hidden="true"></i>
          </button>
        </li>
        <li>
          <button class="nav-icon nav-icon-hamburger quickview-btn" href="#quickview-nav" aria-label="Menu" Title="Menu" role="button" aria-label="Mobile navigation trigger">
            <i class="icon -hamburger" aria-hidden="true"></i>
          </button>
        </li>
      </ul>

      <!-- global nav -->
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => '', 'menu_class' => 'nav-global']);
        endif;
      ?>
      <!-- visit callout -->
      <a href="#visit" class="quickview-btn nav-callout" title="Plan Your Visit" aria-label="Plan Your Visit navigation trigger">
        <div >
          <span>Plan Your Visit</span>
          <span itemprop="hoursAvailable" itemtype="http://schema.org/OpeningHoursSpecification" class="open-times"></span>
        </div>
        <span class="nav-icon nav-icon-visit">
          <i class="icon -visit" aria-hidden="true"></i>
        </span>
      </a>

    </nav>
    <!-- end global nav primary-->

</header>
