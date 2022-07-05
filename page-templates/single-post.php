<?php
/*
Template name: Single post
*/
$postid=$post->ID;
get_header();
?>
<main>
  <section>
    <div class="container">
      <div class="post-page" data-post-watch>
        <div>
          <a href="<?php echo get_permalink(98); ?>" class="chip chip--md link link--reverse">
            <svg class="icon-arrow">
              <use xlink:href="#icon-arrow"></use>
            </svg>
            <?php echo get_the_title(98); ?>
          </a>
        </div>
        <div>
          <article id="theme-1" data-theme="theme-1">
            <span>
              <?php the_date(); ?>
              <span>&nbsp;&#8226;&nbsp;</span>
              <?php the_field('read_time'); ?> min read
            </span>
            <h1><?php the_title(); ?></h1>
            <p>
              <?php the_field('short_text'); ?>
            </p>
          </article>
          <picture>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
          </picture>
        </div>
        <div class="post-page__pane">
          <div class="post-page__list">
            <div class="post-page__links">
              <h5>Summary</h5>
              <ul class="pane mt-20" data-items>
                <?php $i=1; if(get_field('blocks')): ?>
                <?php while(the_repeater_field('blocks')): ?>
                <li>
                  <a href="#theme-<?php echo $i; ?>" <?php if ($i==1){ ?>class="is-active"<?php } ?> data-link="theme-<?php echo $i; ?>">
                    <span><?php echo $i; ?>. <?php the_sub_field('block_title'); ?></span>
                  </a>
                </li>
                <?php $i++; endwhile; ?>
                <?php endif; ?>
              </ul>
            </div>
            <ul class="post-page__soc social mt-20">
              <li>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.875.75H2.125A1.377 1.377 0 0 0 .75 2.125v13.75a1.377 1.377 0 0 0 1.375 1.375h13.75a1.376 1.376 0 0 0 1.375-1.375V2.125A1.376 1.376 0 0 0 15.875.75ZM6.25 13.125a.687.687 0 0 1-1.375 0v-5.5a.688.688 0 1 1 1.375 0v5.5Zm-.688-7.219a1.031 1.031 0 1 1 0-2.062 1.031 1.031 0 0 1 0 2.062Zm8.25 7.22a.687.687 0 1 1-1.374 0V10.03a1.719 1.719 0 0 0-3.438 0v3.094a.687.687 0 0 1-1.375 0v-5.5a.687.687 0 0 1 1.357-.153 3.092 3.092 0 0 1 4.83 2.56v3.093Z" fill="#85878F" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>">
                  <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.874.727a1.372 1.372 0 0 0-1.4-.238L1.614 6.72a1.375 1.375 0 0 0 .233 2.628l4.028.806v5.032a1.375 1.375 0 0 0 2.347.972l2.23-2.23 3.384 2.979a1.364 1.364 0 0 0 1.33.276 1.364 1.364 0 0 0 .918-1.001l3.233-14.106a1.371 1.371 0 0 0-.443-1.349Zm-4.13 15.148-7.08-6.232L17.86 2.28l-3.116 13.594Z" fill="#85878F" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 .063a8.938 8.938 0 0 0-.688 17.848v-6.848H6.25a.688.688 0 0 1 0-1.375h2.063V7.625a2.753 2.753 0 0 1 2.75-2.75h1.374a.687.687 0 0 1 0 1.375h-1.374a1.377 1.377 0 0 0-1.376 1.375v2.063h2.063a.687.687 0 0 1 0 1.375H9.687v6.848A8.938 8.938 0 0 0 9 .062Z" fill="#85878F" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/intent/tweet?text=<?php the_permalink(); ?>">
                  <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.176 2.801a.687.687 0 0 0-.77-.24c-.843.284-1.72.458-2.607.517a4.125 4.125 0 0 0-7.487 2.278A10.286 10.286 0 0 1 3.725.867a.688.688 0 0 0-1.239.191 11.705 11.705 0 0 0 3.856 12.17 10.265 10.265 0 0 1-4.807 1.27.688.688 0 0 0-.324 1.29 11.69 11.69 0 0 0 17.327-9.464 11.655 11.655 0 0 0 2.65-2.717.687.687 0 0 0-.012-.806Z" fill="#85878F" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div>
          <article>
            <?php $i=1; if(get_field('blocks')): ?>
            <?php while(the_repeater_field('blocks')): ?>
            <div data-theme="theme-<?php echo $i; ?>" <?php if ($i>1){ ?>id="theme-<?php echo $i; ?>"<?php } ?>>
              <?php the_sub_field('text'); ?>
            </div>
            <?php $i++; endwhile; ?>
            <?php endif; ?>

          </article>
        </div>
        <div></div>
        <div class="post-page__card">
          <h4>Newest Articles</h4>
          <ul class="posts mt-20 sm-max:mt-25">
            <?php $news = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 2,'post__not_in'=>array($postid))); ?>
            <?php if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>
            <li>
              <div class="post">
                <a href="<?php echo get_permalink(); ?>" class="post__pic">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/post-4.png" alt="">
                </a>
                <div class="mt-10">
                  <span class="color-muted lh-155"><?php echo get_the_date(); ?></span>
                </div>
                <div class="post__title mt-10">
                  <h5>
                    <a href="<?php echo get_permalink(); ?>" class="color-white truncate">
                      <?php echo truncate(get_the_title(),100); ?>
                    </a>
                    <span class="hover-decor">
                      <img src="<?php bloginfo('template_directory'); ?>/assets/images/content/hover-decor.svg" alt="" />
                    </span>
                  </h5>
                </div>
                <div class="mt-10 color-white lh-155 truncate">
                  <p>
                    <?php echo truncate(get_field('short_text'),150); ?>
                  </p>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
