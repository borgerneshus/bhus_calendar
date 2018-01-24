jQuery( document ).ready(function($) {
    $('.pager').find('a').click(function(){
        
    });
    /*
     * Create options color
     */
    $('option:contains("Amfitrappen")').addClass('colors-taxonomy-term-Amfitrappen');
    $('option:contains("Borgernes Torv")').addClass('colors-taxonomy-term-Borgernes_Torv');
    $('option:contains("Borgernes værksted")').addClass('colors-taxonomy-term-Borgernes_værksted');
    $('option:contains("Gardinrum")').addClass('colors-taxonomy-term-Gardinrum');
    $('option:contains("Musikscenen")').addClass('colors-taxonomy-term-Musikscenen');
    $('option:contains("Scene)').addClass('colors-taxonomy-term-Scene');
    $('option:contains("Store scene")').addClass('colors-taxonomy-term-Store_scene');
    $('option:contains("Udstillingsområde kælder")').addClass('colors-taxonomy-term-Udstillingsområde_kælder');
    $('option:contains("Udstillingsområde stue")').addClass('colors-taxonomy-term-Udstillingsområde_stue');
    $('label[for=edit-field-date-value-min]').toggle();
});

