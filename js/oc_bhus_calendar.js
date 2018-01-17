jQuery( document ).ready(function($) {
    $('.pager').find('a').click(function(){
        
    });
    /*
     * Create options color
     */
    $('option:contains("Amfitrappen")').addClass('colors-taxonomy-term-Amfitrappen');
    $('option:contains("Borgernes Torv")').addClass('colors-taxonomy-term-Borgernes_værksted');
    $('option:contains("Borgernes værksted")').addClass('colors-taxonomy-term-Borgernes_Torv');
    $('label[for=edit-field-date-value-min]').toggle();
});

