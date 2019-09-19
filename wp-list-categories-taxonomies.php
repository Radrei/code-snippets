<!--Lists categories for a specified custom taxonomy. In this case, 
it's event_cat which belongs to the Events custom post type-->

<?php
//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
$orderby = 'date';
$order = 'ASC';
$show_count = 0; // 1 for yes, 0 for no
$pad_counts = 0; // 1 for yes, 0 for no
$hierarchical = 1; // 1 for yes, 0 for no
$taxonomy = 'event_cat';
$title = '';

$args = array(
  'orderby' => $orderby,
  'order' => $order,
  'show_count' => $show_count,
  'pad_counts' => $pad_counts,
  'hierarchical' => $hierarchical,
  'taxonomy' => $taxonomy,
  'title_li' => $title
);
?>
<ul class="event-categories">
<?php
echo wp_list_categories($args);
?>
</ul>

<!--It will output something like this:-->
<ul class="event-categories">
	<li class="cat-item cat-item-4"><a href="http://localhost/rc/event_cat/2016-events/">2016</a></li>
	<li class="cat-item cat-item-8"><a href="http://localhost/rc/event_cat/2017/">2017</a></li>
</ul>

<!--For regular categories (not associated with custom post type) see here: https://www.sitepoint.com/wordpress-categories-api/ -->
