<?php

$_articles = array();
$_articles[] = array(
    'title' => 'Vorfinanzierung von Filmrechten',
    'amount' => '150.000 €',
    'interest' => '6,99% ',
    'duration' => '2 Jahre',
    'funded' => '96%',
    'amount_pending' => '146.000 €',
    'days_left' => '13 Tage',
    'risk_class' => 'grade-a',
    'risk_title' => 'A+',
);

$_articles[] = array(
    'title' => 'Investition in Maschinenpark für einen',
    'amount' => '90.000 €',
    'interest' => '16,99% ',
    'duration' => '6 Monate',
    'funded' => '100%',
    'amount_pending' => '46.000 €',
    'days_left' => '4 Tage',
    'risk_class' => 'grade-b',
    'risk_title' => 'B',
);

$_articles[] = array(
    'title' => 'Italienische Gastlichkeit in Verden',
    'amount' => '25.000 €',
    'interest' => '8,62% ',
    'duration' => '1 Jahr',
    'funded' => '1%',
    'amount_pending' => '74.200 €',
    'days_left' => '24 Tage',
    'risk_class' => 'grade-c',
    'risk_title' => 'C',
);

return array(
    'name' => 'Twig designer',
    '_articles' => $_articles,
);
