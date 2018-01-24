jQuery( document ).ready(function($) {
    /*$('.calendar-agenda-items').dblclick(function(e){      
       //Get the selected time slot
       
       //redirect to node creation / popup does not work properly without allot of work.
       window.location.href = "/node/add/bhus-events";
    });
 
    $('.view-item-bhus_events').dblclick(function(e){
        debugger;
         var nid = $(e.currentTarget).find("calendar-item-nid .field-content").text();
         window.location.href = "/node/edit/" +nid;
    });*/
      $('body').mousemove(function(e){
      window.mouseXPos = e.pageX;
       window.mouseYPos = e.pageY;
   }); 
    $('.item').click(function(e){
        var body = $(e.currentTarget).find('.calendar-item-data').html();
        var nid = $(e.currentTarget).find('#item-nid').val();
        var btn =  $(".edit-bhus-event-modal-btn");
        if( btn != undefined)
        {
            btn.attr('href',"/node/" + nid + "/edit");
        }
        $('#event-item-info-modal').find('.modal-body').html(body);
        $('#event-item-info-modal').modal('show');
    });

    $.each($('.item'),function(i,e){
            // Enables popover
            var target = $(e);
            target.popover({
                html : true, 
                content: function() {
                    var html = target.find('.calendar-item-data').html();
                  return html;
                },
                trigger: "hover",
                container: 'body',
                template: '<div class="popover my-popover" role="tooltip"><div class=""></div><div class="popover-content"></div></div>'
            });
    });
     $(".item").on('shown.bs.popover ', function(){
        // parseInt removes "px"
        
        $(".popover").css("position","absolute");
        $(".popover").css("top",  (window.mouseYPos)+ "px");
        $(".popover").css("left",  (window.mouseXPos-96) + "px");
        
    });
     
});