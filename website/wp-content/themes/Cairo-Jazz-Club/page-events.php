<?php
//$init->fbLogout();
//if(isset($_POST['logout'])){
//$init->fbLogout();
//header("Location: " . get_the_permalink());
//}
?>
<?php get_header() ?>


<main class="inner">
    <section>
        <div class="container-fluid">
            <h1 class="centered page-heading"><?php the_title() ?></h1>
            <h2>Welcome!</h2>
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
                    <a href="#event-modal-<%= event.id %>" class="mfp-inline modal-link event-link <%= event.type %>" style="background-image: url('<%= event.img %>')">
                    </a>
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
                    <a href="<%= event.url %>" class="event-link <%= event.type %>" style="background-image: url('<%= event.img %>')">
                    </a>
                    <% }) %>
                    
                    <span class="day-number-container"><span class="day-number"><%= day.day %></span></span>

                    </div>

                    <% }); %>
                    </div>
                    </div>
                </script>
            </div>
        </div>
    </section>
</main>

<?php
$args = array(
'post_type' => 'avent',
 'post_status' => 'publish',
 'posts_per_page' => 999999, // all
'orderby' => 'title',
 'order' => 'ASC'
);

$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

<?php
$dateStr = get_field('date');
$eventDate = strtotime($dateStr);
$todayDate = time() - (time() % 86400);
$date = new DateTime($dateStr);
$event_id = get_the_id();

$thumb_id = get_post_thumbnail_id();
$image_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
$image_url = $image_url_array[0];
?>
<?php include(locate_template('templates/event-modal.php')); ?>
<?php
endwhile;
else:
?>

<p>Sorry, there are no events to display</p>

<?php endif; ?>
<script type="text/javascript">
        // Calendar
        //var thisMonth = moment().format('YYYY-MM');

        // Events to load into calendar
        $.getJSON("<?php echo get_site_url(); ?>/events-json/", function eventsCallbacl(data) {
            var eventArray = data;

            $('.calendar').clndr({
                daysOfTheWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                events: eventArray,
                multiDayEvents: {
                    singleDay: 'date',
                    endDate: 'endDate',
                    startDate: 'startDate'
                },
                showAdjacentMonths: true,
                adjacentDaysChangeMonth: false,
                template: $('#template-calendar').html(),
            });
        });
    




    </script>
<?php wp_reset_query(); ?>


<?php get_footer() ?>