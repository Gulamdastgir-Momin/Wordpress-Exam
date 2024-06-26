<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage exam
 */

?>
    <!-- footer-starts -->
    <footer class="footer-wrap">
      <div class="container">
        <div class="content">
          <div class="left">
            <div class="title-group">
              <div class="icon">
                <img
                  src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/mail-icon.svg"
                  alt="mail-icon"
                  class="svg"
                />
              </div>
              <h6 class="footer-title-link">Subscribe to our newsletter</h6>
            </div>
            <div class="subscribe-newsletter">
              <div class="form-group form-style-alt">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Enter Your Email Address"
                />
                <div class="btn-wrap">
                  <a href="#" class="btn btn-primary">Subscribe</a>
                </div>
              </div>
            </div>
            <div class="social-links">
              <ul>
                <li>
                  <a href="#">
                    <img
                      src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/fb-icon.svg"
                      alt="icon"
                      class="svg"
                    />
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img
                      src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/twitter-icon.svg"
                      alt="icon"
                      class="svg"
                    />
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img
                      src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin-icon.svg"
                      alt="icon"
                      class="svg"
                    />
                  </a>
                </li>
              </ul>
            </div>
            <div class="copright-text">
              © 2023 Consule Solutions All rights reserved.
              <span
                ><a href="#" class="highlighted-link">Privacy Policy</a></span
              >
            </div>
          </div>
          <div class="right">
            <h6 class="footer-title-link">Quick Links</h6>
            <ul class="list">
              <li>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
                <a href="#">Projects</a>
              </li>
              <li>
                <a href="#">Industries</a>
              </li>
              <li>
                <a href="#">Services</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
              <li>
                <a href="#">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- footer-ends -->

<?php wp_footer(); ?>

</body>
</html>