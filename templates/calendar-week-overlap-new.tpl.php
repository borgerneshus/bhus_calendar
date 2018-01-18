<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    .obib-calendar-wraper
    {
        width:100%;
        background-color:white;
        display:inline-block;
        color:black;
    }
    .obib-calendar-time-slices{
        
        margin-right: 5px;
        
        overflow:hidden;
        display:inline-block;
    }
    .obib-calendar-time-slices .time-slice , .obib-calendar-week-view .time-slice
    {
        border: 1px solid black;
        height: 35px;
    }
    .obib-calendar-week-view{
        display:inline-block;
        width: 13.5%;
        overflow:hidden;
    }
    .item
    {
        display: inline-block;
        margin-right: 3px;
        margin-left: 3px;
        opacity: 0.7;
        width: 10px;
    }
</style>
<div class="obib-calendar-wraper">
    <div class="obib-calendar">
        <div class="obib-calendar-time-slices">
            <div class="obib-calendar-header-filler">Dag</div>
            <div class="time-slice">8:00</div>
            <div class="time-slice">8:30</div>
            <div class="time-slice" >9:00</div>
        </div>
        <?php for($i = 0;$i< 7;$i++){ ?>
        <div class="obib-calendar-week-view">
            <div class="obib-calendar-header">
                Mandag
            </div>
            <div class="time-slice">
                <div class="item" style="height: 70px;background-color:red;">
                    
                </div>
                <div class="item" style="height: 70px;background-color:green;">
                    
                </div>
            </div>
            <div class="time-slice">
                <div class="item" style="height: 35px;background-color:green;">
                    
                </div>
                    
            </div>
            <div class="time-slice">
                <div class="item" style="height: 35px;background-color:green;margin-left:60px;">      
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>
