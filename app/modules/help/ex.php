<?php

$articles = array();

for ($i=1; $i<=5; $i++) {
    $articles[] = array(
        'id' => $i,
        'title' => 'Article ' . $id,
        'author' => 'Author ' . $id,
    );
}

// return content to view
return array(
    'articles' => $articles,
    'page_title' => 'help page', // always must have a comma at the end of line inside arrays
);
