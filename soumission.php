<?php
require_once('views/page_top.php');// Inclusion des defines


define('P_NOM','nom');
define('P_MESSAGE', 'message');
define('P_COURRIEL', 'courriel');
define('P_ADRESSE', 'adresse');
define('P_TEL', 'tel');


$nom_est_valide=false;
$message_est_valide=false;
$courriel_est_valide=false;
$adresse_est_valide=false;
$tel_est_valide=false;
$validation_message = '';

/*Solution du début*/
// Indique que le script est appelé en post (réception ds données du formulaire)

$en_reception =
    array_key_exists(P_NOM , $_POST)
    && array_key_exists(P_COURRIEL , $_POST)
    && array_key_exists(P_MESSAGE , $_POST)
    && array_key_exists('soumettre' , $_POST);

//VALIDATION DU NOM
if ($en_reception) {
    $nom_val = filter_input(INPUT_POST, P_NOM, FILTER_SANITIZE_STRING); //regle <=> regexp
    $nom_est_valide = (strlen($nom_val) >=1 ); //valide si la longueur>1

    if ( ! $nom_est_valide ) {
        $validation_message .= '<span class="error_case">Le nom n\'est pas valide (1 caractère min). </span>';
    }
}

//VALIDATION DU COURRIEL
if($en_reception) {
    $courriel_val = filter_input(INPUT_POST, P_COURRIEL, FILTER_VALIDATE_EMAIL);
    $courriel_est_valide = ($courriel_val !== false); //valide si n'est pas = a false

    if(! $courriel_est_valide){
        $validation_message .= '<span class="error_case">Le courriel n\'est pas valide (mettre un @ et un .). </span>';
    }
}

//VALIDATION DU MESSAGE
if($en_reception) {
    $message_val = filter_input(INPUT_POST, P_MESSAGE, FILTER_SANITIZE_STRING);
    $message_est_valide =  (strlen($message_val) >= 10);

    if (! $message_est_valide) {
        $validation_message .= '<span class="error_case">Le message n\'est pas valide (10 caractère min). </span>';
    }
}

//VALIDATION DE L'ADRESSE
if($en_reception) {
    $adresse_val = filter_input(INPUT_POST, P_ADRESSE, FILTER_SANITIZE_STRING);
    $adresse_est_valide =  (strlen($adresse_val) >= 2);

    if (! $adresse_est_valide) {
        $validation_message .= '<span class="error_case">L\'adresse n\'est pas valide (2 caractère min). </span>';
    }
}

//VALIDATION DU TEL
if($en_reception) {
    $tel_val = filter_input(INPUT_POST, P_TEL, FILTER_SANITIZE_STRING);
    $tel_est_valide =  (strlen($tel_val) >= 10);

    if (! $tel_est_valide) {
        $validation_message .= '<span class="error_case">Le format doit être: XXX-XXX-XXXX. </span>';
    }
}



if($nom_est_valide && $courriel_est_valide && $message_est_valide && $adresse_est_valide && $tel_est_valide) {
    header('Location:' . CONF) ;

    exit;
}
/*--------------------------------------------------------------------------------------------------------------------*/



//require_once('views/page_top.php');// Inclusion des defines
//?>
<div id="propos">
    <!--    laisser car img se trouve dedans-->
</div>
<div id="wrapper">
    <h1 class="center">Décrivez nous votre projet !</h1>

<main class="roundedbox">
    <p id="form-feedback"><?= $validation_message?></p>
    <form name="contact_form" method="post">
        <div class="form-line">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"
                   value="<?= isset($_POST['nom']) ? $_POST['nom'] : '' ?>" />
        </div>

        <div class="form-line">
            <label for="courriel">Courriel :</label>
            <input type="text" name="courriel" id="courriel"
                   value="<?= isset($_POST['courriel']) ? $_POST['courriel'] : '' ?>"/>
        </div>

        <div class="form-line">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse"
                   value="<?= isset($_POST['adresse']) ? $_POST['adresse'] : '' ?>"/>
        </div>

        <div class="form-line">
            <label for="tel">Téléphone :</label>
            <input type="text" name="tel" id="tel"
                   value="<?= isset($_POST['tel']) ? $_POST['tel'] : '' ?>"/>
        </div>

        <div class="form-line">
            <label for="message">Titre Projet :</label>
            <input type="text" name="message" id="message"
                   value="<?= isset($_POST['message']) ? $_POST['message'] : '' ?>"/>
        </div>


        <div class="form-line">
        <textarea>Parlez nous de votre projet !
        </textarea>
        </div>


            <div id="upload1">
                <input type="file" id="files" name="files[]" multiple />
                <output id="list"></output>
            </div>
            <div id="infos">
            </div>

        <div class="form-line">
            <input type="submit" value="Soumettre" name="soumettre">
        </div>
        </div>

    </form>
</main>

</main>
<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>
