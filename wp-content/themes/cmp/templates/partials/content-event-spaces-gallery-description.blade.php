{{-- Great Event Spaces gallery with hover-over description --}}

@php
  if ( have_posts() ) :
  while ( have_posts() ) :
  the_post();
@endphp

<div class="things-to-do-page">
  <div class="content-container">
    @php
      if( have_rows('event_space') ): // Loops through Event Space custom field repeater
      while ( have_rows('event_space') ) :
      the_row();
    @endphp

      <div class="activity">
        <div class="activity__image" role="img" aria-label="{{ the_sub_field('title') }}" style="background-image:url('{{ the_sub_field('image') }}')">
          <div class="activity__title">
            <h3>{{ the_sub_field('name') }}</h3>
          </div>
        </div>
        <p>{{ the_sub_field('detailed_description') }}</p>
      </div>

    @php
      endwhile; else : endif;
    @endphp
  </div>
</div>

@php
  endwhile; else : endif;
@endphp
