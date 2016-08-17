<?php require_once('assets/functions/simple_html_dom.php');
$google_id = get_post_meta($post->ID, 'ecpt_google_id', true);
$google = new simple_html_dom;
$google_url = 'http://scholar.google.com/citations?user=' . $google_id . '&view_op=list_works&sortby=pubdate&pagesize=20';
$older_pubs = 'http://scholar.google.com/citations?user=' . $google_id;

// Use curl to access the remote server and store cookies so it can complete requests to Google Scholar without errors.
$curl = curl_init($google_url);

$config['useragent'] = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36';

curl_setopt($curl, CURLOPT_USERAGENT, $config['useragent']);
curl_setopt($curl, CURLOPT_REFERER, 'https://www.domain.com/');

$cookie_dir = TEMPLATEPATH . "/assets/functions/cookies/";
//$config['cookie_file'] = $cookie_dir . md5($_SERVER['REMOTE_ADDR']) . '.txt';
$config['cookie_file'] = $cookie_dir . 'tmp/scholarcookietemp.txt';

// Configure curl options to set up requests properly.
curl_setopt($curl, CURLOPT_COOKIEFILE, $config['cookie_file']);
curl_setopt($curl, CURLOPT_COOKIEJAR, $config['cookie_file']);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Get the HTML data.
$data = curl_exec($curl);
curl_close($curl);

//$google = file_get_html($google_url);

$google = str_get_html($data);

//Updated by TG on 9/2/14. Google changed citation markup from tr.item & td#col-title to tr.gsc_a_tr & td.gsc_a_t/c/y

echo '<p><strong>Displaying the 20 most recent publications. (Please refresh the page if no publications initially appear.)</p>'; 
echo '<p>View the <a href="' . $older_pubs . '">Google Scholar Profile</a> for complete publications list.</strong></p>';


foreach($google->find('tr.gsc_a_tr') as $article) {
    $item['title']  = $article->find('td.gsc_a_t a', 0)->plaintext;
    $item['link']	= $article->find('a.gsc_a_at', 0)->href;
    $item['authors'] = $article->find('td.gsc_a_t .gs_gray', 0)->plaintext;
    $item['pub']	= $article->find('td.gsc_a_t .gs_gray', 1)->plaintext;
    $item['year']   = $article->find('td.gsc_a_y', 0)->plaintext;
    
    ?>
    <p><?php echo $item['authors']; ?><br>
    <a href="http://scholar.google.com<?php echo $item['link'];?>"><?php echo $item['title']; ?></a><br>
    <strong><?php echo $item['pub']; ?></strong>
    </p>
   
    
    <?php } ?>
