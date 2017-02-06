<?php
/**
 * Template part for displaying the events calendar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

?>

<div class="calendar">
	<script type="text/template"  id="template-calendar">
		<div class="clndr-controls">
			<a href="javascript:void(0)" class="clndr-previous-button vertical-middle"></a>
			<h1 class="capitalize month vertical-middle"><%= month %> <%= year %></h1>
			<a href="javascript:void(0)" class="clndr-next-button vertical-middle"></a>
		</div>
		<div class="clndr-grid hidden-xs">
			<div class="days-of-the-week clearfix">
				<% _.each(daysOfTheWeek, function(day) { %>
					<div class="header-day"><%= day %></div>
				<% }); %>
			</div>
			<div class="days clearfix">
				<% _.each(days, function(day) { %>
					<div class="<%= day.classes %>" id="<%= day.id %>">
						<% _.each(day.events, function(event) { %>
							<a href="<?php echo get_template_directory_uri()?>/modal-templates/event-modal.php?eventId=<%= event.id %>" class="modal-link event-link <%= event.type %>" style="background-image: url('<%= event.img %>')"></a>
						<% }) %>
						<span class="day-number-container"><span class="day-number"><%= day.day %></span></span>
					</div>
				<% }); %>
			</div>
		</div>
		<div class="clndr-grid visible-xs">
			<div class="days-of-the-week clearfix">
				<% _.each(daysOfTheWeek, function(day) { %>
					<div class="header-day"><%= day %></div>
				<% }); %>
			</div>
			<div class="days clearfix">
				<% _.each(days, function(day) { %>
					<div class="<%= day.classes %>" id="<%= day.id %>">
						<% _.each(day.events, function(event) { %>
							<a href="<%= event.url %>" class="event-link <%= event.type %>" style="background-image: url('<%= event.img %>')"></a>
						<% }) %>
						<span class="day-number-container"><span class="day-number"><%= day.day %></span></span>
					</div>
				<% }); %>
			</div>
		</div>
	</script>
</div>

<?php

$the_query = new WP_Query(array(
	'post_type'			=> 'avent',
	'post_status'		=> 'publish',
	'posts_per_page'	=> 999999, // all
	'orderby'			=> 'title',
	'order' 			=> 'ASC'
));


if ($the_query->have_posts()) {
  while ($the_query->have_posts()) {

		$the_query->the_post();

		$dateStr = get_field('date');
		$eventDate = strtotime($dateStr);
		$todayDate = time() - (time() % 86400);
		$date = new DateTime($dateStr);
		$event_id = get_the_id();

		$thumb_id = get_post_thumbnail_id();
		$image_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
		$image_url = $image_url_array[0];

		get_template_part('template-parts/event-modal.php');

  }
} else {
	?><p>Sorry, there are no events to display</p><?php 
} 

 wp_reset_query();

?>

<script type="text/javascript">
	jQuery(document).ready(function (){ 
		Init.Event("<?php echo get_template_directory_uri(); ?>/rest-api-mods/events-json.php/");
	});
</script>