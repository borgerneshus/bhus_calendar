jQuery( document ).ready(function($) {
    var start_date = $('#edit-field-date').find('.start-date-wrapper').find('input').first();
    var end_date = $('#edit-field-date').find('.end-date-wrapper').find('input').first();
    end_date.prop('disabled', true);
    start_date.change(function(){
        end_date.val(start_date.val());
    });
    $('#bhus-events-node-form').submit(function(){
        end_date.prop('disabled', false);
    });
});


