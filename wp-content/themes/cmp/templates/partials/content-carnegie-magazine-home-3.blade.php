{{-- Carnegie Magazine section 3--'Inside the Museums' --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();

  $inside_museums_image = get_field('inside_museums_image'); //gets full image array
  $inside_museums_image_url = $inside_museums_image['url']; //url of image
  $inside_museums_image_id = $inside_museums_image['id']; //id of image
  $inside_museums_image_credit = get_media_credit_html($inside_museums_image_id); //media credit for image
@endphp

  <div class="carnegie-magazine-section-3">
    <div class="carnegie-magazine__big-picture">
      <a href="{{ the_field('inside_museums_link') }}">
        <div class="hero-header" style="background-image:url('{{ $inside_museums_image_url }}')">
        </div>
        <div class="content-container">
          <h1 class="hero-header__words-box robot">{{ the_field('inside_museums_title') }}</h1>
      </a>
          <p class="media-credit">@php echo $inside_museums_image_credit; @endphp</p>
        <p class="inside-museums-text">{{ the_field('inside_museums_text') }}</p>
      </div>
    </div>
  </div>

@php
  endwhile; else: endif;
@endphp