jQuery( document ).ready(function($) {
    $('.pager').find('a').click(function(){
        
    });
    /*
     * Create options color
     */
    $('option:contains("Amfitrappen")').addClass('colors-taxonomy-term-Amfitrappen');
    $('option:contains("Borgernes Torv")').addClass('colors-taxonomy-term-Borgernes_Torv');
    $('option:contains("Borgernes værksted")').addClass('colors-taxonomy-term-Borgernes_værksted');
    $('label[for=edit-field-date-value-min]').toggle();
});

