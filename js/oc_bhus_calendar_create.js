jQuery( document ).ready(function($) {
        $('.half-hour').dblclick(function(e){
            debugger;
            var start_time = $(e.currentTarget).parent().find('#time-slice-time').val();
            var start_date = $(e.currentTarget).parent().parent().find("#week-view-date").val();
            window.location.href = "/node/add/bhus-events?start-time="+start_date+" "+start_time;    
            return false;
        });
         $('.time-slice').dblclick(function(e){
             debugger;
            var start_time = $(e.currentTarget).find('#time-slice-time').val();
            var start_date = $(e.currentTarget).parent().find("#week-view-date").val();
            
            //add 30 minutes to time-slice start time
            
            var dstring = start_date +" "+ start_time ;
            var d = new Date(dstring); // for now
            var hej = d.getHours() + ":"+(d.getMinutes() + 30);
            window.location.href = "/node/add/bhus-events?start-time="+start_date+" "+start_time;
        });
    });

