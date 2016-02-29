'use strict';
function valider() {
    console.log("fonction valider");
    // est_valide :
    //  - si false, le formulaire ne sera pas soumis
    //  - si true, il sera soummis
    var est_valide = false;

    var password_ok = (document.adminco.password.value = "egypte");
    console.log(password_ok ? 'pass valide' : 'pass pas valide');

    $(infos_admin).show();

}


/**
 * NE PAS TOUCHER À LA FONCTION SUIVANTE
 */
$(function() {
    $(document.admin).submit(function(ev) {
        console.log("Submit event listener");
        var validation_ok = valider();
        if ( ! validation_ok) {
            ev.preventDefault();
        }
        return validation_ok;
    });
});