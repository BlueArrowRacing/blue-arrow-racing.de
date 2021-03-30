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
	<meta property="og:url" content="https://bluearrowracing.github.io/">
	<meta property="og:title" content="Willkommen bei Blue Arrow Racing!">
	<meta property="og:description" content="Blue Arrow Racing">
	<meta property="og:image" content="/img/photos/2.jpg">

    <!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://bluearrowracing.github.io/">
	<meta property="twitter:title" content="Willkommen bei Blue Arrow Racing!">
	<meta property="twitter:description" content="Blue Arrow Racing">
	<meta property="twitter:image" content="/img/photos/2.jpg">
    <meta name="twitter:dnt" content="on">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Blue Arrow Racing">
	<meta name="google-site-verification" content="OSza4Rp6OZnf0_ff--nny2ZOq62a3c4F850d3aUWM6I">

    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
    <link rel="manifest" href="img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
    <h1 class="center">Artikel</h1>
    <h2 class="center">Work in progress...</h2>

    <div class="articles">
    
    <?php 
    
    $article_files = glob("articles/*.html");

    foreach($article_files as $article_file) {
        $article_prefix = explode(".", $article_file, 2)[0];
        
        $article_title = $article_prefix;
        $article_title = str_replace("_", " ", $article_title);
        $article_title = str_replace("articles/", "", $article_title);

        $article_related_files = glob($article_prefix . ".*");

        foreach ($article_related_files as $related_file) {
            if( strpos($related_file, ".png") !== false || strpos($related_file, ".jpg") !== false) { // !== false ist nötig, da auch 0 als false evaluiert würde
                $article_image_file = $related_file;
            }
        }

        echo "<div class=\"article-entry\"><a href=\"/" . $article_file . "\">";

        if(isset($article_image_file)) {
            echo "<img class=\"article-image\" src=\"/" . $article_image_file . "\">";
            unset($article_image_file);
        }

        echo "<div class=\"article-title\">" . $article_title . "</div></a></div><hr class='dashed'>";
    }

    ?>
    
    </div>

    <?php readfile("html/main-menu.html");?>
</html>