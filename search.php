<?php
/*
Template Name: Search Results
*/
?>
<?php
get_header();
?>
<div class="row wrapper radius10">
    <main class="large-12 columns content" id="page">
        <h1 class="page-title">Search Results: <?php echo esc_attr(get_search_query()); ?></h1>
        <form method="GET" action="<?php echo home_url( '/' ); ?>" role="search" aria-label="Utility Bar Search">
            <div class="row">
                <div class="large-7 columns">
                    <div class="row collapse">
                        <div class="small-10 columns">
                            <label for="s" class="screen-reader-text">
                                Search This Website
                            </label>
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search this site" aria-label="Search This Website"/>
                        </div>
                        <div class="small-2 columns">
                            <button class="button postfix">
                            <span class="fa fa-search" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
        <article <?php post_class(''); ?> itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php the_ID(); ?>">
            <header class="article-header" aria-label="<?php the_title();?>">
                <h3 class="entry-title single-title search-result" itemprop="headline">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h3>
            </header> <!-- end article header -->
                
            <div class="entry-content" itemprop="articleBody">
                <?php $content = get_the_content();
                $trimmed_content = wp_trim_words( $content, 60, '[...]' ); ?>
                <p><?php echo $trimmed_content; ?></p>
            </div> <!-- end article section -->
                
        </article> <!-- end article -->
        <hr>
        <?php endwhile; ?>
        <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
            ) );
        ?>
        <?php else : ?>
        
        <header class="article-header">
            <h3><?php _e('Sorry, No Results.', 'jointswp');?></h3>
        </header>
        
        <section class="entry-content">
            <p><?php _e('Try your search again.', 'jointswp');?></p>
        </section>
        
        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>