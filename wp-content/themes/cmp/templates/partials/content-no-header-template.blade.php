{{-- No Header Template --}}

@php
  if (have_posts()) : while (have_posts()) : the_post();

  // $image = get_field('header_image');
  // $image_id = $image['id'];
  // $image_url = $image['url'];
  // $image_credit = App\get_media_credit_html($image_id);

@endphp

<div class="no-header">
  <div class="content-container">
    <h1>{{ the_title() }}</h1>
    <div class="content-wrapper">
      <div class="l-long">
        {{ the_content() }}
      </div>
      <div class="l-short">
        @php
          if( have_rows('sidebar_content') ):
          while( have_rows('sidebar_content') ):
          the_row();
        @endphp
        <h3>{{ the_sub_field('heading') }}</h3>
        {{ the_sub_field('text') }}
        @php
          endwhile; endif;
        @endphp
      </div>
    </div>
    @include('partials.tabs')
  </div>
</div>

@php
  endwhile; else: endif;
@endphp
