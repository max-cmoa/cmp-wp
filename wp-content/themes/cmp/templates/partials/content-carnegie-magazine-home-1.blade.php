{{-- Carnegie Magazine homepage section 1 (stops before 'Big Picture' section) --}}

{{-- Cover Story section -- this weird thing is what's required to get a single 'post object' custom field --}}
@php
  global $post;
  $post_object = get_field('main_featured_article');
  if( $post_object ):
  $post = $post_object;
  setup_postdata( $post );

  $featured_image = get_field('featured_image'); //gets full image array
  $featured_image_url = $featured_image['url']; //url of image
  $featured_image_id = $featured_image['id']; //id of image
  $featured_image_credit = App\get_media_credit_html($featured_image_id, false); //media credit for image
@endphp

<div class="hero-header" role="img" aria-label="{{ get_the_title($post_object) }}"  style="background-image:url({{ $featured_image_url }})">
</div>
<div class="media-details">
  <p class="media-details__caption">{{ $featured_image['caption'] }}</p>
  <p class="media-details__credit">{{ $featured_image_credit }}</p>
</div>
<div class="magazine-featured-articles">
  <div class="magazine-featured-articles__main">
    <div class="content-container">
      <div class="main-article-content">
        <h1 class="sans-serif"><a href="{{ the_permalink() }}" class="black-link">{{ the_title() }}</a></h1>
        {{ the_excerpt() }}
        <p class="author">{{ the_field('author') }}</p>

        @php
          wp_reset_postdata(); //This resets the post object so the rest of the page works normally
          endif;
        @endphp
        {{-- End cover story section --}}

      </div>

      <hr />

      {{-- Featured stories section --}}
      <div class="featured-stories">
        <h2 class="uppercase-robot--large">Featured Stories</h2>
        {{-- And this nightmare is what allows you to loop through a repeater of post objects --}}
          @php
            if( have_rows('secondary_featured_articles') ):
            while ( have_rows('secondary_featured_articles') ) : the_row();
            $post_object = get_sub_field('article');
            if( $post_object ):
            $post = $post_object; setup_postdata( $post );

            $featured_image = get_field('featured_image'); //gets full image array
            $featured_image_url = $featured_image['url']; //url of image
          @endphp

          <div class="article">
            <div class="categories">@php(the_tags( '', '', '' ))</div>
            <a href="{{ the_permalink() }}">
              <div class="article__image-container">
                <img src="{{ $featured_image_url }}" alt="{{ the_title() }}">
              </div>
            </a>
            <h3 class="sans-serif"><a href="{{ the_permalink() }}" class="black-link">{{ the_title() }}</a></h3>
            {{ the_excerpt() }}
            <p class="author">{{ the_field('author') }}</p>
          </div>

          {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
          @php
            wp_reset_postdata();
            endif;
            endwhile;
          @endphp

      </div>
      <hr />

    @php
      endif;
    @endphp

    </div>

    {{-- 'Square' section of featued articles  --}}
    <div class="magazine-featured-articles__section-3 l-collapse">

      @php
        if( have_rows('featured_articles_3') ):
        while ( have_rows('featured_articles_3') ) : the_row();
        $post_object = get_sub_field('article');
        if( $post_object ):
        $post = $post_object; setup_postdata( $post );
      @endphp

      <div class="article l-split">
        <div class="categories">@php(the_tags( '', '', '' ))</div>
        <a href="{{ the_permalink() }}">
          <div class="article__image-container">
            <img src="{{ get_field('square_image') }}" alt="{{the_title()}}">
          </div>
        </a>
        <h3><a href="{{ the_permalink() }}" class="black-link">{{ the_title() }}</a></h3>
        {{ the_excerpt() }}
        <p class="author">{{ the_field('author') }}</p>
      </div>

      {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
      @php
        wp_reset_postdata();
        endif;
        endwhile;
      @endphp

      </div>
      {{-- End of magazine featured articles main section --}}
    </div>

    @php
      endif;
    @endphp


    {{-- Sidebar section --}}
    <div class="magazine-featured-articles__sidebar">
      <h3 class="uppercase-robot--large center">Current Issue</h3>
      <div class="magazine-featured-articles__sidebar__container">
        <a href="/carnegie-magazine/current-issue">
          <img src="{{ the_field('current_issue') }}" alt="{{ the_field('current_issue_title') }}"/>
        </a>
        <h3 class="serif center">Sign up to receive more stories<br /> in your email</h3>

        <form name="survey_16543" id="survey_16543" method="POST" action="http://members.carnegiemuseums.org/site/Survey" >
          <input type="text" name="cons_email" id="cons_email" placeholder="E-mail Address" size="25" maxlength="255" />
          <input type="submit" name="ACTION_SUBMIT_SURVEY_RESPONSE" id="ACTION_SUBMIT_SURVEY_RESPONSE" value="Sign Up" class="button" />
          <input type="hidden" name="cons_info_component" id="cons_info_component" value="t" />
          <input type="hidden" name="SURVEY_ID" id="SURVEY_ID" value="16543" />
          <input type="hidden" name="USER_HAS_TAKEN" id="USER_HAS_TAKEN" value="null" />
          <input type="hidden" name="SURVEY_IGNORE_ERRORS" id="SURVEY_IGNORE_ERRORS" value="TRUE" />
          <input type="hidden" name="QUESTION_STAG_APP_ID" id="QUESTION_STAG_APP_ID" value="" />
          <input type="hidden" name="QUESTION_STAG_APP_REF_ID" id="QUESTION_STAG_APP_REF_ID" value="" />
          <input type="hidden" name="QUESTION_STAG_CTX_TYPE" id="QUESTION_STAG_CTX_TYPE" value="" />
          <input type="hidden" name="ERRORURL" id="ERRORURL" value="http://www.cmoa.org/#error"  /><!--local page for error redirect-->
          <input type="hidden" name="NEXTURL" id="NEXTURL" value="http://members.carnegiemuseums.org/site/Survey?ACTION_REQUIRED=URI_ACTION_USER_REQUESTS&SURVEY_ID=16542#success" /><!--local page for successful submission redirect-->
          <div style="display:none">
            <input type="text" name="denySubmit" id="denySubmit" value="" alt="This field is used to prevent form submission by scripts." />
          </div>
        </form>
        <div class="most-read-articles">

          {{-- Gets featured sidebar post objects --}}
          @php
            if( have_rows('sidebar_articles') ):
            while ( have_rows('sidebar_articles') ) : the_row();
            $post_object = get_sub_field('article');
            if( $post_object ):
            $post = $post_object; setup_postdata( $post );

            $featured_image = get_field('featured_image'); //gets full image array
            $featured_image_url = $featured_image['url']; //url of image
          @endphp

            <div class="article">
              <div class="categories">@php(the_tags( '', '', '' ))</div>
              <a href="{{ the_permalink() }}">
                <div class="article__image-container">
                  <img src="{{ $featured_image_url }}" alt="{{ the_title() }}">
                </div>
                <h4 class="sans-serif">{{ the_title() }}</h4>
              </a>
              {{ the_excerpt() }}
              <p class="author">{{ the_field('author') }}</p>
            </div>

            {{-- Resets postdata, checks to see if there are more posts in repeater, loops if there area --}}
            @php
              wp_reset_postdata();
              endif;
              endwhile;
            @endphp

            </div>
          </div>

          @php
            endif;
          @endphp

        </div>
      </div>

