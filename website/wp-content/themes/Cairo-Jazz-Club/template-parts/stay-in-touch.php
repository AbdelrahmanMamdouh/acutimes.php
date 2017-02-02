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
		<div class="col-md-4">
			<p>
				<input type="checkbox" id="test1">
				<label for="test1">Avant-garde</label>
			</p>
			<p>
				<input type="checkbox" id="test2" checked="checked">
				<label for="test2">Blues</label>
			</p>
			<p>
				<input type="checkbox" id="test3">
				<label for="test3">Caribbean</label>
			</p>
			<p>
				<input type="checkbox" id="test4">
				<label for="test4">Country</label>
			</p>
		</div>

		<div class="col-md-5">
			<p>
				<input type="checkbox" id="test5">
				<label for="test5">R&amp;B and soul</label>
			</p>
			<p>
				<input type="checkbox" id="test6">
				<label for="test6">Rock</label>
			</p>
			<p>
				<input type="checkbox" id="test7" checked="checked">
				<label for="test7">Electronic</label>
			</p>
			<p>
				<input type="checkbox" id="test8">
				<label for="test8">Folk</label>
			</p>
		</div>
	</div>

	<submit class="btn btn-supporting btn-wide">Submit</submit>
</form>