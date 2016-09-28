/**
 * @author Gilles Pénissard
 */


const largeur_image =900; // Largeur des images
const duree_pause_automatique = 1000; // Durée chaque pause en mode auto (en ms)


$(function() {
    var index_image = 0; // Initialisation à la première image
    var ul_slider = $("#sContent");
    var prev_ctrl = $('#slider').find('#prev'); // Lien diapo précdédente
    // console.log(prev_ctrl);
    var next_ctrl = $('#slider').find('#next'); // Lien diapo suivante
    var auto_cb = $('#automatique'); // Check-box mode auto
    var nb_images = ul_slider.children("li").length; // Nb images du slider
    var last_index = nb_images - 1; // Indice de la dernière image (la première est 0)
    var sens_rotation = +1;
    var timer_auto = null; // Timer qui permet l'animation (déclenchement des mouvements)

    /* Assurer l'affichage de la nouvelle diapo et prépare le timer pour la suivante */
    function declencher_auto(afficher_toutdesuite) {
        // Traiter le cas de l'appel par le timer (pas de paramètre --> équivaut à afficher tout de suite)
        if ('boolean' != typeof(afficher_toutdesuite)) {
            afficher_toutdesuite = true;
        }
        if (afficher_toutdesuite) {
            afficher_prochaine();
        }
        timer_auto = setTimeout(declencher_auto, duree_pause_automatique);
    }

    /* Arrêter le mode auto en supprimant tout timer engagé */
    function arreter_mode_auto() {
        clearTimeout(timer_auto);
        timer_auto = null;
    }

    /* Écouter au changement de l'état automatique ou pas */
    auto_cb.change(function(){
        if ($(this).prop('checked')) {
            declencher_auto(true);
        } else {
            arreter_mode_auto();
        }
    });

    /* Assurer l'affichage de la nouvelle diapo (en fonction du sens de rotation*/
    function afficher_prochaine() {
        // Suivant le sens de rotation, gérer l'arrivée en début ou en fin des diapos
        // Le caa ééchéant, inversion du sens de rotation pour un effet de rebond
        if ((-1 == index_image + sens_rotation) || (nb_images == index_image + sens_rotation)) {
            sens_rotation = - sens_rotation; // Inversion sens de rotation
        }
        // Incrémentation de l'indice (sans risque d'être en limite
        index_image = index_image + sens_rotation;
        // "Déplacer" les images avec la propriétét left
        ul_slider.css('left',  (- index_image * largeur_image) + 'px');
        prev_ctrl.toggle(0 != index_image); // Cacher le ctrl prev si on est sur le preière image (le montrer sinon)
        next_ctrl.toggle(nb_images-1 != index_image); // Idem pour le Ctrl prev
    }

    /* Clic aur un des deux controles précédent ou suivant */
    prev_ctrl.add(next_ctrl).click(function () {
        sens_rotation = parseInt($(this).attr('data-sens'));
        arreter_mode_auto();
        afficher_prochaine();
        auto_cb.prop('checked', false);
    });




//ajout ici
var categorie_courante = getParameterByName('FORF_CATEGORY');
var active_tab_index = -1;
console.log('La categorie courante est : ' , categorie_courante);
switch(categorie_courante) {
    case 'Croisières':
        active_tab_index = 0;
        break;
    case 'Sports d\'hiver':
        active_tab_index = 1;
        break;
    case 'Nature':
        active_tab_index = 2;
        break;

    default:
        active_tab_index = 0;
}

});