<?php
/**
* The default template for displaying news via the hub's api
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/
?>
<h3 class="hub-title">Related News from <a href="https://hub.jhu.edu/">The Hub</a></h3>
<?php
$theme_option = flagship_sub_get_global_options();
$keywords = $theme_option['flagship_sub_hub_keywords'];
$hub_url = 'https://api.hub.jhu.edu/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&tags=' . $keywords . '&per_page=3';
	$hub_call = wp_remote_get($hub_url);
	if (is_array($hub_call) && !empty($hub_call['body'])) {
		$hub_results = json_decode($hub_call['body'], true);
	} else {
		return false; // wp_remote_get failed somehow
	}
$hub_articles = $hub_results['_embedded'];
foreach ($hub_articles['articles'] as $hub_article ) { ?>
	<article class="hub-article news-item" itemscope itemtype="http://schema.org/BlogPosting" aria-labelledby="post-<?php echo $hub_article['id'];?>">
		<header class="article-header">
			<?php $date = $hub_article['publish_date'];?>
			<h2 class="uppercase black" itemprop="datePublished"><?php echo date('F d, Y', $date);?></h2>
			<h1 class="entry-title single-title" itemprop="headline">
			<a href="<?php echo $hub_article['url']; ?>" id="post-<?php echo $hub_article['id'];?>"><?php echo $hub_article['headline']; ?></a>
			</h1>
		</header>
		<div class="entry-content" itemprop="articleBody">
			<img class="floatleft hub-thumb" src="<?php echo $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail']; ?>" alt="From The Hub: <?php echo $hub_article['headline']; ?>" />
			<summary>
			<p><?php echo $hub_article['subheadline'];
					if (empty($hub_article['subheadline']) ) {
						echo $hub_article['excerpt'];
				} ?>
			</p>
			</summary>
		</div>
		<hr>
	</article>
<?php } ?>