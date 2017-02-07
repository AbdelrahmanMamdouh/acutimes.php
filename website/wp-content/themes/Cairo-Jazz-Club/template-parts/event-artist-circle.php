<?php
    $artists = get_field('performing_artists', $event_id, false);
?>

<?php if ($artists) : $rand_index = array_rand($artists); $artist = get_post($artists[$rand_index]); ?>


<a href="<?php echo get_template_directory_uri() ?>/modal-templates/artist-modal.php?artistId=<?php echo $artist->ID ?>" class="modal-link">

    <div class="circle__content">
        <?php
            $thumb_id = get_post_thumbnail_id($artist->ID);
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
            $thumb_url = $thumb_url_array[0];
        ?>
        <img src="<?php echo $thumb_url ?>" alt="">
    </div>
</a>


<?php endif; ?>


