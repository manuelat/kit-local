<?php

/**
 * This file is general for all application. you still can use separate file for each view
 * or add here content if it's general
 */

$articles = array();
$articles[] = array(
    'title' => 'Vorfinanzierung von Filmrechten in Maschinenpark für einen Filmrechten in Maschinenpark für',
    'category' => '1',
    'amount' => '150.000 €',
    'interest' => '6,99% ',
    'duration' => '2 Jahre',
    'funded' => '96%',
    'amount_pending' => '146.000 €',
    'days_left' => '13 Tage',
    'risk_class' => 'grade-a',
    'risk_title' => 'A+',
    'filled' => '20%',
);

$articles[] = array(
    'title' => 'Investition in Maschinenpark für einen',
    'category' => '2',
    'amount' => '90.000 €',
    'interest' => '16,99% ',
    'duration' => '6 Monate',
    'funded' => '100%',
    'amount_pending' => '46.000 €',
    'days_left' => '4 Tage',
    'risk_class' => 'grade-b',
    'risk_title' => 'B',
    'filled' => '35%',
);

$articles[] = array(
    'title' => 'Italienische Gastlichkeit in Verden',
    'category' => '3',
    'amount' => '25.000 €',
    'interest' => '8,62% ',
    'duration' => '1 Jahr',
    'funded' => '70%',
    'amount_pending' => '74.200 €',
    'days_left' => '24 Tage',
    'risk_class' => 'grade-c',
    'risk_title' => 'C',
    'filled' => '60%',
);

$articles[] = array(
    'title' => 'Zukunftsorientierte giftfreie',
    'category' => '4',
    'amount' => '75.000 €',
    'interest' => '8,12% ',
    'duration' => '4 Jahre',
    'funded' => '1%',
    'amount_pending' => '74.200 €',
    'days_left' => '24 Stunden',
    'risk_class' => 'grade-c-minus',
    'risk_title' => 'C-',
    'filled' => '70%',
);


/* NETHERLANDS */

$articles_nl = array();
$articles_nl[] = array(
    'title' => 'Voorfinanciering grote projecten',
    'category' => '1',
    'amount' => '150.000 €',
    'interest' => '6,99% ',
    'duration' => '2 jaren',
    'funded' => '96%',
    'amount_pending' => '146.000 €',
    'days_left' => '13 dagen',
    'risk_class' => 'grade-a',
    'risk_title' => 'A+',
    'filled' => '20%',
);

$articles_nl[] = array(
    'title' => 'Inkoop materialen voor grote opdracht.',
    'category' => '3',
    'amount' => '25.000 €',
    'interest' => '8,62% ',
    'duration' => '6 maanden',
    'funded' => '70%',
    'amount_pending' => '74.200 €',
    'days_left' => '16 dagen',
    'risk_class' => 'grade-c',
    'risk_title' => 'C',
    'filled' => '60%',
);

$articles_nl[] = array(
    'title' => 'Werkkapitaal voor verbouwing kapsalon.',
    'category' => '4',
    'amount' => '125.000 €',
    'interest' => '11,62% ',
    'duration' => '2 jaren',
    'funded' => '30%',
    'amount_pending' => '34.200 €',
    'days_left' => '1 dag',
    'risk_class' => 'grade-b',
    'risk_title' => 'A',
    'filled' => '20%',
);

/* SPAIN */
$articles_es = array();
$articles_es[] = array(
    'title' => 'Resina Plástica - Fabricación depósitos agua, bolsas, cable',
    'category' => '1',
    'amount' => '150.000 €',
    'interest' => '6,99% ',
    'duration' => '2 años',
    'funded' => '96%',
    'amount_pending' => '146.000 €',
    'days_left' => '17 Días',
    'risk_class' => 'grade-a',
    'risk_title' => 'A+',
    'filled' => '20%',
);

$articles_es[] = array(
    'title' => 'Instalación de Unidad de Suministro: Deposito de Gasoil Low Cost',
    'category' => '3',
    'amount' => '25.000 €',
    'interest' => '8,62% ',
    'duration' => '6 meses',
    'funded' => '70%',
    'amount_pending' => '74.200 €',
    'days_left' => '13 horas',
    'risk_class' => 'grade-c',
    'risk_title' => 'C',
    'filled' => '60%',
);

$articles_es[] = array(
    'title' => 'Linea de productos software para la Administración Local',
    'category' => '4',
    'amount' => '125.000 €',
    'interest' => '18,62% ',
    'duration' => '2 Años',
    'funded' => '20%',
    'amount_pending' => '64.200 €',
    'days_left' => '7 Días',
    'risk_class' => 'grade-b',
    'risk_title' => 'B',
    'filled' => '30%',
);

$loan_request = array();

$loan_request[1] = array(
    'step' => 'company_details',
    'category' => 'Unternehmensprofil',
);
$loan_request[2] = array(
    'step' => 'loan_details',
    'category' => 'Kreditprojektdetails ',
);
$loan_request[3] = array(
    'step' => 'approved_signatories',
    'category' => 'Zeichnungsberechtigte',
);
$loan_request[4] = array(
    'step' => 'warrantors_list',
    'category' => 'Bürgen',
);
$loan_request[5] = array(
    'step' => 'upload_documents',
    'category' => 'Upload der Dokumente',
);
$loan_request[6] = array(
    'step' => 'summary',
    'category' => 'Prüfen & Abschicken',
);

$text = array();

/* Dashboard tooltip text */

$text = 'Die Zinsen aus aktiven Geboten zeigen die zu erwartenden Zinszahlungen vor Service-Gebühren. Diese Zinsen erhalten Sie, wenn alle Kredite, in die Sie investiert haben, erfolgreich sind und die jeweiligen Beträge an die Unternehmer ausgezahlt werden.';

$step_url = $this->getParam(3, 1);

return array(
    'name' => 'Twig designer',
    'articles' => $articles, // list of data from loan projects table
    'loan_steps' => $loan_request[$step_url], // step template to load
    'step' => $step_url, // numeric current step from URL (default = 1)
    'articles_nl' => $articles_nl,
    'articles_es' => $articles_es,
    'text_tooltip' => $text,
);
