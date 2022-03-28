<?php
use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;

include_once 'Sample_Header.php';
require_once '../vendor/autoload.php';


$phpWord = new \PhpOffice\PhpWord\PhpWord();
// Template processor instance creation
echo date('H:i:s') , ' Creating new TemplateProcessor instance...' , EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('files/Convention.docx');

// ENCADRANT
$templateProcessor->setValue('NOM_ENCADRANT', 'Behira');
$templateProcessor->setValue('PRENOM_ENCADRANT', 'MEHDI');

// ENTREPRISE
$templateProcessor->setValue('RAISON_SOCIAL_ENTREPRISE', 'XXX');
$templateProcessor->setValue('ADRESSE_SIEGE_ENTREPRISE', 'XXX');
$templateProcessor->setValue('CP_SIEGE_ENTREPRISE', 'XXX');
$templateProcessor->setValue('VILLE_SIEGE_ENTREPRISE', 'XXX');
$templateProcessor->setValue('PRENOM_DIRIGEANT', 'XXX');
$templateProcessor->setValue('NOM_DIRIGEANT', 'XXX');

// DIRIGEANT
$templateProcessor->setValue('FONCTION_DIRIGEANT', 'XXX');
$templateProcessor->setValue('TEL_ENTREPRISE', 'XXX');
$templateProcessor->setValue('MAIL_ENTREPRISE', 'XXX');

// MAITRE STAGE
$templateProcessor->setValue('NOM_MAITRE', 'XXX');
$templateProcessor->setValue('PRENOM_MAITRE', 'XXX');
$templateProcessor->setValue('FONCTION_MAITRE', 'XXX');
$templateProcessor->setValue('TEL_MAITRE', 'XXX');
$templateProcessor->setValue('MAIL_MAITRE', 'XXX');

// ETUDIANT
$templateProcessor->setValue('NOM_ETUDIANT', 'XXX');
$templateProcessor->setValue('PRENOM_ETUDIANT', 'XXX');
$templateProcessor->setValue('DATE_NAISSANCE_ETUDIANT', 'XXX');
$templateProcessor->setValue('ADRESSE_FIXE_ETUDIANT', 'XXX');
$templateProcessor->setValue('CP_FIXE_ETUDIANT', 'XXX');
$templateProcessor->setValue('VILLE_FIXE_ETUDIANT', 'XXX');
$templateProcessor->setValue('TEL_PORTABLE_ETUDIANT', 'XXX');
$templateProcessor->setValue('MAIL_ETUDIANT', 'XXX');

// STAGE
$templateProcessor->setValue('MISSION_STAGE', 'XXX');
$templateProcessor->setValue('SUJET_STAGE', 'XXX');
$templateProcessor->setValue('DATE_DEBUT_STAGE', 'XXX');
$templateProcessor->setValue('DATE_FIN_STAGE', 'XXX');
$templateProcessor->setValue('DUREE_SEMAINE_STAGE', 'XXX');
$templateProcessor->setValue('NB_HEURE_SEMAINE', 'XXX');

echo date('H:i:s'), ' Saving the result document...', EOL;
$templateProcessor->saveAs('files/ConventionRemplie.docx');

echo getEndingNotes(array('Word2021' => 'docx'), 'ConventionRemplie.docx');

if (!CLI) {
    include_once 'Sample_Footer.php';
}