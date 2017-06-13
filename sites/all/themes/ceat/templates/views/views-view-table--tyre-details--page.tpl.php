<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>
<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>
   <?php if (!empty($title) || !empty($caption)) : ?>
     <caption><?php print $caption . $title; ?></caption>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php foreach ($rows as $row_count => $row): ?>
      <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  } ?>>
        <?php foreach ($row as $field => $content): ?>
          <td <?php if ($field_classes[$field][$row_count]) { print 'class="'. $field_classes[$field][$row_count] . '" '; } ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
            <?php print $content; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!--<table width="100%" border="1" cellspacing="0" cellpadding="10" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid;" >
  <tr>
    <td rowspan="4">PATTERN NAME</td>
    <td rowspan="4">SIZE</td>
    <td rowspan="4">TYPE</td>
    <td colspan="4" align="center" style="background:#f47920; color:#ffffff;">UNLOADED</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="2" align="center">LOAD INDEX</td>
    <td rowspan="4">SPEED<br /> SYMBOL</td>
    <td rowspan="4">NFLATION<br /> PRESSURE</td>
    <td colspan="2" rowspan="2" align="center" style="background:#f47920; color:#ffffff;">LOAD <br />
      CARRYING <br />
      CAPACITY<br />
    (kgs/lbs)</td>
    <td rowspan="4">TYRE <br />
      WEIGHT<br />
    kgs</td>
    <td rowspan="4">TREAD <br />
   DEPTH</td>
  </tr>
  <tr>
    <td>RIM</td>
    <td>SW</td>
    <td>OD</td>
    <td>STATIC<br/> LOADED<br/> RADIUS</td>
    <td>ROLLING <br />CIRCUM</td>
    <td>PR</td>
    <td>RCI</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>mm<br />
    in</td>
    <td>mm<br />
    in</td>
    <td>mm<br />
    in</td>
    <td>mm<br />
    in</td>
    <td>&nbsp;</td>
    <td rowspan="2">inch</td>
    <td rowspan="2">FREE <br />
    ROLLING</td>
    <td rowspan="2">DRIVE <br />
WHEELS</td>
    <td rowspan="2">FREE <br />  ROLLING</td>
    <td rowspan="2">DRIVE <br />WHEELS</td>
  </tr>
  <tr>
    <td>Icon</td>
    <td>Icon</td>
    <td>Icon</td>
    <td>Icon</td>
    <td>Icon</td>
    <td>Icon</td>
  </tr>
  <tr>
  	<td rowspan="2">FARM 
IMPLEMENT 
AW1305</td>
    <td rowspan="2">10.0/<br />
    75-15.3</td>
    <td rowspan="2">TUBE-LESS</td>
    <td rowspan="2">9x15.3</td>
    <td>264</td>
    <td>770</td>
    <td>347</td>
    <td>2272</td>
    <td rowspan="2">12</td>
    <td rowspan="2">30.0</td>
    <td rowspan="2">126</td>
    <td rowspan="2">114</td>
    <td rowspan="2">a8</td>
    <td rowspan="2">4.7<br/>68</td>
    <td rowspan="2">1700<br/>3750</td>
    <td rowspan="2">1180<br/>2600</td>
    <td rowspan="2">14.8<br/>32.6</td>
    <td rowspan="2">9<br/>6</td>
  </tr>
    <tr>
  	<td>10.4</td>
    <td>30.3</td>
    <td>13.7</td>
    <td>89.4</td>
  </tr>
</table>-->
