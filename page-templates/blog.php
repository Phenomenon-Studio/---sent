<?php
/*
Template name: Blog
*/
get_header();
$exclude_id=0;
?>
<main class="flex-auto flex flex-col" data-wrap-flex>
  <section class="mt-25 sm-max:mt-20">
    <div class="container">
      <div class="card card:hover card--xl sm-max:inline-flex">
        <?php $news = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 1)); ?>
        <?php if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); $exclude_id=$post->ID;?>

         <div class="card__holder h-full card__items sm-max:mb-10">
          <a href="<?php the_permalink(); ?>" class="block image image--rounded-md min-h-235">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
          </a>
          <div class="pl-30 md-max:pl-0 max-w-550">
            <span class="color-muted lh-155"><?php echo get_the_date(); ?></span>
            <div class="chips mt-10">
              <?php $tags = get_the_terms( $post->ID, 'category' ); ?>
              <?php foreach ($tags as $t){ ?>
              <span class="chip chip--sm chip--outline">
                <span><?php echo $t->name; ?></span>
              </span>
              <?php } ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="inline-flex mt-10">
              <h4 class="lh-125"><?php the_title(); ?></h4>
            </a>
            <div class="color-white lh-155 mt-10 truncate truncate--line-4">
              <p>
                <?php echo truncate(get_field('short_text'),300); ?>
              </p>
            </div>
            <div class="mt-15">
              <a href="<?php the_permalink(); ?>" class="btn btn--outline">
                Read the article
              </a>
            </div>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata();?>
      </div>
    </div>
  </section>

  <section class="flex-auto flex mt-60 mt-80 mb-100 sm-max:mb-80">
    <div class="container">
      <div class="flex sm-max:block h-full">
        <div class="w-full max-w-265 mr-24 sm-max:max-w-none sm-max:mr-0 flex-none">
          <div class="posts-search">
            <form class="form" autocomplete="off" action="" method="GET" data-search>
              <div class="form__control">
                <label>
                  <input type="search" value="<?php echo $_GET['search']; ?>" name="search" autocomplete="off" placeholder="Search">
                  <svg class="icon-search">
                    <use xlink:href="#icon-search"></use>
                  </svg>
                </label>
              </div>
              <div class="chips-slider:xs mt-20">
                <div data-slider-mq="479">
                  <div class="swiper-wrapper">
                    <?php
                    $categories = get_categories();
                    foreach($categories as $category) {?>
                    <div class="swiper-slide">
                      <label class="checkbox">
                        <input type="checkbox" <?php if (is_array($_GET['tag']) && isset($_GET['tag'])){ if (in_array($category->term_id,$_GET['tag'])){ echo 'checked';} } ?> name="tag[]" value="<?php echo $category->term_id; ?>">
                        <span class="chip chip--sm chip--outline">
                          <span><?php echo $category->name; ?></span>
                        </span>
                      </label>
                    </div>
                    <?php }
                    ?>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="flex-auto sm-max:mt-30">
          <div class="h-full" data-items-holder>
          <?php get_template_part('blog_inner'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php wp_reset_postdata();?>
<?php get_footer(); ?>
