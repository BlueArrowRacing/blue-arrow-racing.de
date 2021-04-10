<!Doctype HTML>

<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Artikel | Blue Arrow Racing</title>

    <meta name="title" content="Artikel | Blue Arrow Racing">
    <meta name="description" content="Artikel | Blue Arrow Racing">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://blue-arrow-racing.de/">
	<meta property="og:title" content="Willkommen bei Blue Arrow Racing!">
	<meta property="og:description" content="Blue Arrow Racing">
	<meta property="og:image" content="/img/photos/2.jpg">

    <!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://blue-arrow-racing.de/">
	<meta property="twitter:title" content="Willkommen bei Blue Arrow Racing!">
	<meta property="twitter:description" content="Blue Arrow Racing">
	<meta property="twitter:image" content="/img/photos/2.jpg">
    <meta name="twitter:dnt" content="on">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Blue Arrow Racing">
	<meta name="google-site-verification" content="OSza4Rp6OZnf0_ff--nny2ZOq62a3c4F850d3aUWM6I">

    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
    <div class="sidepadding">
        <h1 class="center big-margin-top">Artikel</h1>
        <p class="center">Hier berichten wir über Neuigkeiten und Ereignisse rund um unser Team.</p>

        <hr class="dashed">

        <div class="articles">
        
        <?php 
        
        function endsWith($string, $endString) {
            $len = strlen($endString);
            if ($len == 0) {
                return true;
            }
            return (substr($string, -$len) === $endString);
        }

        $article_dirs = array_reverse(glob("articles/*/"));

        foreach($article_dirs as $article_dir) {

            $article_related_files = glob($article_dir . "*");

            foreach($article_related_files as $article_related_file) {

                if(endsWith($article_related_file, "article.json")) {

                    $article_data_file = $article_related_file;
                    continue;
                }
            }

            if(isset($article_data_file)) {
                $article_data_string = file_get_contents($article_data_file);
                $article_data = json_decode($article_data_string);
            }

            if(isset($article_data)) {
                echo "<a class=\"no-hover-colorfx\" href=\"". $article_dir ."article.html\"><div class=\"article-entry\">";

                if(isset($article_data->image)) {
                    echo "<img class=\"article-image\" src=\"" . $article_data->image . "\">";
                }
                
                if(isset($article_data->title)) {
                    echo "<h3 class=\"article-title\">" . $article_data->title . "</h3>";
                }

                if(isset($article_data->author)) {
                    echo "<div class=\"article-author\">" . $article_data->author . "</div>";
                }

                if(isset($article_data->date)) {
                    echo "<div class=\"article-date\">" . $article_data->date . "</div>";
                }

                echo "</div></a>";
                echo "<hr class=\"dashed\">";
            }

            unset($article_data);
        }

        ?>
        
        </div>
    </div>

    <div class="footer-include" include-html="/html/footer.html"></div>
    <div class="wordmark-include" include-html="/html/wordmark.html"></div>
    <?php readfile("html/main-menu.html");?>
    
    <script src="/js/include.js"></script>
</html>
