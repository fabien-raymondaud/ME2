<?php
$thumbnail_desktop_retina_src = wp_get_attachment_image_src(get_post_thumbnail_id($dernier_article->ID), 'full', false);
//Pour l'affichage du type éditorial de l'article	    		
$types_editoriaux = wp_get_post_terms($dernier_article->ID, 'type_editorial');
$tableau_types_editoriaux = array();

foreach($types_editoriaux as $type_editorial){
	$tableau_types_editoriaux[]=$type_editorial->name;
}
$chaine_types_editoriaux = implode(', ', $tableau_types_editoriaux);

?>
<li class="panneau-article">
					
<?php
if($thumbnail_desktop_retina_src[0]!=""){
?>
	<div class="image-article">
		<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">
			<img src="<?php echo $thumbnail_desktop_retina_src[0];?>" alt="<?php echo get_the_title($dernier_article->ID);?>">
		</a>
	</div>
<?php
}
?>
	<div class="descriptif-article">
<?php
	if($chaine_hashtags!=""){
?>
		<p class="hashtags size14 typo1"><?php echo $chaine_hashtags;?></p>
<?php
	}
?>
		<a href="<?php the_permalink($dernier_article->ID);?>" title="Aller à <?php echo get_the_title($dernier_article->ID);?>">
			<h3 class="size24"><?php echo get_the_title($dernier_article->ID);?></h3>
<?php
		if($chaine_types_editoriaux!=""){
?>
			<p class="types-editoriaux size14 uppercase typo2"><?php echo $chaine_types_editoriaux;?></p>
<?php
		}
?>
		</a>
	</div>
</li>