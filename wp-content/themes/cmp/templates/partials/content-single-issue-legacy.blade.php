@php($issue_type = get_field('issue_type'))
@if ('archived' === $issue_type)
  @php($issue_url = get_field('issue_url'))
  @php(header("Location: $issue_url". false, 301))
@else

  <div class="carnegie-magazine-current-1">
    <div class="content-container">
      <div class="current-issue">
        <div class="current-issue__left">
          @if (has_post_thumbnail())
            @php
              $cover_image_id = get_post_thumbnail_id(get_the_ID());
              $cover_sizes = wp_get_attachment_metadata($cover_image_id);
              $cover_ratio = $cover_sizes['height'] / $cover_sizes['width'] * 100;
            @endphp
            <div class="cover">
              <div class="cover__inner"
                   style="padding-top: {{ $cover_ratio }}%; background-image: url('{{ the_post_thumbnail_url('large') }}')"
              ></div>
            </div>
          @endif
        </div>
        <div class="current-issue__right">

          @php
            global $post;
            $issue_title = get_the_title();
            $cover_story_description = get_field('cover_story_description');
            $post_object = get_field('cover_story');
            if( $post_object ):
            $post = $post_object;
            setup_postdata( $post );
          @endphp

          <div class="current-issue__cover-story">
            <h2 class="issue-title">{{ $issue_title }}</h2>
            <p class="small-uppercase--bold">Cover Story</p>
            <h3 class="sans-serif"><a href="{{ the_permalink() }}">{{ the_title() }}</a></h3>
            {!! the_field('quote') !!}
            {!! $cover_story_description !!}
            <p class="author">{{ the_field('author') }}</p>
          </div>

          @php
            wp_reset_postdata(); endif; // Resets postdata for cover story
          @endphp

          <div class="magazine-archives">
            <p class="uppercase-bold center">Magazine Archives</p>
              <div class="magazine-archives__container">
                @php
                  $archives = get_posts(array(
                    'post_type' => 'issue',
                    'posts_per_page' => 2,
                    'post__not_in' => array($post->ID),
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'issue_number'
                  ));
                @endphp

                @foreach($archives as $post)
                  @php(setup_postdata($post))

                  <div class="archive">
                    <a href="{{ the_permalink() }}">
                      @if (has_post_thumbnail())
                        @php
                          $cover_image_id = get_post_thumbnail_id(get_the_ID());
                          $cover_sizes = wp_get_attachment_metadata($cover_image_id);
                          $cover_ratio = $cover_sizes['height'] / $cover_sizes['width'] * 100;
                        @endphp
                        <div class="cover">
                          <div class="cover__inner"
                              style="padding-top: {{ $cover_ratio }}%; background-image: url('{{ the_post_thumbnail_url('medium') }}');"
                          ></div>
                        </div>
                      @endif
                      <p class="small-uppercase--bold center">{{ the_title() }}</p>
                    </a>
                  </div>

                @endforeach
                @php(wp_reset_postdata())
              </div>

              <a class="green-button" style="display: block; text-align:center;" href="/carnegie-magazine/carnegie-magazine-archive">More Archives</a>
            </div>

            <div class="magazine-subscribe magazine-subscribe--sidebar">
              <p class="serif label"><strong>Receive more stories in your email</strong></p>
              @include('partials/magazine-signup-form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (have_rows('featured_articles'))
    <div class="carnegie-magazine-current-1 carnegie-magazine-current-2">
      <div class="content-container">
        <h2 class="robot-uppercase">Features</h2>
        <hr/>
        <div class="features">

          @while (have_rows('featured_articles'))
            @php
              the_row();
              $post_object = get_sub_field('article');
            @endphp

            @if ($post_object)
              @php
                $post = $post_object;
                setup_postdata($post);
              @endphp

              <div class="article">
                <div class="categories">@php(the_tags( '', '', '' ))</div>
                <a href="{{ the_permalink() }}">
                <div class="article__image-container">
                  <img src="{{ the_field('square_image') }}" alt="{{ the_title() }}">
                </div>
                  <h3 class="green-robot-link">{{ the_title() }}</h3>
                </a>
                <p>{{ the_excerpt() }}</p>
                <p class="author">{{ the_field('author') }}</p>
              </div>

              @php(wp_reset_postdata())
            @endif
          @endwhile

        </div>
      </div>
    </div>
  @endif

  @if (have_rows('also_in_issue'))
    <div class="carnegie-magazine-current-3">
      <div class="content-container">
        <div class="also-in-issue">
          <h2 class="robot-uppercase">Also in this Issue</h2>
          <hr/>

          @while (have_rows('also_in_issue'))
            @php
              the_row();
              $post_object = get_sub_field('article');
            @endphp

            @if ($post_object)
              @php
                $post = $post_object;
                setup_postdata($post);
              @endphp

              <div class="also-article">
                <div class="also-article__left">
                  <div class="article__image-container">
                    <a href="{{ the_permalink() }}">
                      <img src="{{ the_field('square_image') }}" alt="{{ the_title() }}">
                    </a>
                  </div>
                  <p class="feature-type">{{ the_field('feature_type') }}</p>
                </div>
                <div class="also-article__right">
                  <div class="categories">@php(the_tags( '', '', '' ))</div>
                  <a href="{{ the_permalink() }}">
                    <h3 class="green-robot-link">{{ the_title() }}</h3>
                  </a>
                  <p>{{ the_excerpt() }}</p>
                  <p class="author">{{ the_field('author') }}</p>
                </div>
              </div>

              @php(wp_reset_postdata())
            @endif
          @endwhile

        </div>
      </div>
    </div>
  @endif

  @php
    $bigpicture_image = get_field('big_picture_image'); //gets full image array
    $bigpicture_id = $bigpicture_image['id']; //id of image
    $bigpicture_url = $bigpicture_image['url']; //url of image
    $bigpicture_credit = App\get_media_credit_html($bigpicture_id, false); //media credit for image
  @endphp

  @if ($bigpicture_image)
    <div class="carnegie-magazine__big-picture -pad-bottom">
      <a href="{{ the_field('big_picture_link') }}">
        <div class="hero-header" role="img" aria-label="{{ $bigpicture_image['alt'] }}" style="background-image:url('{{ $bigpicture_url }}')"></div>
      </a>
      <div class="media-details">
        <p class="media-details__caption">@php echo $bigpicture_image['caption']; @endphp</p>
        <p class="media-details__credit">@php echo $bigpicture_credit; @endphp</p>
      </div>
      <div class="container pad">
        <h1 class="hero-header__words-box green-robot-link">{{ the_field('big_picture_title') }}</h1>
        <p>{{ the_field('big_picture_text') }}</p>
      </div>
    </div>
  @endif

@endif
