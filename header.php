<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <?php wp_head(); ?>
  <?php get_res(); ?>
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0" height="0" style="position: absolute; display: none">
    <symbol id="icon-flash" viewBox="0 0 16 22">
      <path d="M15.544 10.155a.689.689 0 0 0-.428-.487l-4.952-1.857 1.26-6.302a.688.688 0 0 0-1.177-.604L.622 11.218a.687.687 0 0 0 .262 1.113l4.952 1.857-1.26 6.301a.688.688 0 0 0 1.177.604l9.625-10.312a.687.687 0 0 0 .166-.626Z" />
    </symbol>

    <symbol id="icon-stars" viewBox="0 0 112 16">
      <path d="m15.515 5.93-4.497-.639-2.01-3.983a.575.575 0 0 0-1.017 0l-2.01 3.983-4.496.639a.57.57 0 0 0-.324.16.548.548 0 0 0 .01.785l3.254 3.1-.769 4.378a.542.542 0 0 0 .225.541.574.574 0 0 0 .597.042L8.5 12.869l4.022 2.067c.11.057.237.076.36.055a.554.554 0 0 0 .462-.638l-.769-4.378 3.254-3.1a.549.549 0 0 0-.314-.945ZM39.515 5.93 35.02 5.29l-2.01-3.983a.575.575 0 0 0-1.017 0l-2.01 3.983-4.497.639a.57.57 0 0 0-.324.16.549.549 0 0 0 .01.785l3.254 3.1-.769 4.378a.541.541 0 0 0 .225.541.574.574 0 0 0 .597.042l4.022-2.067 4.022 2.067c.11.057.237.076.36.055a.554.554 0 0 0 .462-.638l-.769-4.378 3.254-3.1a.549.549 0 0 0-.314-.945ZM63.515 5.93 59.02 5.29l-2.01-3.983a.575.575 0 0 0-1.017 0l-2.01 3.983-4.497.639a.57.57 0 0 0-.324.16.549.549 0 0 0 .01.785l3.254 3.1-.769 4.378a.541.541 0 0 0 .225.541.574.574 0 0 0 .597.042l4.022-2.067 4.022 2.067c.11.057.237.076.36.055a.554.554 0 0 0 .462-.638l-.769-4.378 3.254-3.1a.549.549 0 0 0-.314-.945ZM87.515 5.93 83.02 5.29l-2.01-3.983a.575.575 0 0 0-1.017 0l-2.01 3.983-4.497.639a.57.57 0 0 0-.324.16.549.549 0 0 0 .01.785l3.254 3.1-.769 4.378a.541.541 0 0 0 .225.541.574.574 0 0 0 .597.042l4.022-2.067 4.022 2.067c.11.057.237.076.36.055a.554.554 0 0 0 .462-.638l-.769-4.378 3.254-3.1a.549.549 0 0 0-.314-.945Z" fill="#24D08F" />
      <path d="M108.522 14.936c.11.057.237.076.36.055a.554.554 0 0 0 .462-.638l-.822.583Zm0 0-4.022-2.067-4.022 2.067m8.044 0h-8.044m0 0a.577.577 0 0 1-.304.063m.304-.063-.597-.042c.086.061.187.097.293.105m0 0 .034-.5a.074.074 0 0 1-.037-.012.062.062 0 0 1-.02-.024l-.462.192m.485.344.034-.5a.08.08 0 0 0 .041-.007l4.023-2.068.228-.117.229.117 4.022 2.067.002.001c.011.006.027.01.045.006h.001a.067.067 0 0 0 .044-.026.038.038 0 0 0 .008-.032l-.768-4.378-.047-.264.194-.185 3.253-3.1-11.794 8.142m0 0 .462-.192a.038.038 0 0 1-.002-.023l.768-4.378.047-.264-.194-.185-3.254-3.1a.05.05 0 0 1-.016-.035c0-.01.004-.023.014-.034a.07.07 0 0 1 .04-.019h.001l4.497-.639.258-.037.118-.233 2.009-3.98a.066.066 0 0 1 .039-.032.076.076 0 0 1 .058.003h.001a.064.064 0 0 1 .027.026l2.01 3.983.118.233.258.037 4.495.639h.001a.071.071 0 0 1 .047.026c.008.01.01.02.008.03v.005a.047.047 0 0 1-.016.028l-11.794 8.141Z" stroke="#85878F" />
    </symbol>

    <symbol id="icon-arrow" viewBox="0 0 9 16" fill="none">
      <path d="m1 1 7 7-7 7" />
    </symbol>

    <symbol id="icon-arrow-up" viewBox="0 0 14 15" fill="none">
      <path d="M1 14 13 1m0 0v13m0-13H0" />
    </symbol>

    <symbol id="icon-search" viewBox="0 0 22 23" fill="none">
      <path d="M9.969 17.688a7.219 7.219 0 1 0 0-14.438 7.219 7.219 0 0 0 0 14.438Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
      <path d="m15.073 15.573 4.176 4.177" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round" />
    </symbol>

  </svg>
  <div class="wrap">
    <div class="wrap__inner">
      <header class="header">
        <div class="container">
          <nav class="navbar" data-nav>
            <a href="/" class="navbar__logo logo mr-auto">
              <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="" />
            </a>
            <div class="navbar__menu" data-menu>
              <div class="navbar__holder">
                <div class="navbar__nav">
                  <?php wp_nav_menu(array('menu' => 'Main menu', 'theme_location' => 'main_menu', 'container' => null)); ?>
                </div>
                <div class="navbar__side">
                  <a href="<?php echo get_permalink(98); ?>" class="<?php if (get_permalink()==get_permalink(98) || $post->post_type=='post'){echo 'current_page_item';} ?>"><?php echo get_the_title(98); ?></a>
                  <a href="<?php echo get_field('button_header', 'options')['url']; ?>" class="btn btn--primary">
                    <?php echo get_field('button_header', 'options')['title']; ?>
                    <svg class="icon-flash">
                      <use xlink:href="#icon-flash"></use>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="navbar__backdrop"></div>
            <button type="button" class="navbar__toggler hamburger" data-menu-toggler>
            </button>
          </nav>
        </div>
      </header>
