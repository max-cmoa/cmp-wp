{{-- Footer, I know it's long, sorry. --}}

<footer class="footer">
  <div class="content-container">
      <div class="footer-links">
        <div class="left-section">
          <div class="footer__images">
            <div class="logo-container">
              <img class="footer-logo" src="/wp-content/themes/cmp/assets/images/cmpfooter.png">
            </div>
          </div>
        <hr class="hr-break-mobile">
      </div>
      <div class="right-section">
        <div class="top-row">
            <div class="footer__left-div">
              <div class="footer-links-section">
                <a href="/things-to-do">Things to Do</a>
                <a href="/plan-a-visit">Visit</a>
                <a href="/join-support">Join & Support</a>
              </div>
              <div class="footer-links-section">
                <a href="/great-event-spaces">Event Spaces</a>
                <a href="/about-us">About Us</a>
                <a href="/carnegie-magazine">Carnegie Magazine</a>
              </div>
            </div>
          <hr class="hr-break-mobile">
          <div class="footer__right-div">
            <div class="footer-links-section footer-links-section__small">
              <a href="http://cmoa.org">Carnegie Museum of Art</a>
              <a href="http://www.carnegiesciencecenter.org/">Carnegie Science Center</a>
            </div>
            <div class="footer-links-section footer-links-section__small">
              <a href="http://carnegiemnh.org">Carnegie Museum of Natural History</a>
              <a href="http://warhol.org">The Andy Warhol Museum</a>
            </div>
          </div>
        </div>
        <hr class="hr-break">
        <div class="middle-row">
          <div class="email-subscribe">

            @php
              echo do_shortcode("[contact-form-7 id='128' title='Email Form']");
            @endphp

          </div>
            <div class="social-media">
              <a class="connect" href="/connect-with-us/">
                <span class="connect-1">Connect with our museums</span>
                <span class="connect-2">Social Media, Blogs, Apps & More ></span>
              </a>
            </div>

            <hr class="mobile-hr">
        </div>

        <hr class="hr-break mobile-hide">

        <div class="bottom-row">
          <div class="bottom-row__left">

            <div class="bottom-row__links">
              <a href="#">Accessibility</a><p>|</p>
              <a href="#">Press</a><p>|</p>
              <a href="#">Careers</a><p>|</p>
              <a href="#">Volunteers</a>
            </div>

            <hr class="mobile-hr">

            <div class="copyright">
              <p>©2017 Carnegie Museums of Pittsburgh</p>
              <a href="#">Privacy Policy</a>
            </div>

          </div>

          <div class="rad-container">
            <img class="rad-logo" src="/wp-content/themes/cmp/assets/images/logo_rad.svg">
          </div>

        </div>
      </div>
     </div>
    </div>
  </div>
</footer>
