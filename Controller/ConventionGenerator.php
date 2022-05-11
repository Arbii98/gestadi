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


include "../DB/Config.php";
include "EtudiantCore.php";
include "MaitreCore.php";
$etudiantC = new EtudiantCore();
$etudiant = $etudiantC->getEtudiantForConvention($_GET["id"])[0];

$maitreC = new MaitreCore();
$maitre1 = $maitreC->getMaitreByEntreprise($etudiant->Identifiant_entreprise)[0];


$debut = strtotime($etudiant->Date_debut_stage);
$fin = strtotime($etudiant->Date_fin_stage);
$datediff = $fin - $debut;
$dureeJ = round($datediff / (60 * 60 * 24));
$dureeS = round($dureeJ/7);
echo "Duree J : ".$dureeJ;
echo " Duree S : ".$dureeS."<br>";
// ENCADRANT
$templateProcessor->setValue('NOM_ENCADRANT', $etudiant->nom_tuteur);
$templateProcessor->setValue('PRENOM_ENCADRANT', $etudiant->prenom_tuteur);

// ENTREPRISE
$templateProcessor->setValue('RAISON_SOCIAL_ENTREPRISE', $etudiant->Nom_entreprise);
$templateProcessor->setValue('ADRESSE_SIEGE_ENTREPRISE', $etudiant->rue);
$templateProcessor->setValue('CP_SIEGE_ENTREPRISE', $etudiant->cp);
$templateProcessor->setValue('VILLE_SIEGE_ENTREPRISE', $etudiant->ville);
$templateProcessor->setValue('PRENOM_DIRIGEANT', $etudiant->prenom_dirigeant_entreprise);
$templateProcessor->setValue('NOM_DIRIGEANT', $etudiant->nom_dirigeant_entreprise);

// DIRIGEANT
$templateProcessor->setValue('FONCTION_DIRIGEANT', $etudiant->fonction_dirigeant_entreprise); // Missing in DB
$templateProcessor->setValue('TEL_ENTREPRISE', $etudiant->Telephone_entreprise); // Missing in DB
$templateProcessor->setValue('MAIL_ENTREPRISE', $etudiant->Email_entreprise);

// MAITRE STAGE
// Tuteur dans la convention est le maitre de stage
$templateProcessor->setValue('NOM_MAITRE', $maitre1->Nom_super);
$templateProcessor->setValue('PRENOM_MAITRE', $maitre1->Prenom_super);
$templateProcessor->setValue('FONCTION_MAITRE', $maitre1->Poste_occupe);
$templateProcessor->setValue('TEL_MAITRE', $maitre1->Tel_super);
$templateProcessor->setValue('MAIL_MAITRE', $maitre1->Email_super);

// ETUDIANT

//Sexe missing in DB
$templateProcessor->setValue('NOM_ETUDIANT', $etudiant->Nom_etudiant);
$templateProcessor->setValue('PRENOM_ETUDIANT', $etudiant->Prenom_etudiant);
$templateProcessor->setValue('DATE_NAISSANCE_ETUDIANT', $etudiant->Date_naissance_etudiant);
$templateProcessor->setValue('ADRESSE_FIXE_ETUDIANT', $etudiant->Adresse_etudiant);
$templateProcessor->setValue('CP_FIXE_ETUDIANT', ""); // Missing in DB
$templateProcessor->setValue('VILLE_FIXE_ETUDIANT', ""); //Missing in DB
$templateProcessor->setValue('TEL_PORTABLE_ETUDIANT', $etudiant->Tel_etudiant);
$templateProcessor->setValue('MAIL_ETUDIANT', $etudiant->Email_etudiant);

// STAGE
$templateProcessor->setValue('MISSION_STAGE', $etudiant->Titre_stage); //Difference entre mission et titre ?
//$templateProcessor->setValue('SUJET_STAGE', $etudiant->Titre_stage);
$templateProcessor->setValue('SUJET_STAGE', "");
$templateProcessor->setValue('DATE_DEBUT_STAGE', $etudiant->Date_debut_stage);
$templateProcessor->setValue('DATE_FIN_STAGE', $etudiant->Date_fin_stage);

//Activites confiees : C'est la description du stage.
// Sujet stage a ne pas remplir
// Nombre jours a ne pas remplir

$templateProcessor->setValue('DUREE_SEMAINE_STAGE', $dureeS);
$templateProcessor->setValue('NB_HEURE_SEMAINE', $etudiant->Nb_heures_semaine_stage);

echo date('H:i:s'), ' Saving the result document...', EOL;

$url = 'files/Convention_'.$etudiant->Nom_etudiant." ".$etudiant->Prenom_etudiant.'.docx';
$templateProcessor->saveAs($url);


echo getEndingNotes(array('Word2021' => 'docx'), 'ConventionRemplie.docx');

if (!CLI) {
    include_once 'Sample_Footer.php';
}
header("Content-disposition: attachment;filename=$url");
readfile($url);


echo "<script>window.location.href='../View/Dashboard.php'</script>";