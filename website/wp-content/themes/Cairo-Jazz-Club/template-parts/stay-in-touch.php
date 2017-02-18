<?php
/**
 * Template part for displaying Stay in Touch
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

?>

<p>Integer vitae libero ac risus egestas placerat.</p>

<form action="/">
	<div class="form-group">
		<div class="input input--reverse">
			<label for="email">Type Your Email</label>
			<input type="email" class="form-control" id="foote_email">
		</div>
	</div>
	<h3>Choose your genre</h3>
	<div class="row">
		
		<?php $genres = get_terms( 'genre',array('hide_empty' => 0) ); ?>


           
                <?php   foreach($genres as $genre){
                    $id = $genres.'-'.$genre->term_id;
                    echo "<label for='$genre->term_id'>";
                    echo "<input type='checkbox' style='position: static' float: left"."value='$genre->term_id' />$genre->name";
                   echo "</label>";
                }?>
           
	</div>

	<submit class="btn btn-supporting btn-wide">Submit</submit>
</form>