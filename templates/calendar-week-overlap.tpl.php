<?php
/**
 * @file
 * Template to display a view as a calendar week with overlapping items
 * 
 * @see template_preprocess_calendar_week.
 *
 * $day_names: An array of the day of week names for the table header.
 * $rows: The rendered data for this week.
 * 
 * For each day of the week, you have:
 * $rows['date'] - the date for this day, formatted as YYYY-MM-DD.
 * $rows['datebox'] - the formatted datebox for this day.
 * $rows['empty'] - empty text for this day, if no items were found.
 * $rows['all_day'] - an array of formatted all day items.
 * $rows['items'] - an array of timed items for the day.
 * $rows['items'][$time_period]['hour'] - the formatted hour for a time period.
 * $rows['items'][$time_period]['ampm'] - the formatted ampm value, if any for a time period.
 * $rows['items'][$time_period]['values'] - An array of formatted items for a time period.
 * 
 * $view: The view.
 * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
 * 
 */
$index = 0;
$start_date =0;
if(isset($_GET['field_date_value']['value']['date']))
{
 $index = date('w', strtotime($_GET['field_date_value']['value']['date']));
 $start_date = $_GET['field_date_value']['value']['date'];
}
else
{
        $index =  date("w",strtotime('today'));
        if($index != 1)
        {
        $start_date = date("d-m-Y", strtotime('previous monday', strtotime('today')));
        }
        else
        {
            $start_date = date("d-m-Y", strtotime('today'));
        }
    
}
$today_index = date('w', strtotime('today'));

if(isset($_GET['field_date_value']['value']['date']) && $index != 1)
{
   $prev_monday =  date('d-m-Y', strtotime('previous monday', strtotime($_GET['field_date_value']['value']['date'])));
   $start_date = $prev_monday;
}
$header_ids = array();
foreach ($day_names as $key => $value) {
    $date1 = strtotime($start_date."+{$key} days");
    if(($key+1) == $today_index && $date1 == strtotime('today'))
    {
        $day_names[$key]['class'] .=" date-today ";
    }
    
  $date = date('d/m',strtotime($start_date."+{$key} days"));
  $header_ids[$key] = $value['header_id'];
  $day_names[$key]['data'] = $value['header_id'] . " ". $date;
}
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. $max_date_formatted);
?>

<div class="calendar-calendar"><div class="week-view">
  <div id="header-container">
  <table class="full">
  <tbody>
    <tr class="holder"><td class="calendar-time-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder margin-right"></td></tr>
    <tr>
      <th class="calendar-agenda-hour">&nbsp;</th>
      <?php foreach ($day_names as $cell): ?>
        <th class="<?php print $cell['class']; ?>" id="<?php print $cell['header_id']; ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
      <th class="calendar-day-holder margin-right"></th>
    </tr>
  </tbody>
  </table>
  </div>
  <div class="header-body-divider">&nbsp;</div>
  <div id="single-day-container">
    <?php if (!empty($scroll_content)) : ?>
    <script>
      try {
        // Hide container while it renders...  Degrade w/o javascript support
        jQuery('#single-day-container').css('visibility','hidden');
      }catch(e){ 
        // swallow 
      }
    </script>
    <?php endif; ?>
    <table class="full">
      <tbody>
        <tr class="holder"><td class="calendar-time-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td><td class="calendar-day-holder"></td></tr>
        <tr>
          <?php for ($index = 0; $index < 8; $index++): ?>
          <?php if ($index == 0 ): ?>
          <td class="first" headers="<?php print $header_ids[$index]; ?>">
          <?php elseif ($index == 7 ) : ?>
          <td class="last">
          <?php else : ?>
          <td headers="<?php print $header_ids[$index]; ?>">
          <?php endif; ?>
            <?php foreach ($start_times as $time_cnt => $start_time): ?>
              <?php 
                if ($time_cnt == 0) {
                  $class = 'first ';
                }
                elseif ($time_cnt == count($start_times) - 1) {
                  $class = 'last ';
                }
                else {
                  $class = '';
                } ?>
              <?php if( $index == 0 ): ?>
              <?php $time = $items[$start_time];?>
              <div class="<?php print $class?>calendar-agenda-hour">
                <span class="calendar-hour"><?php print $time['hour']; ?></span><span class="calendar-ampm"><?php print $time['ampm']; ?></span>
              </div>
              <?php else: ?>
              <div class="<?php print $class?>calendar-agenda-items single-day">
                <div class="half-hour">&nbsp;</div>
                <div class="calendar item-wrapper">
                  <div class="inner">
                    <?php if(!empty($items[$start_time]['values'][$index - 1])) :?>
                      <?php foreach($items[$start_time]['values'][$index - 1] as $item) :?>
                        <?php if (isset($item['is_first']) && $item['is_first']) :?>
                        <div class="item <?php print $item['class']?> first_item">
                        <?php else : ?>
                        <div class="item <?php print $item['class']?>">
                        <?php endif; ?>
                        <?php print $item['entry'] ?>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            <?php endforeach;?>
          </td>
          <?php endfor;?>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="single-day-footer">&nbsp;</div>
</div></div>
<?php if (!empty($scroll_content)) : ?>
<script>
try {
  // Size and position the viewport inline so there are no delays
  calendar_resizeViewport(jQuery);
  calendar_scrollToFirst(jQuery);

  // Show it now that it is complete and positioned
  jQuery('#single-day-container').css('visibility','visible');
}catch(e){ 
  // swallow 
}
</script>
<?php endif; ?>