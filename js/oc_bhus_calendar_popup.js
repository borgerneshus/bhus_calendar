jQuery( document ).ready(function($) {
    $('.calendar-agenda-items').dblclick(function(e){      
       //Get the selected time slot
       
       //redirect to node creation / popup does not work properly without allot of work.
       window.location.href = "/node/add/bhus-events";
    });
 
    $('.view-item-bhus_events').dblclick(function(e){
        debugger;
         var nid = $(e.currentTarget).find("calendar-item-nid .field-content").text();
         window.location.href = "/node/edit/" +nid;
    });
     $('.view-item-bhus_events').click(function(e){
        var body = $(e.currentTarget).find('.calendar-item-body').html();
        $('#event-item-info-modal').find('.modal-body').html(body);
        $('#event-item-info-modal').modal('show');
    });
});