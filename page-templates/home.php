<?php
/*
Template name: Home
*/
?>
<?php get_header(); ?>
<main>
  <section class="mt-15 sm-max:mt-20 pb-60" data-anchor>
    <div class="container">
      <div class="flex sm-max:flex-col-reverse">
        <div class="w-full max-w-380 pt-85 md-max:pt-15 pr-20 mr-30">
          <h1 data-el-anime="title"><?php the_field('heading_1'); ?></h1>
          <div class="mt-10" data-holder-anime>
            <div class="color-white" data-el-anime="lift-up" data-descriptor="button">
              <p>
                <?php the_field('text_1'); ?>
              </p>
            </div>
            <div class="mt-25" data-wait-anime="button">
              <a href="<?php echo get_field('link_1')['url']; ?>" class="btn btn--primary btn:xs--min-w">
                <?php echo get_field('link_1')['title']; ?>
                <svg class="icon-flash">
                  <use xlink:href="#icon-flash"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="flex-auto xs-max:over-w">
          <picture>
            <source srcset="<?php echo (get_field('image_mob_1')['url']); ?>" media="(max-width: 374px)" />
            <?php getImage(get_field('image_1')); ?>
          </picture>
        </div>
      </div>
    </div>
  </section>

  <section class="cases indent-b o-hidden" id="projects" data-anchor="projects">
    <div class="container">
      <div class="cases__one">
        <div class="relative z-5">
          <h4><?php the_field('subheading_2'); ?></h4>
          <div class="mt-20">
            <h2><?php echo get_the_title(get_field('case_1')); ?></h2>
          </div>
        </div>
        <div class="card card:hover card--xl mt-25 sm-max:mt-20 sm-max:inline-flex relative z-5">
          <div class="card__holder cases__holder">
            <div class="cases__pic" data-el-anime="scale-decrease">
              <img src="<?php echo get_the_post_thumbnail_url(get_field('case_1')); ?>" alt="" />
            </div>
            <div class="cases__slider" data-slider-wrap data-holder-anime>
              <div class="slider-control slider-control-pagination" data-el-anime="fade-in">
                <div class="slider-pagination" data-slider-pagination="custom"></div>
              </div>
              <div class="cases__slider-holder">
                <div class="swiper-container" data-slider data-el-anime="lift-up" data-descriptor="button">
                  <div class="swiper-wrapper">
                    <?php if (get_field('slider', get_field('case_1'))) : ?>
                      <?php while (the_repeater_field('slider', get_field('case_1'))) : ?>
                        <div class="swiper-slide">
                          <h4><?php the_sub_field('title'); ?></h4>
                          <div class="mt-10 color-white">
                            <p>
                              <?php the_sub_field('text'); ?>
                            </p>
                          </div>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="btns-group max-w-415 pt-30 mt-auto xs-max:max-w-200" data-wait-anime="button">
                <a href="<?php echo get_field('appstore', get_field('case_1')); ?>" class="btn btn--light btn--less-p xs-max:none">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/app-store.svg" alt="" />
                </a>
                <a href="<?php echo get_field('google_play', get_field('case_1')); ?>" class="btn btn--light btn--less-p">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/google-play.svg" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="figure sm-max:none">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/figure-1.png" alt="" />
        </div>
        <div class="signature sm-max:none">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/signature-1.png" alt="" />
        </div>
      </div>

      <div class="cases__two mt-70 sm-max:mt-50">
        <div class="relative z-5">
          <h2><?php echo get_the_title(get_field('case_2')); ?></h2>
        </div>
        <div class="card card:hover card--xl mt-25 sm-max:mt-20 sm-max:inline-flex relative z-5" data-el-anime="fade-in">
          <div class="card__holder cases__holder">
            <div class="cases__pic" data-el-anime="scale-decrease">
              <img src="<?php echo get_the_post_thumbnail_url(get_field('case_2')); ?>" alt="" />
            </div>
            <div class="cases__slider" data-slider-wrap data-holder-anime>
              <div class="slider-control slider-control-pagination" data-el-anime="fade-in">
                <div class="slider-pagination" data-slider-pagination="custom"></div>
              </div>
              <div class="cases__slider-holder">
                <div class="swiper-container" data-slider data-el-anime="lift-up" data-descriptor="button">
                  <div class="swiper-wrapper">
                    <?php if (get_field('slider', get_field('case_2'))) : ?>
                      <?php while (the_repeater_field('slider', get_field('case_2'))) : ?>
                        <div class="swiper-slide">
                          <h4><?php the_sub_field('title'); ?></h4>
                          <div class="mt-10 color-white">
                            <p>
                              <?php the_sub_field('text'); ?>
                            </p>
                          </div>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="btns-group max-w-415 pt-30 mt-auto xs-max:max-w-200" data-wait-anime="button">
                <a href="<?php echo get_field('appstore', get_field('case_2')); ?>" class="btn btn--light btn--less-p xs-max:none">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/app-store.svg" alt="" />
                </a>
                <a href="<?php echo get_field('google_play', get_field('case_2')); ?>" class="btn btn--light btn--less-p">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/google-play.svg" alt="" />
                </a>
              </div>
            </div>
          </div>

        </div>
        <div class="figure sm-max:none">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/figure-2.png" alt="" />
        </div>
        <div class="signature sm-max:none">
          <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/signature-2.png" alt="" />
        </div>
      </div>
    </div>
  </section>

  <section class="review indent-y" id="testimonials" data-anchor="testimonials">
    <div class="container relative">
      <div class="text-center sm-max:text-left relative z-5">
        <h3><?php the_field('heading_3'); ?></h3>
        <div class="color-white lh-155 mt-15"><?php the_field('subheading_3'); ?></div>
      </div>
      <div class="cards-col-3 mt-25 relative z-5" data-el-anime="lift-up-group">
        <?php foreach (get_field('reviews') as $rev) { ?>
          <div class="card card:hover card--md review__item" data-item-anime>
            <div class="card__holder flex flex-col h-full">
              <div class="color-white">
                <?php echo get_post_field('post_content', $rev); ?>
              </div>
              <div class="rating mt-15">
                <?php $rating = get_field('rating', $rev); ?>
                <?php for ($i = 0; $i < $rating; $i++) { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/starfull.svg" alt="">
                <?php } ?>
                <?php for ($i = 0; $i < (5 - $rating); $i++) { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/starempty.svg" alt="">
                <?php } ?>
              </div>

              <div class="pt-15 mt-auto flex">
                <div class="card__small-pic mr-10">
                  <img src="<?php echo get_the_post_thumbnail_url($rev); ?>" alt="">
                </div>
                <div class="flex flex-col justify-between">
                  <div class="color-white lh-155 fw-600 fz-17">
                    <?php echo get_the_title($rev); ?>
                  </div>
                  <div class="flex items-center">
                    <span class="card__small-icon mr-4">
                      <?php getImage(get_field('icon', $rev)); ?>
                    </span>
                    <span class="color-muted lh-120">
                      <?php the_field('subtitle', $rev); ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="signature sm-max:none">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/signature-3.png" alt="" />
      </div>
      <div class="figure sm-max:none">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/figure-3.png" alt="" />
      </div>
    </div>
  </section>

  <section class="process indent-y" id="process" data-anchor="process">
    <div class="container">
      <h3><?php the_field('heading_4'); ?></h3>
      <div data-slider-wrap>
        <div class="slider-bullets mt-25" data-slider-pagination></div>
        <div class="swiper-container mt-30 sm-max:mt-25" data-slider data-space-between="24:15">
          <div class="swiper-wrapper">
            <?php $i = 1;
            if (get_field('slider')) : ?>
              <?php while (the_repeater_field('slider')) : ?>
                <div class="swiper-slide">
                  <div class="two-items two-items--sm-reverse">
                    <div class="process__card card card--dark card--lg">
                      <div class="card__holder h-full flex flex-col">
                        <div class="flex items-center">
                          <div class="card__num mr-20">
                            <span><?php echo $i; ?></span>
                          </div>
                          <h4><?php the_sub_field('title'); ?></h4>
                        </div>
                        <div class="mt-20 color-white">
                          <p>
                            <?php the_sub_field('text'); ?>
                          </p>
                        </div>
                        <?php if (get_sub_field('link')) { ?>
                          <div class="flex items-center justify-end pt-30 sm-max:pt-30 mt-auto">
                            <a href="<?php echo get_sub_field('link')['url']; ?>" class="link" data-slider-action="next">
                              <?php echo get_sub_field('link')['title']; ?>
                              <svg class="icon-arrow">
                                <use xlink:href="#icon-arrow"></use>
                              </svg>
                            </a>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card card--lg min-h-260">
                      <div class="flex items-center justify-center w-full h-full">
                        <div class="process__pic">
                          <?php getImage(get_sub_field('img')); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php $i++;
              endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="meet o-hidden indent-y" id="about" data-anchor="about">
    <div class="container relative">
      <div class="two-items two-items--sm-reverse relative z-5">
        <div class="two-items two-items--xs-collapse">
          <div class="meet__card-wrap" data-el-anime="fade-in">
            <div class="meet__card card card:hover card--sm">
              <div class="meet__card-pic">
                <?php getImage(get_field('author_block_1')['img']); ?>
              </div>
              <div class="card__holder">
                <div class="fz-20 fw-700 lh-120 color-white"><?php echo get_field('author_block_1')['title']; ?></div>
                <div class="flex items-center justify-between mt-7">
                  <span class="lh-155 color-white"><?php echo get_field('author_block_1')['text']; ?></span>
                  <a target="_blank" href="<?php echo get_field('author_block_1')['link']; ?>">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M21.176 2.801a.687.687 0 0 0-.77-.24c-.843.284-1.72.458-2.607.517a4.125 4.125 0 0 0-7.487 2.278A10.286 10.286 0 0 1 3.725.867a.688.688 0 0 0-1.239.191 11.705 11.705 0 0 0 3.856 12.17 10.265 10.265 0 0 1-4.807 1.27.688.688 0 0 0-.324 1.29 11.69 11.69 0 0 0 17.327-9.464 11.655 11.655 0 0 0 2.65-2.717.687.687 0 0 0-.012-.806Z" fill="#A8ACB3;"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="meet__card-wrap" data-el-anime="fade-in">
            <div class="meet__card card card:hover card--sm">
              <div class="meet__card-pic">
                <?php getImage(get_field('author_block_2')['img']); ?>
              </div>
              <div class="card__holder">
                <div class="fz-20 fw-700 lh-120 color-white"><?php echo get_field('author_block_2')['title']; ?></div>
                <div class="flex items-center justify-between mt-7">
                  <span class="lh-155 color-white"><?php echo get_field('author_block_2')['text']; ?></span>
                  <a target="_blank" href="<?php echo get_field('author_block_2')['link']; ?>">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M21.176 2.801a.687.687 0 0 0-.77-.24c-.843.284-1.72.458-2.607.517a4.125 4.125 0 0 0-7.487 2.278A10.286 10.286 0 0 1 3.725.867a.688.688 0 0 0-1.239.191 11.705 11.705 0 0 0 3.856 12.17 10.265 10.265 0 0 1-4.807 1.27.688.688 0 0 0-.324 1.29 11.69 11.69 0 0 0 17.327-9.464 11.655 11.655 0 0 0 2.65-2.717.687.687 0 0 0-.012-.806Z" fill="#A8ACB3;"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-center sm-max:justify-start pt-60 sm-max:pt-0" data-el-anime="fade-in-right">
          <div>
            <h3><?php the_field('heading_5'); ?></h3>
            <div class="color-white lh-155 mt-10">
              <?php the_field('subheading_5'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="signature sm-max:none">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/signature-4.png" alt="" />
      </div>
    </div>
  </section>
  <section class="hiring indent-y o-hidden" data-anchor>
    <div class="container relative z-5">
      <h3><?php the_field('heading_6'); ?></h3>
      <div class="color-white lh-155 mt-15"><?php the_field('subheading_6'); ?></div>
      <div class="two-items mt-30" data-el-anime="lift-up-group">
        <?php foreach (get_field('vacancy') as $v) { ?>
          <div class="hiring__card card card--dark card--lg" data-item-anime>
            <div class="card__holder h-full flex flex-col">
              <div class="flex justify-between mt-15 sm-max:mt-0">
                <div class="chips-sm">
                  <?php $tags = get_the_terms($v, 'vacancy_cat'); ?>
                  <?php foreach ($tags as $t) { ?>
                    <span class="chip">
                      <span><?php echo $t->name; ?></span>
                    </span>
                  <?php } ?>
                </div>
                <a href="<?php echo get_field('link', $v)['url']; ?>" class="link">
                  View Job
                  <svg class="icon-arrow-up">
                    <use xlink:href="#icon-arrow-up"></use>
                  </svg>
                </a>
              </div>
              <div class="mt-30 sm-max:mt-20">
                <h5><?php echo get_the_title($v); ?></h5>
                <div class="color-white fz-15 mt-10">
                  <p>
                    <?php echo get_post_field('post_content', $v); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="figure sm-max:none">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/figure-4.png" alt="" />
    </div>
  </section>
</main>
<?php get_footer(); ?>
