<?php
require_once('views/page_top.php');// Inclusion des defines
require_once('defines.php');

define('P_NOM','nom');
define('P_MESSAGE', 'message');
$nom_est_valide=false;
$message_est_valide=false;
$validation_message = '';

$en_reception =
    array_key_exists(P_NOM , $_POST)
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

//VALIDATION DU MESSAGE
if($en_reception) {
    $message_val = filter_input(INPUT_POST, P_MESSAGE, FILTER_SANITIZE_STRING);
    $message_est_valide =  (strlen($message_val) >= 3);

    if (! $message_est_valide) {
        $validation_message .= '<span class="error_case">Veuillez insérer un titre (3 caractère min). </span>';
    }
}

if($nom_est_valide  && $message_est_valide) {
    header('Location:' . CFDB) ;

    exit;
}

?>
<div id="propos">
    <!--    laisser car img se trouve dedans-->
</div>

<div id="wrapper">



<!--    <div id="infos">-->
        <main class="roundedbox">
            <p id="form-feedback"><?= $validation_message?></p>
            <div id="upload">
                <input type="file" id="files" name="files[]" multiple />
                <output id="list"></output>
            </div>
            <form name="contact_form" method="post">
                <div class="form-line">
                    <label for="nom">Nom Complet:</label>
                    <input type="text" name="nom" id="nom"
                           value="<?= isset($_POST['nom']) ? $_POST['nom'] : '' ?>" />
                </div>

                <div class="form-line">
                    <label for="message">Objet :</label>
                    <input type="text" name="message" id="message"
                           value="<?= isset($_POST['message']) ? $_POST['message'] : '' ?>"/>
                </div>


                <div class="form-line">
        <textarea>Faites nous part de votre critique ici!
        </textarea>
                </div>

                <div class="link">
                    <input type="submit" value="Soumettre" name="soumettre">
                </div>



    </div>





<!--</div>-->

<?php
require_once('views/page_bottom.php');// Inclusion des defines
?>
