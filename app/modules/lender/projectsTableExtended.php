<?php

$articles = array();
$articles[] = array(
    'title' => 'Vorfinanzierung von Filmrechten',
    'amount' => '150.000 €',
    'interest' => '6,99% ',
    'duration' => '2 Jahre',
    'funded' => '96%',
    'amount_pending' => '146.000 €',
    'days_left' => '13 Tage',
);

$articles[] = array(
    'title' => 'Investition in Maschinenpark für einen',
    'amount' => '90.000 €',
    'interest' => '16,99% ',
    'duration' => '6 Monate',
    'funded' => '54%',
    'amount_pending' => '46.000 €',
    'days_left' => '4 Tage',
);

return array(
    'name' => 'Twig designer',
    'articles' => $articles,
);
