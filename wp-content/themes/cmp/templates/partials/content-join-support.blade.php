{{--
  Template Name: Join and Support
--}}

<div class="join-support">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
      $rows = get_field('members'); //get all rows
      shuffle ($rows); //randomize rows
      $row = $rows[0]; ?>

      <div class="hero-header" style="background-image:url('{{ $row['image'] }}')"></div>

    <div class="content-container">

      <h1 class="hero-header__words-box">{{ the_title() }}</h1>

      <div class="main-text">{{ the_content() }}</div>

      <div class="sub-pages">

      <?php $i = 1; ?>

      <?php if( have_rows('sub-pages') ): while ( have_rows('sub-pages') ) : the_row() ?>

        <div class="sub-page">

        <div class="sub-page__background" style="background-image:url('{{ $rows[$i]['image'] }}'">

          <a href="{{ the_sub_field('link') }}">
            <div class="sub-page__title">
                <h3>{{ the_sub_field('title') }}</h3>
            </div>
            <h4 class="sub-page__quote">"{{ $rows[$i]['quote'] }}"</h4>
          </a>

        </div>

        <p class="description">
          {{ the_sub_field('description') }}
        </p>

      </div>

      <?php $i = $i+1; ?>

    <?php endwhile; else : endif; ?>

    </div>

  </div>

  <?php endwhile; else: endif; ?>

</div>
