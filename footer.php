		</div><!-- end main content -->
		<?php if( is_home() ) : ?>
			</div>
		<?php endif; ?>
		<footer>
			<?php if ( dynamic_sidebar('footer') ) : ?>
			<?php else : ?>
			<div class="row hidden-print">
				<div class="col-sm-2 col-xs-6">
					<small>
						<address class="street-address">
							<strong>New Jersey State Library</strong><br>
							<abbr title="Street Address"><i class="fa fa-fw fa-building-o"></i></abbr>185 W. State St.<br>
							Trenton, NJ 08608<br>
						</address>
						<address class="mailing-address">
							<abbr title="Mailing Address"><i class="fa fa-fw fa-envelope-o"></i></abbr>P.O. Box 520<br>
							Trenton, NJ 08625<br>
						</address>
						<address>
							<abbr title="Phone"><i class="fa fa-fw fa-phone"></i></abbr> (609) 278-2640<br>
							<abbr title="Fax"><i class="fa fa-fw fa-print"></i></abbr> (609) 278-2652<br>
						</address>
					</small>
				</div>
				<div class="col-sm-2 col-xs-6 col-no-padding">
					<small>
						<address class="street-address">
							<strong>Talking Book and Braille Center</strong><br>
							<abbr title="Street Address"><i class="fa fa-fw fa-building-o"></i></abbr>2300 Stuyvesant Avenue<br>
							Trenton, NJ 08618<br>
						</address>
						<address class="mailing-address">
							<abbr title="Mailing Address"><i class="fa fa-fw fa-envelope-o"></i></abbr>P.O. Box 501<br>
							Trenton, NJ 08625<br>
						</address>
						<address>
							<abbr title="Phone"><i class="fa fa-fw fa-phone"></i></abbr> (800) 792-8322<br>
							<abbr title="Phone"><i class="fa fa-fw fa-phone"></i></abbr> (609) 406-7179<br>
							<abbr title="Fax"><i class="fa fa-fw fa-print"></i></abbr> (609) 406-7181<br>
						</address>
					</small>
				</div>
				<div class="col-sm-3 col-xs-12">
					<h5>Using The Library</h5>
					<ul class="list-unstyled">
						<li><a href="<?php echo esc_url( home_url( 'research_library/get_a_library_card' ) ) ?>">Get a Library Card</a></li>
						<li><a href="http://capemay.njstatelib.org/ipac20/ipac.jsp?profile=njl--1#focus">Search the State Library Catalog</a></li>
						<li><a href="http://opac.njlbh.org/opacnj/">Search the <abbr title="Talking Book and Braille Center">TBBC</abbr> Catalog</a></li>
						<li><a href="<?php echo esc_url( home_url( 'research_library/Ask_a_Librarian' ) ) ?>">Get Help from a Librarian</a></li>
						<li><a href="<?php echo esc_url( home_url( 'events/' ) ) ?>">Register for Upcoming Events</a></li>
					</ul>
				</div>
				<div class="col-sm-3 col-xs-6 col-no-padding">
					<h5>Programs from the State Library</h5>
					<ul class="list-unstyled two-column">
						<li><a href="http://jerseycat.org/">JerseyCat</a></li>
						<li><a href="http://jerseyclicks.org/">JerseyClicks</a></li>
						<li><a href="http://www.jerseyconnect.net/">JerseyConnect</a></li>
						<li><a href="http://njworks.org/">Job Seekers</a></li>
						<li><a href="http://njlibrarychampions.org/">Library Champions</a></li>
						<li><a href="http://marketing.njstatelib.org/">Library Marketing</a></li>
						<li><a href="http://outspokenlibrary.org/">Print Impaired</a></li>
						<li><a href="http://njgrowsbiz.org/">Small Business</a></li>
					</ul>
				</div>
				<div class="col-sm-2 col-xs-6">
					<h5>More Information</h5>
					<ul class="list-unstyled">
						<li><a href="<?php echo esc_url( home_url( 'disclaimer/' ) ) ?>">Disclaimer/Privacy</a></li>
						<li><a href="<?php echo esc_url( home_url( 'media/press-releases/' ) ) ?>">Press Room</a></li>
						<li><a href="<?php echo esc_url( home_url( 'blog/' ) ) ?>">Blogs</a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr>
			<div class="row hidden-xs hidden-sm hidden-print">
				<div class="col-md-12 text-center">
					<ul class="list-unstyled list-inline logo-list">
						<li class="text-center">
							<a href="<?php echo esc_url( home_url( 'Research_Library/Collections/NJ_Government_publications' ) ) ?>">
								<img class="small" alt="New Jersey Document Depository" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/nj_depository_logo.gif">
							</a>
						</li>
						<li class="text-center">
							<a href="<?php echo esc_url( home_url( 'Research_Library/Collections/US_Documents' ) ) ?>">
								<img class="small" alt="United States Document Depository" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/us_depository_logo.gif">
							</a>
						</li>
						<li class="text-center">
							<a href="http://www.tesc.edu">
								<img class="edison" alt="Visit Thomas Edison State College" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/tesc-logo-color-50.png">
							</a>
						</li>
						<li class="text-center">
							<a href="http://librarylinknj.org">
								<img alt="Visit Library Link NJ" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/llnjlogo.png">
							</a>
						</li>
						<li class="text-center">
							<a href="http://njla.org">
								<img alt="Visit NJLA" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/img_AB.png">
							</a>
						</li>
						<li class="text-center">
							<a href="http://www.imls.gov">
								<img class="edison" alt="Visit the Institute for Library and Museum Services" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/imlsLogo.png">
							</a>
						</li>
						<li class="text-center">
							<a href="<?php echo esc_url( home_url( 'Research_Library/Collections/Funding_Information_Center' ) ) ?>">
								<img class="small" alt="Funding Information Center" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/fc_logo_with_tag.gif">
							</a>
						</li>
						<li class="text-center">
							<a href="<?php echo esc_url( home_url( '/slic_files/NJSL_OPRA_form.doc' ) ) ?>">
								<img class="small" alt="Open Public Records Act Information" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logos/opra_i-78x72.gif">
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p class="text-center"><small>Copyright New Jersey State Library 1796-<?php echo date( 'Y' ) ?> <span class="hidden-print">&mdash; <a href="<?php echo esc_url( get_admin_url() ) ?>">Admin</a></span></small></p>
				</div>
			</div>
			<?php endif; ?>
		</footer>
	</main>
</div>
<!-- Use this full width footer if needed -->
<footer class="legal"></footer>
<?php wp_footer(); ?>
</body>
</html>