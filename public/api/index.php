<?php
    require_once __DIR__.'/config/app.php';
    use GoogleSearchResults as GoogleSearch;
    

    $params = [
        "engine" => "google_local",
        "q" => "igreja",
        "location" => "luanda",
        "hl" => "pt",
    ];

    $client = new GoogleSearch(KEY_API);
    $data = $client->get_html($params);
    
    echo $data; 


   /*  foreach ($data->news_results as $noticia) {
        echo "<h3>$noticia->thumbnail</h3>";
    } */
    ?>

    

    