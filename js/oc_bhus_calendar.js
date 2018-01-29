jQuery( document ).ready(function($) {
    $('.pager').find('a').click(function(){
        
    });
    /*
     * Create options color
     */
    $('option:contains("Amfitrappen")').addClass('colors-taxonomy-term-Amfitrappen_2_sal');
    $('option:contains("Borgernes Torv")').addClass('colors-taxonomy-term-Borgernes_Torv_1_sal');
    $('option:contains("Borgernes værksted")').addClass('colors-taxonomy-term-Borgernes_værksted_2_sal');
    $('option:contains("Gardinrum")').addClass('colors-taxonomy-term-Gardinrum_stuen');
    $('option:contains("Musikscenen")').addClass('colors-taxonomy-term-Musikscenen_2_sal');
    $('option:contains("Scene")').addClass('colors-taxonomy-term-Scene_stuen');
    $('option:contains("Store scene")').addClass('colors-taxonomy-term-Store_scene_café_2_sal');
    $('option:contains("Udstillingsområde (kælder)")').addClass('colors-taxonomy-term-Udstillingsområde_kælder');
    $('option:contains("Udstillingsområde (stuen)")').addClass('colors-taxonomy-term-Udstillingsområde_stuen');
    $('label[for=edit-field-date-value-min]').toggle();
});

