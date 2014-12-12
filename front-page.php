<?php get_header(); ?>

	<?php if ( dynamic_sidebar('alert_panel') ) : else : endif; ?>
</div>
<div class="row home-page-row">	
	<div class="col-md-7 home-page-col">
	<?php if ( dynamic_sidebar('home_main_top') ) : else : endif; ?>
	</div>
	<div class="col-md-5 home-page-col">
	<?php if ( dynamic_sidebar('home_sidebar1_top') ) : else : endif; ?>
	</div>
</div>
<div class="row home-page-row">
	<div class="col-md-7 home-page-col">
	<?php if ( dynamic_sidebar('home_main') ) : else : endif; ?>
	</div>
	<div class="col-md-5 home-page-col">
	<?php if ( dynamic_sidebar('home_sidebar1') ) : else : endif; ?>
	</div>
	
<?php get_footer(); ?>      