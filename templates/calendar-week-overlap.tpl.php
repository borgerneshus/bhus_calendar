<?php
$vocabulary = taxonomy_vocabulary_machine_name_load('event_lokation');
$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid));
$index = 0;
$start_date = 0;
global $user;
if (isset($_GET['field_date_value']['value']['date'])) {
    $index = date('w', strtotime($_GET['field_date_value']['value']['date']));
    $start_date = $_GET['field_date_value']['value']['date'];
} else {
    $index = date("w", strtotime('today'));
    if ($index != 1) {
        $start_date = date("d-m-Y", strtotime('previous monday', strtotime('today')));
    } else {
        $start_date = date("d-m-Y", strtotime('today'));
    }
}
$today_index = date('w', strtotime('today'));

if (isset($_GET['field_date_value']['value']['date']) && $index != 1) {
    $prev_monday = date('d-m-Y', strtotime('previous monday', strtotime($_GET['field_date_value']['value']['date'])));
    $start_date = $prev_monday;
}
$header_ids = array();
foreach ($day_names as $key => $value) {
    $date1 = strtotime($start_date . "+{$key} days");
    if (($key + 1) == $today_index && $date1 == strtotime('today')) {
        $day_names[$key]['class'] .=" date-today ";
    }

    $date = date('d/m', strtotime($start_date . "+{$key} days"));
    $header_ids[$key] = $value['header_id'];
    $day_names[$key]['data'] = $value['header_id'] . " " . $date;
}
$is_full_view = variable_get("bhus_calendar_full_view", false);
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
        float:left;
        display:inline-block;
    }
    .obib-calendar-time-slices
    { 
        margin-right: 5px;
    }
    .obib-calendar-time-slices .time-slice{
        border-top: 1px solid #cccccc;
        border-right: 1px solid #cccccc;
    }
    .obib-calendar-week-view .time-slice
    {
        border-bottom: 1px solid #cccccc;
    }
    .obib-calendar-time-slices .time-slice , .obib-calendar-week-view .time-slice
    {

        height: 50px;
    }
    .obib-calendar-week-view{
        float:left;
        width: 13%;
        overflow:hidden;
        margin-right: 5px;
        margin-bottom:10px;
        border: 1px dotted lightgray;
    }
    .item
    {
        float:left;
        margin-right: 3px;
        margin-left: 3px;
        opacity: 0.7;
        width: 10px;
        background-color:grey;
    }
    .item:hover{
        border: 1px solid black;
    }
    .obib-calendar-header
    {
        background-color: #eee;
        color: #777;
        font-weight: bold;
        border: 1px solid #ccc;
        height: 25px;
        text-align: center;
    }
    .obib-calendar-header-filler{
        height: 27px;
        width:30px;
    }
</style>
<div class="obib-calendar-wraper">
    <div class="legend-wrap">
        <?php
        foreach ($terms as $term) {
            ?>
            <div class="legend-box-wrap"><div class="legend-box <?php echo 'colors-taxonomy-term-' . str_replace(' ', '_', $term->name) ?>"></div><span class="legend-name"><?php echo $term->name ?></span></div>     
            <?php
        }
        ?>
    </div>
    <div class="obib-calendar">
        <div class="obib-calendar-time-slices">
            <div class="obib-calendar-header-filler"></div>
            <?php foreach ($start_times as $time_cnt => $start_time): ?>
                <?php $time = $items[$start_time]; ?>
                <div class="time-slice"><?php print $time['hour']; ?></div>
            <?php endforeach; ?>
        </div>
        <?php for ($i = 0; $i < 7; $i++) { ?>
            <div class="obib-calendar-week-view">
                <input type="hidden" id="week-view-date" value="<?php echo date('Y-m-d',strtotime($start_date . "+{$i} days")); ?>"/>
                <div class="obib-calendar-header">
                    <?php print $day_names[$i]['data']; ?>
                </div>
                <div class="grippie"></div>
                <?php
                $full_size = 13;
                $above_items = 0;
                $margin_index = 0;
                ?>
    <?php foreach ($start_times as $time_cnt => $start_time): ?>
                            <?php $time = $items[$start_time]; ?>
                    <div class="time-slice">
                        <input type="hidden" id="time-slice-time" value="<?php echo $start_time ?>" />
                        <div class="half-hour ">
                            <?php if (!empty($items[$start_time]['values'][$i])) : ?>
                                <?php foreach ($items[$start_time]['values'][$i] as $item) : ?>
                                    <?php
                                    $entity = $item["item"]->entity;
                                    $term = taxonomy_term_load($entity->field_event_location["und"][0]["tid"]);
                                    $color_class = 'colors-taxonomy-term-' . str_replace(' ', '_', $term->name);
                                    if ($start_time != $start_times[0] && $above_items != 0) {
                                        $margin_index = $full_size * ($above_items + 1);
                                    }
                                    $entity_start = strtotime($entity->field_date['und'][0]['value']);
                                    $entity_end = strtotime($entity->field_date['und'][0]['value2']);
                                    $diff = (($entity_end - $entity_start) / 3600);
                                    $height = (50) * $diff;
                                    //calculate margin-top pr . minute
                                    $entity_start = strtotime($start_time);
                                    $entity_end = strtotime(date('H:i:s',strtotime($entity->field_date['und'][0]['value'])));
                                    $diff = (($entity_end-$entity_start) / 3600);
                                    $margin_top = ($diff * 50);
                                    ?>
                                    <?php
                                    $show_screen = (isset($entity->field_vis_p_sk_rm['und'][0]['value']) && !empty($entity->field_vis_p_sk_rm['und'][0]['value']) && $entity->field_vis_p_sk_rm['und'][0]['value'] != 0) ? "Ja" : "Nej";
                                    if (!$is_full_view) {
                                        ?>
                                        <div id="<?php echo $entity->nid ?>" data-placement="right" data-trigger="hover" class="item <?php echo $color_class ?>" style="height: <?php echo $height . "px"; ?>;margin-top:<?php echo $margin_top ."px"; ?>;margin-left:<?php echo $margin_index . "px"; ?>">
                                            <div class="calendar-item-data" style="display:none;">
                                                <input type="hidden" id="item-nid" value="<?php echo $entity->nid ?>" />
                                                <div style="width:100%;"><h2><?php echo $entity->title ?></h2></div>
                                                <div style="width:100%;"><?php echo date('H:i', strtotime($entity->field_date['und'][0]['value'])) . " - " . date('H:i', strtotime($entity->field_date['und'][0]['value2'])) ?></div>
                                                <div style="width:100%;"><?php echo isset($entity->field_kontakt_person['und'][0]['value']) ? "Kontakt: " . $entity->field_kontakt_person['und'][0]['value'] : "" ?></div>
                                                <div style="width:100%;"><?php echo isset($entity->body['und'][0]['value']) ? $entity->body['und'][0]['value'] : "" ?></div>
                                                <div style="width:100%;"><?php echo "<br/>Vis på skærm: " . $show_screen ?></div>
                                            </div>
                                        </div>
                <?php } else { ?>
                                        <div id="<?php echo $entity->nid ?>" data-placement="right" data-trigger="hover" class="item full-calendar-item <?php echo $color_class ?>" style="height: <?php echo $height . "px"; ?>;margin-top:<?php echo $margin_top ."px"; ?>;width: 100%;">
                                            <div><?php echo $entity->title ?></div>
                                            <div class="calendar-item-data" style="display:none;">
                                                <input type="hidden" id="item-nid" value="<?php echo $entity->nid ?>" />
                                                <div style="width:100%;"><h2><?php echo $entity->title ?></h2></div>
                                                <div style="width:100%;"><?php echo date('H:i', strtotime($entity->field_date['und'][0]['value'])) . " - " . date('H:i', strtotime($entity->field_date['und'][0]['value2'])) ?></div>
                                                <div style="width:100%;"><?php echo isset($entity->field_kontakt_person['und'][0]['value']) ? "Kontakt: " . $entity->field_kontakt_person['und'][0]['value'] : "" ?></div>
                                                <div style="width:100%;"><?php echo isset($entity->body['und'][0]['value']) ? $entity->body['und'][0]['value'] : "" ?></div>
                                                <div style="width:100%;"><?php echo "<br/>Vis på skærm: " . $show_screen ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php $above_items++;
                                endforeach;
                                ?>
        <?php endif; ?>
                        </div>
                    </div>
            <?php endforeach; ?>
            </div>
<?php } ?>
    </div>
</div>

<!-- Modal -->
<div id="event-item-info-modal"  class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Arrangemants informationer</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <?php if(in_array('event planlægger - bhus', array_values($user->roles)) || in_array('administrator', array_values($user->roles))){ ?>
                <a class="btn btn-default edit-bhus-event-modal-btn" >Rediger</a>
                <?php } ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Luk</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
