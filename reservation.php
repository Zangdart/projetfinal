<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('data/forfaits.php');// Inclusion des forfaits

$id_forfait=$_GET['forfait_id']; /*faire un if array key exist */
$forfait=get_forfaits()[$id_forfait];
//var_dump($id_forfait);
?>
<?php
/**
 * Fomulaire à valider
 */

// Format des dates utilisé
define('FORMAT_DATE', 'y-m-d');

// Les différents noms de champs du formulaire
define('CHAMP_DATE', 'date_debut');

// La date d'aujourd'hui sous forme d'objet DateTime
// Servira à la validation et à l'initialisation des champs de formulaire
$aujourdhui = new DateTime();

// Variable booléenne qui indique si on est en reception
//var_dump($_POST);
$en_reception = array_key_exists(CHAMP_DATE, $_POST) /*&& array_key_exists(DATE_FIN, $_POST)*/;

// Validation du champ CHAMP_DATE
$date_ok = false; // Par défaut, on met tous les champs à NON valide jusqu'à preuve du contraire
$date_val = null;
$date_msg = '';

if ($en_reception) {
    // Première vérification : Le format de la date saisie est conforme à celui défini
    $date_str = filter_input(INPUT_POST, CHAMP_DATE, FILTER_SANITIZE_STRING); // Nottoyer la chaîne reçue en POST
    $date_tb = date_parse_from_format(FORMAT_DATE, $date_str); // Faire vérifier le format date par PHP
    $date_ok = checkdate($date_tb['month'], $date_tb['day'], $date_tb['year']);
    if ( ! $date_ok) {
        $date_msg = "La date ne correspond pas au format (" . FORMAT_DATE . ") ou n'est pas valide.";
    }
    // Second vérification : La date est postérieure à aujourd'hui
    if ($date_ok) {
        $date_val = DateTime::createFromFormat(FORMAT_DATE, $date_str);
        $date_ok = $date_val >= $aujourdhui;
        if ( ! $date_ok) {
            $date_msg = "La date doit être postérieure à aujourd'hui.";
        }
    }
}

// Validité totale du questionnaire : On passe en revue les valeurs 'is_valid' de tous les champs
//$formulaire_valide = $date_ok;
//
//// Si le questionnaire est valide, on affiche un résumé (ou une redirection vers une autre page)
//if ($formulaire_valide) {
//    // Enregistrement ou traitement des données
//    // Eventuellement affichage récapitulatif des données
//    // Eventuellement redirection avec header('location: apresFormulaire.php');
//    exit();
//}

?>
<?php
/**
 * Fomulaire à valider
 */
//var_dump($_POST);


// Par défaut, je mets tous les champs à NON VALIDE jusqu'à vérification du contraire
$validation = array(
        'lastname' => array(
            'is_valid' => false,
            'value' => null,
            'err_msg' => '',
        ),
        'firstname' => array(
            'is_valid' => false,
            'value' => null,
            'err_msg' => '',
        ),
        'email' => array(
            'is_valid' => false,
            'value' => null,
            'err_msg' => '',
        ),
    'adresse' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => '',
    ),
    'tel' => array(
        'is_valid' => false,
        'value' => null,
        'err_msg' => '',
    ),
);

//<!--// Champ lastname-->
$validation['lastname']['value'] = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$validation['lastname']['is_valid'] = (1 === preg_match('/\w{2,}/', $validation['lastname']['value']));
$validation['lastname']['err_msg']= "";

if(!$validation['lastname']['is_valid']){                   //METTRE LA VALIDATION
    $validation['lastname']['err_msg']= "Veuillez entrer votre nom ";
}


//<!--// Champ firstname-->
$validation['firstname']['value'] = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$validation['firstname']['is_valid'] = (1 === preg_match('/\w{2,}/', $validation['firstname']['value']));
$validation['firstname']['err_msg']= "";

if(!$validation['firstname']['is_valid']){                   //METTRE LA VALIDATION
    $validation['firstname']['err_msg']= "Veuillez entrer votre prénom";
}

//<!--// Champ email-->
$validation['email']['value'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$validation['email']['is_valid'] = false !== filter_var($validation['email']['value'], FILTER_VALIDATE_EMAIL);
$validation['email']['err_msg']= "";

if(!$validation['email']['is_valid']){                   //METTRE LA VALIDATION
    $validation['email']['err_msg']= "Veuillez mettre un @ et un . dans votre email";
}
$validation['adresse']['value'] = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING);
$validation['adresse']['is_valid'] = (1 === preg_match('/\w{2,}/', $validation['adresse']['value']));
$validation['adresse']['err_msg']= "";

if(!$validation['adresse']['is_valid']){                   //METTRE LA VALIDATION
    $validation['adresse']['err_msg']= "Veuillez entrer votre adresse avec chiffres et lettres";
}
$validation['tel']['value'] = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$validation['tel']['is_valid'] = (1 === preg_match('/\w{2,}/', $validation['tel']['value']));
$validation['tel']['err_msg']= "";

if(!$validation['tel']['is_valid']){                   //METTRE LA VALIDATION
    $validation['tel']['err_msg']= "Format : XXX-XXX-XXXX";
}



// Validité totale du questionnaire : On passe en revue les valeurs 'is_valid' de tous les champs
$formulaire_valide = true;
foreach ($validation as $field) {
    if (! $field['is_valid']) {
        $formulaire_valide = false;
        break;
    }
}

// Si le questionnaire est valide, on affiche un résumé (ou une redirection vers une autre page)
if ($formulaire_valide) {
    // Enregistrement ou traitement des données
    // Eventuellement affichage récapitulatif des données
    // Eventuellement redirection avec header('location: apresFormulaire.php');
    header('Location:index.php');
    exit();
//    exit('<h1>Votre réservation est confirmée, merci!</h1>');

}

?>



<!-- **********************************************Debut du form*****************************************************-->
<h2>Réservation</h2>

<?php
echo "<div id='dynamique'>";
echo "<p> Vous avez choisi : <span>",$forfait['nom'],"</span></p>";
echo "<p> De la catégorie : <span>",$forfait['categorie'],"</span></p>";
echo "<p> Récapitulatif de votre forfait :<span> ",$forfait['description'],"</span></p>";
echo "<p> La durée de votre voyage sera de :<span> ",$forfait['duree']," jours </span></p>";
echo "<p> Entre les dates suivantes :<span> ",$forfait['debut_saison']," et ", $forfait['fin_saison'],"</span></p>";
echo "<p> Pour la modique somme de :<span> ",$forfait['prix']," $ </span></p>";
echo "<p> Vous pouvez amener :<span> ",$forfait['nbr_max_animaux']," animaux </span></p>";
echo "<p> Avec un coût de  :<span> ",$forfait['prix_animal']," $ par animal </span></p>";
//echo "<img  src='images/$forfait[photo1]' />";
//var_dump($forfait);
echo "</div>";

//?>

<!-------------------------------------------PARTIE DYNAMIQUE ICI (TOP)------------------------------------------------>


<main>
    <div id="wrapper">
        <div id="contenu">
            <form id="form_resa" name="form_resa" method="post" novalidate="novalidate">
                <div>
                    <label for="lastname">Nom:</label>
                    <input name="lastname" id="lastname" type="text" required="required" pattern="[a-zA-Z]{1,20}" title="Mettre une majuscule en début de nom"
                    class="<?php echo $validation['lastname']['is_valid'] ? '' : 'champ_invalide'; ?>"
                    value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>"
                    <?= empty($validation['lastname']['err_msg']) ? '' : "<span>{$validation['lastname']['err_msg']}</span>" ?>

                </div>

                <div>
                    <label for="firstname">Prénom:</label>
                    <input name="firstname" id="firstname" type="text" required="required" pattern="[a-zA-Z]{1,20}" title="Mettre une majuscule en début de prénom" class="<?php echo $validation['firstname']['is_valid'] ? '' : 'champ_invalide'; ?>"
                           value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>"/>

                    <?= empty($validation['firstname']['err_msg']) ? '' : "<span>{$validation['firstname']['err_msg']}</span>" ?>

                </div>

                <div>
                    <label for="adresse">Adresse:</label>
                    <input name="adresse" id="adresse" type="text" required="required" pattern="[a-zA-Z0-9_ ]{1,100}" title="Mettre une adresse avec chiffres et lettres"  class="<?php echo $validation['adresse']['is_valid'] ? '' : 'champ_invalide'; ?>"
                    value="<?php echo isset($_POST['adresse']) ? $_POST['adresse'] : ''; ?>"/>

                    <?= empty($validation['adresse']['err_msg']) ? '' : "<span>{$validation['adresse']['err_msg']}</span>" ?>


                </div>
                <div>
                    <label for="email">Courriel:</label>
                    <input name="email" id="email" type="text" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Mettre un @ dans votre adresse" class="<?php echo $validation['email']['is_valid'] ? '' : 'champ_invalide'; ?>"
                           value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/>

                    <?= empty($validation['email']['err_msg']) ? '' : "<span>{$validation['email']['err_msg']}</span>" ?>
                </div>
                <div>
                    <label for="tel">Téléphone:</label>
                    <input name="tel" id="tel" type="text" required="required" pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="Format : 514-555-5555" class="<?php echo $validation['tel']['is_valid'] ? '' : 'champ_invalide'; ?>"
                           value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : ''; ?>"/>

                    <?= empty($validation['tel']['err_msg']) ? '' : "<span>{$validation['tel']['err_msg']}</span>" ?>
                </div>
                <div>
                    <label for="nb-participants">Nombre de participants:</label>
                    <input required="required" name="nb-participants" id="nb-participants" type="number" value="1" step="1" max="<?php echo $forfait['places_dispo']?>" min=1?>
                </div>
                <div class="form-line">
                    <label for="<?=CHAMP_DATE?>">Date d'arrivée</label>
                    <input type="datetime"
                           name="<?=CHAMP_DATE?>"
                           id="<?=CHAMP_DATE?>"
                           class="<?= $en_reception && ! $date_ok ? 'champ_invalide' : '' ; ?>"
                           value="<?php echo isset($_POST[CHAMP_DATE]) ? $_POST[CHAMP_DATE] : $aujourdhui->format(FORMAT_DATE); ?>" />
                    <?= empty($date_msg) ? '' : "<span>$date_msg</span>" ?>
                </div>
<!--                <div>-->
<!--                    <label for="date-debut">Vos dates : </label>-->
<!--                    <input required="required" name="date-debut" id="date-debut" type="date" min="--><?php //echo $forfait['debut_saison']?><!-- max="--><?php //echo $forfait['fin_saison']?><!--">-->
<!--                </div>-->
                <div>
                    <input id="reserver" type="submit" value="Réserver"/>
                </div>

            </form>
        </div>

</main>

<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>



