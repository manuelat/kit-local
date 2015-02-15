<?php

$articles = array();
$articles[] = array(
    'id' => '1',
    'title' => 'article 1',
);

$articles[] = array(
    'id' => '2',
    'title' => 'article 2',
);

return array(
    'name' => 'Twig designer',
    'articles' => $articles,
);
