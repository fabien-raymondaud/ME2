<footer class="footer-principal">
	<nav class="nav-footer">
		<div class="colonne-1">
			<ul class="nav-1">
				<li class="entree-principale"><a href="<?php echo site_url(); ?>">Accueil</a></li>
				<li class="entree-principale"><a href="">Tous les articles</a></li>
				<li class="entree-secondaire"><a href="">Rapido</a></li>
				<li class="entree-secondaire"><a href="">Portrait</a></li>
				<li class="entree-secondaire"><a href="">Reportages</a></li>
				<li class="entree-secondaire"><a href="">Épopées</a></li>
				<li class="entree-secondaire"><a href="">L'humeur de ...</a></li>
			</ul>
			<ul class="nav-2">
				<li class="entree-principale"><a href="">Dans le rétro</a></li>
				<li class="entree-principale"><a href="">Les playlists</a></li>
			</ul>
			<ul class="nav-installation">
				<li><a href="<?php the_permalink(2);?>">L'installation</a></li>
			</ul>
		</div>

		<div class="colonne-2">
			<ul class="nav-3">
				<li class="entree-principale"><a href="<?php the_permalink(101);?>">À propos</a></li>
				<li class="entree-secondaire"><a href="<?php the_permalink(103);?>">Contact</a></li>
				<li class="entree-secondaire"><a href="<?php the_permalink(105);?>">Nous suivre</a></li>
			</ul>
			<ul class="nav-rs">
				<li><a href="<?php the_field('compte_twitter', 'options');?>" class="twitter" target="_blank"></a></li>
				<li><a href="<?php the_field('compte_facebook', 'options');?>" class="facebook" target="_blank"></a></li>
			</ul>
			<ul class="nav-mentions">
				<li class="entree-secondaire"><a href="<?php the_permalink(99);?>">Mentions légales</a></li>
			</ul>
		</div>
	</nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>
