<?php
/**
 * Ngaire Theme Customizer.
 *
 * @package Ngaire
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ngaire_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->add_setting( 'site_logo' ); // Add setting for logo uploader
	$wp_customize->add_setting( 'site_logo_mobile' ); // Add setting for logo uploader
	
	$wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'site_logo',
		   array(
			   'label'      => __( 'Upload a logo', 'ngaire' ),
			   'section'    => 'title_tagline',
			   'settings'   => 'site_logo',
		   )
	   )
	);
	
	$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'site_logo_mobile',
           array(
               'label'      => __( 'Upload a seperate logo for mobile devices', 'ngaire' ),
               'section'    => 'title_tagline',
               'settings'   => 'site_logo_mobile',
           )
       )
   );
	
}

function ngaire_social_customize_register($wp_customize) {
	// Lets add a section for #social
	$wp_customize->add_section(
		// ID
		'social_section',
		// Arguments array
		array(
			'title' => __( 'Social & Contact Settings', 'ngaire-2-0' ),
			'description' => __( 'Add / Edit your Social & Contact Links', 'ngaire-2-0' ),
			'priority' => 30,
		)
	);
	
	//#twitter / fb / google / linkedin / insta / youtube
	
	$wp_customize->add_setting("twitter_url", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_setting("facebook_url", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_setting("google_url", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_setting("linkedin_url", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_setting("instagram_url", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_setting("youtube_url", array(
		"default" => "",
		"transport" => "refresh",
	));
		
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"twitter_url",
		array(
			"label" => __("Twitter URL", "customizer_twitter_url_label"),
			"section" => "social_section",
			"settings" => "twitter_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"facebook_url",
		array(
			"label" => __("Facebook URL", "customizer_facebook_url_label"),
			"section" => "social_section",
			"settings" => "facebook_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"google_url",
		array(
			"label" => __("Google URL", "customizer_google_url_label"),
			"section" => "social_section",
			"settings" => "google_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"linkedin_url",
		array(
			"label" => __("Linkedin URL", "customizer_linkedin_url_label"),
			"section" => "social_section",
			"settings" => "linkedin_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"instagram_url",
		array(
			"label" => __("Instagram URL", "customizer_instagram_url_label"),
			"section" => "social_section",
			"settings" => "instagram_url",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"youtube_url",
		array(
			"label" => __("Youtube URL", "customizer_youtube_url_label"),
			"section" => "social_section",
			"settings" => "youtube_url",
			"type" => "text",
		)
	));
	
	//#contact email / phone / office address / general hours
	
	$wp_customize->add_setting("contact_email_address", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("contact_phone", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("office_address_short", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_setting("general_hours", array(
		"default" => "",
		"transport" => "postMessage",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contact_email_address",
		array(
			"label" => __("Contact Email", "customizer_contact_email_address_label"),
			"section" => "social_section",
			"settings" => "contact_email_address",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"contact_phone",
		array(
			"label" => __("Contact Phone", "customizer_contact_phone_label"),
			"section" => "social_section",
			"settings" => "contact_phone",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"office_address_short",
		array(
			"label" => __("Office Address", "customizer_office_address_short_label"),
			"section" => "social_section",
			"settings" => "office_address_short",
			"type" => "text",
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"general_hours",
		array(
			"label" => __("General Hours", "customizer_general_hours_label"),
			"section" => "social_section",
			"settings" => "general_hours",
			"type" => "text",
		)
	));
	
}

add_action( 'customize_register', 'ngaire_customize_register' );
add_action( 'customize_register', 'ngaire_social_customize_register' );

function ngaire_theming_customize_register($wp_customize) {
	// Lets add a section for #social
	$wp_customize->add_section(
		// ID
		'theming_section',
		// Arguments array
		array(
			'title' => __( 'Theming (Color & Font) Settings', 'ngaire-2-0' ),
			'description' => __( 'Update your colors & fonts', 'ngaire-2-0' ),
			'priority' => 30,
		)
	);
	
	// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
	$txtcolors = array();
	$txtcolors[] = array(
		'slug'=>'color-light', 
		'label' => 'Light Color'
	);
	$txtcolors[] = array(
		'slug'=>'color-dark', 
		'label' => 'Dark Color'
	);
	$txtcolors[] = array(
		'slug'=>'color-text', 
		'label' => 'Text Color'
	);
	$txtcolors[] = array(
		'slug'=>'color-neutral', 
		'label' => 'Neutral Color'
	);
	$txtcolors[] = array(
		'slug'=>'color-grey', 
		'label' => 'Grey Color'
	);

	// add the settings and controls for each color
	foreach( $txtcolors as $txtcolor ) {

		$wp_customize->add_setting($txtcolor['slug'], array(
			"default" => "",
			"transport" => "postMessage",
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize,
			$txtcolor['slug'],
			array(
				"label" => $txtcolor['label'],
				"section" => "theming_section",
				"settings" => $txtcolor['slug']
			)
		)); 

	}

	$font_sizes = array();
	$fonts_sizes[] = array(
		'slug'	=>'font-size-base', 
		'label' => 'Body Font Size'
	);
	$fonts_sizes[] = array(
		'slug'	=>'font-size-navbar', 
		'label' => 'Navbar Font Size'
	);
	$fonts_sizes[] = array(
		'slug'	=>'font-size-preheader', 
		'label' => 'Preheader Font Size'
	);
	$fonts_sizes[] = array(
		'slug'	=>'font-size-footer', 
		'label' => 'Footer Font Size'
	);
	$fonts_sizes[] = array(
		'slug'	=>'font-size-buttons', 
		'label' => 'Buttons Font Size'
	);

	// add the settings and controls for each color
	foreach( $fonts_sizes as $font_size ) {

		$wp_customize->add_setting($font_size['slug'], array(
			"default" => "",
			"transport" => "postMessage",
		));

		$wp_customize->add_control(
			new WP_Customize_Control(
			$wp_customize,
			$font_size['slug'],
			array(
				"label" => $font_size['label'],
				"section" => "theming_section",
				"settings" => $font_size['slug']
			)
		)); 
	}

	$fonts = array();
	$fonts[] = array(
		'slug'=>'font-headings', 
		'label' => 'Headings Font'
	);
	$fonts[] = array(
		'slug'=>'font-main', 
		'label' => 'Body Font'
	);


	// add the settings and controls for each color
	foreach( $fonts as $font ) {

		$wp_customize->add_setting($font['slug'], array(
			"default" => "",
			"transport" => "postMessage",
		));

		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			$font['slug'],
			array(
				"label" 	=> $font['label'],
				"section" 	=> "theming_section",
				"settings" 	=> $font['slug'],
				"type"		=> "select",
				"choices"	=> array(
					'' => '',
					'ABeeZee' =>	'ABeeZee',
					'Abel' =>	'Abel',
					'Abril+Fatface' =>	'Abril Fatface',
					'Aclonica' =>	'Aclonica',
					'Acme' =>	'Acme',
					'Actor' =>	'Actor',
					'Adamina' =>	'Adamina',
					'Advent+Pro' =>	'Advent Pro',
					'Aguafina+Script' =>	'Aguafina Script',
					'Akronim' =>	'Akronim',
					'Aladin' =>	'Aladin',
					'Aldrich' =>	'Aldrich',
					'Alef' =>	'Alef',
					'Alegreya' =>	'Alegreya',
					'Alegreya+SC' =>	'Alegreya SC',
					'Alegreya+Sans' =>	'Alegreya Sans',
					'Alegreya+Sans+SC' =>	'Alegreya Sans SC',
					'Alex+Brush' =>	'Alex Brush',
					'Alfa+Slab+One' =>	'Alfa Slab One',
					'Alice' =>	'Alice',
					'Alike' =>	'Alike',
					'Alike+Angular' =>	'Alike Angular',
					'Allan' =>	'Allan',
					'Allerta' =>	'Allerta',
					'Allerta+Stencil' =>	'Allerta Stencil',
					'Allura' =>	'Allura',
					'Almendra' =>	'Almendra',
					'Almendra+Display' =>	'Almendra Display',
					'Almendra+SC' =>	'Almendra SC',
					'Amarante' =>	'Amarante',
					'Amaranth' =>	'Amaranth',
					'Amatic+SC' =>	'Amatic SC',
					'Amethysta' =>	'Amethysta',
					'Amiri' =>	'Amiri',
					'Amita' =>	'Amita',
					'Anaheim' =>	'Anaheim',
					'Andada' =>	'Andada',
					'Andika' =>	'Andika',
					'Angkor' =>	'Angkor',
					'Annie+Use+Your+Telescope' =>	'Annie Use Your Telescope',
					'Anonymous+Pro' =>	'Anonymous Pro',
					'Antic' =>	'Antic',
					'Antic+Didone' =>	'Antic Didone',
					'Antic+Slab' =>	'Antic Slab',
					'Anton' =>	'Anton',
					'Arapey' =>	'Arapey',
					'Arbutus' =>	'Arbutus',
					'Arbutus+Slab' =>	'Arbutus Slab',
					'Architects+Daughter' =>	'Architects Daughter',
					'Archivo+Black' =>	'Archivo Black',
					'Archivo+Narrow' =>	'Archivo Narrow',
					'Arimo' =>	'Arimo',
					'Arizonia' =>	'Arizonia',
					'Armata' =>	'Armata',
					'Artifika' =>	'Artifika',
					'Arvo' =>	'Arvo',
					'Arya' =>	'Arya',
					'Asap' =>	'Asap',
					'Asar' =>	'Asar',
					'Asset' =>	'Asset',
					'Astloch' =>	'Astloch',
					'Asul' =>	'Asul',
					'Atomic+Age' =>	'Atomic Age',
					'Aubrey' =>	'Aubrey',
					'Audiowide' =>	'Audiowide',
					'Autour+One' =>	'Autour One',
					'Average' =>	'Average',
					'Average+Sans' =>	'Average Sans',
					'Averia+Gruesa+Libre' =>	'Averia Gruesa Libre',
					'Averia+Libre' =>	'Averia Libre',
					'Averia+Sans+Libre' =>	'Averia Sans Libre',
					'Averia+Serif+Libre' =>	'Averia Serif Libre',
					'Bad+Script' =>	'Bad Script',
					'Balthazar' =>	'Balthazar',
					'Bangers' =>	'Bangers',
					'Basic' =>	'Basic',
					'Battambang' =>	'Battambang',
					'Baumans' =>	'Baumans',
					'Bayon' =>	'Bayon',
					'Bebas' =>	'Bebas',
					'Bebas+Neue' =>	'Bebas Neue',
					'Belgrano' =>	'Belgrano',
					'Belleza' =>	'Belleza',
					'BenchNine' =>	'BenchNine',
					'Bentham' =>	'Bentham',
					'Berkshire+Swash' =>	'Berkshire Swash',
					'Bevan' =>	'Bevan',
					'Bigelow+Rules' =>	'Bigelow Rules',
					'Bigshot+One' =>	'Bigshot One',
					'Bilbo' =>	'Bilbo',
					'Bilbo+Swash+Caps' =>	'Bilbo Swash Caps',
					'Biryani' =>	'Biryani',
					'Bitter' =>	'Bitter',
					'Black+Ops+One' =>	'Black Ops One',
					'Bokor' =>	'Bokor',
					'Bonbon' =>	'Bonbon',
					'Boogaloo' =>	'Boogaloo',
					'Bowlby+One' =>	'Bowlby One',
					'Bowlby+One+SC' =>	'Bowlby One SC',
					'Brawler' =>	'Brawler',
					'Bree+Serif' =>	'Bree Serif',
					'Bubblegum+Sans' =>	'Bubblegum Sans',
					'Bubbler+One' =>	'Bubbler One',
					'Buda' =>	'Buda',
					'Buenard' =>	'Buenard',
					'Butcherman' =>	'Butcherman',
					'Butterfly+Kids' =>	'Butterfly Kids',
					'Cabin' =>	'Cabin',
					'Cabin+Condensed' =>	'Cabin Condensed',
					'Cabin+Sketch' =>	'Cabin Sketch',
					'Caesar+Dressing' =>	'Caesar Dressing',
					'Cagliostro' =>	'Cagliostro',
					'Calligraffitti' =>	'Calligraffitti',
					'Cambay' =>	'Cambay',
					'Cambo' =>	'Cambo',
					'Candal' =>	'Candal',
					'Cantarell' =>	'Cantarell',
					'Cantata+One' =>	'Cantata One',
					'Cantora+One' =>	'Cantora One',
					'Capriola' =>	'Capriola',
					'Cardo' =>	'Cardo',
					'Carme' =>	'Carme',
					'Carrois+Gothic' =>	'Carrois Gothic',
					'Carrois+Gothic+SC' =>	'Carrois Gothic SC',
					'Carter+One' =>	'Carter One',
					'Catamaran' =>	'Catamaran',
					'Caudex' =>	'Caudex',
					'Caveat' =>	'Caveat',
					'Caveat+Brush' =>	'Caveat Brush',
					'Cedarville+Cursive' =>	'Cedarville Cursive',
					'Ceviche+One' =>	'Ceviche One',
					'Changa+One' =>	'Changa One',
					'Chango' =>	'Chango',
					'Chau+Philomene+One' =>	'Chau Philomene One',
					'Chela+One' =>	'Chela One',
					'Chelsea+Market' =>	'Chelsea Market',
					'Chenla' =>	'Chenla',
					'Cherry+Cream+Soda' =>	'Cherry Cream Soda',
					'Cherry+Swash' =>	'Cherry Swash',
					'Chewy' =>	'Chewy',
					'Chicle' =>	'Chicle',
					'Chivo' =>	'Chivo',
					'Chonburi' =>	'Chonburi',
					'Cinzel' =>	'Cinzel',
					'Cinzel+Decorative' =>	'Cinzel Decorative',
					'Clicker+Script' =>	'Clicker Script',
					'Coda' =>	'Coda',
					'Coda+Caption' =>	'Coda Caption',
					'Codystar' =>	'Codystar',
					'Combo' =>	'Combo',
					'Comfortaa' =>	'Comfortaa',
					'Coming+Soon' =>	'Coming Soon',
					'Concert+One' =>	'Concert One',
					'Condiment' =>	'Condiment',
					'Content' =>	'Content',
					'Contrail+One' =>	'Contrail One',
					'Convergence' =>	'Convergence',
					'Cookie' =>	'Cookie',
					'Copse' =>	'Copse',
					'Corben' =>	'Corben',
					'Courgette' =>	'Courgette',
					'Cousine' =>	'Cousine',
					'Coustard' =>	'Coustard',
					'Covered+By+Your+Grace' =>	'Covered By Your Grace',
					'Crafty+Girls' =>	'Crafty Girls',
					'Creepster' =>	'Creepster',
					'Crete+Round' =>	'Crete Round',
					'Crimson+Text' =>	'Crimson Text',
					'Croissant+One' =>	'Croissant One',
					'Crushed' =>	'Crushed',
					'Cuprum' =>	'Cuprum',
					'Cutive' =>	'Cutive',
					'Cutive+Mono' =>	'Cutive Mono',
					'Damion' =>	'Damion',
					'Dancing+Script' =>	'Dancing Script',
					'Dangrek' =>	'Dangrek',
					'Dawning+of+a+New+Day' =>	'Dawning of a New Day',
					'Days+One' =>	'Days One',
					'Dekko' =>	'Dekko',
					'Delius' =>	'Delius',
					'Delius+Swash+Caps' =>	'Delius Swash Caps',
					'Delius+Unicase' =>	'Delius Unicase',
					'Della+Respira' =>	'Della Respira',
					'Denk+One' =>	'Denk One',
					'Devonshire' =>	'Devonshire',
					'Dhurjati' =>	'Dhurjati',
					'Didact+Gothic' =>	'Didact Gothic',
					'Diplomata' =>	'Diplomata',
					'Diplomata+SC' =>	'Diplomata SC',
					'Domine' =>	'Domine',
					'Donegal+One' =>	'Donegal One',
					'Doppio+One' =>	'Doppio One',
					'Dorsa' =>	'Dorsa',
					'Dosis' =>	'Dosis',
					'Dr+Sugiyama' =>	'Dr Sugiyama',
					'Droid+Sans' =>	'Droid Sans',
					'Droid+Sans+Mono' =>	'Droid Sans Mono',
					'Droid+Serif' =>	'Droid Serif',
					'Duru+Sans' =>	'Duru Sans',
					'Dynalight' =>	'Dynalight',
					'EB+Garamond' =>	'EB Garamond',
					'Eagle+Lake' =>	'Eagle Lake',
					'Eater' =>	'Eater',
					'Economica' =>	'Economica',
					'Eczar' =>	'Eczar',
					'Ek+Mukta' =>	'Ek Mukta',
					'Electrolize' =>	'Electrolize',
					'Elsie' =>	'Elsie',
					'Elsie+Swash+Caps' =>	'Elsie Swash Caps',
					'Emblema+One' =>	'Emblema One',
					'Emilys+Candy' =>	'Emilys Candy',
					'Engagement' =>	'Engagement',
					'Englebert' =>	'Englebert',
					'Enriqueta' =>	'Enriqueta',
					'Erica+One' =>	'Erica One',
					'Esteban' =>	'Esteban',
					'Euphoria+Script' =>	'Euphoria Script',
					'Ewert' =>	'Ewert',
					'Exo' =>	'Exo',
					'Exo+2' =>	'Exo 2',
					'Expletus+Sans' =>	'Expletus Sans',
					'Fanwood+Text' =>	'Fanwood Text',
					'Fascinate' =>	'Fascinate',
					'Fascinate+Inline' =>	'Fascinate Inline',
					'Faster+One' =>	'Faster One',
					'Fasthand' =>	'Fasthand',
					'Fauna+One' =>	'Fauna One',
					'Federant' =>	'Federant',
					'Federo' =>	'Federo',
					'Felipa' =>	'Felipa',
					'Fenix' =>	'Fenix',
					'Finger+Paint' =>	'Finger Paint',
					'Fira+Mono' =>	'Fira Mono',
					'Fira+Sans' =>	'Fira Sans',
					'Fjalla+One' =>	'Fjalla One',
					'Fjord+One' =>	'Fjord One',
					'Flamenco' =>	'Flamenco',
					'Flavors' =>	'Flavors',
					'Fondamento' =>	'Fondamento',
					'Fontdiner+Swanky' =>	'Fontdiner Swanky',
					'Forum' =>	'Forum',
					'Francois+One' =>	'Francois One',
					'Freckle+Face' =>	'Freckle Face',
					'Fredericka+the+Great' =>	'Fredericka the Great',
					'Fredoka+One' =>	'Fredoka One',
					'Freehand' =>	'Freehand',
					'Fresca' =>	'Fresca',
					'Frijole' =>	'Frijole',
					'Fruktur' =>	'Fruktur',
					'Fugaz+One' =>	'Fugaz One',
					'GFS+Didot' =>	'GFS Didot',
					'GFS+Neohellenic' =>	'GFS Neohellenic',
					'Gabriela' =>	'Gabriela',
					'Gafata' =>	'Gafata',
					'Galdeano' =>	'Galdeano',
					'Galindo' =>	'Galindo',
					'Gentium+Basic' =>	'Gentium Basic',
					'Gentium+Book+Basic' =>	'Gentium Book Basic',
					'Geo' =>	'Geo',
					'Geostar' =>	'Geostar',
					'Geostar+Fill' =>	'Geostar Fill',
					'Germania+One' =>	'Germania One',
					'Gidugu' =>	'Gidugu',
					'Gilda+Display' =>	'Gilda Display',
					'Give+You+Glory' =>	'Give You Glory',
					'Glass+Antiqua' =>	'Glass Antiqua',
					'Glegoo' =>	'Glegoo',
					'Gloria+Hallelujah' =>	'Gloria Hallelujah',
					'Goblin+One' =>	'Goblin One',
					'Gochi+Hand' =>	'Gochi Hand',
					'Gorditas' =>	'Gorditas',
					'Goudy+Bookletter+1911' =>	'Goudy Bookletter 1911',
					'Graduate' =>	'Graduate',
					'Grand+Hotel' =>	'Grand Hotel',
					'Gravitas+One' =>	'Gravitas One',
					'Great+Vibes' =>	'Great Vibes',
					'Griffy' =>	'Griffy',
					'Gruppo' =>	'Gruppo',
					'Gudea' =>	'Gudea',
					'Gurajada' =>	'Gurajada',
					'Habibi' =>	'Habibi',
					'Halant' =>	'Halant',
					'Hammersmith+One' =>	'Hammersmith One',
					'Hanalei' =>	'Hanalei',
					'Hanalei+Fill' =>	'Hanalei Fill',
					'Handlee' =>	'Handlee',
					'Hanuman' =>	'Hanuman',
					'Happy+Monkey' =>	'Happy Monkey',
					'Headland+One' =>	'Headland One',
					'Henny+Penny' =>	'Henny Penny',
					'Herr+Von+Muellerhoff' =>	'Herr Von Muellerhoff',
					'Hind' =>	'Hind',
					'Hind+Siliguri' =>	'Hind Siliguri',
					'Hind+Vadodara' =>	'Hind Vadodara',
					'Holtwood+One+SC' =>	'Holtwood One SC',
					'Homemade+Apple' =>	'Homemade Apple',
					'Homenaje' =>	'Homenaje',
					'IM+Fell+DW+Pica' =>	'IM Fell DW Pica',
					'IM+Fell+DW+Pica+SC' =>	'IM Fell DW Pica SC',
					'IM+Fell+Double+Pica' =>	'IM Fell Double Pica',
					'IM+Fell+Double+Pica+SC' =>	'IM Fell Double Pica SC',
					'IM+Fell+English' =>	'IM Fell English',
					'IM+Fell+English+SC' =>	'IM Fell English SC',
					'IM+Fell+French+Canon' =>	'IM Fell French Canon',
					'IM+Fell+French+Canon+SC' =>	'IM Fell French Canon SC',
					'IM+Fell+Great+Primer' =>	'IM Fell Great Primer',
					'IM+Fell+Great+Primer+SC' =>	'IM Fell Great Primer SC',
					'Iceberg' =>	'Iceberg',
					'Iceland' =>	'Iceland',
					'Imprima' =>	'Imprima',
					'Inconsolata' =>	'Inconsolata',
					'Inder' =>	'Inder',
					'Indie+Flower' =>	'Indie Flower',
					'Inika' =>	'Inika',
					'Inknut+Antiqua' =>	'Inknut Antiqua',
					'Irish+Grover' =>	'Irish Grover',
					'Istok+Web' =>	'Istok Web',
					'Italiana' =>	'Italiana',
					'Italianno' =>	'Italianno',
					'Itim' =>	'Itim',
					'Jacques+Francois' =>	'Jacques Francois',
					'Jacques+Francois+Shadow' =>	'Jacques Francois Shadow',
					'Jaldi' =>	'Jaldi',
					'Jim+Nightshade' =>	'Jim Nightshade',
					'Jockey+One' =>	'Jockey One',
					'Jolly+Lodger' =>	'Jolly Lodger',
					'Josefin+Sans' =>	'Josefin Sans',
					'Josefin+Slab' =>	'Josefin Slab',
					'Joti+One' =>	'Joti One',
					'Judson' =>	'Judson',
					'Julee' =>	'Julee',
					'Julius+Sans+One' =>	'Julius Sans One',
					'Junge' =>	'Junge',
					'Jura' =>	'Jura',
					'Just+Another+Hand' =>	'Just Another Hand',
					'Just+Me+Again+Down+Here' =>	'Just Me Again Down Here',
					'Kadwa' =>	'Kadwa',
					'Kalam' =>	'Kalam',
					'Kameron' =>	'Kameron',
					'Kantumruy' =>	'Kantumruy',
					'Karla' =>	'Karla',
					'Karma' =>	'Karma',
					'Kaushan+Script' =>	'Kaushan Script',
					'Kavoon' =>	'Kavoon',
					'Kdam+Thmor' =>	'Kdam Thmor',
					'Keania+One' =>	'Keania One',
					'Kelly+Slab' =>	'Kelly Slab',
					'Kenia' =>	'Kenia',
					'Khand' =>	'Khand',
					'Khmer' =>	'Khmer',
					'Khula' =>	'Khula',
					'Kite+One' =>	'Kite One',
					'Knewave' =>	'Knewave',
					'Kotta+One' =>	'Kotta One',
					'Koulen' =>	'Koulen',
					'Kranky' =>	'Kranky',
					'Kreon' =>	'Kreon',
					'Kristi' =>	'Kristi',
					'Krona+One' =>	'Krona One',
					'Kurale' =>	'Kurale',
					'La+Belle+Aurore' =>	'La Belle Aurore',
					'Laila' =>	'Laila',
					'Lakki+Reddy' =>	'Lakki Reddy',
					'Lancelot' =>	'Lancelot',
					'Lateef' =>	'Lateef',
					'Lato' =>	'Lato',
					'League+Script' =>	'League Script',
					'Leckerli+One' =>	'Leckerli One',
					'Ledger' =>	'Ledger',
					'Lekton' =>	'Lekton',
					'Lemon' =>	'Lemon',
					'Libre+Baskerville' =>	'Libre Baskerville',
					'Life+Savers' =>	'Life Savers',
					'Lilita+One' =>	'Lilita One',
					'Lily+Script+One' =>	'Lily Script One',
					'Limelight' =>	'Limelight',
					'Linden+Hill' =>	'Linden Hill',
					'Lobster' =>	'Lobster',
					'Lobster+Two' =>	'Lobster Two',
					'Londrina+Outline' =>	'Londrina Outline',
					'Londrina+Shadow' =>	'Londrina Shadow',
					'Londrina+Sketch' =>	'Londrina Sketch',
					'Londrina+Solid' =>	'Londrina Solid',
					'Lora' =>	'Lora',
					'Love+Ya+Like+A+Sister' =>	'Love Ya Like A Sister',
					'Loved+by+the+King' =>	'Loved by the King',
					'Lovers+Quarrel' =>	'Lovers Quarrel',
					'Luckiest+Guy' =>	'Luckiest Guy',
					'Lusitana' =>	'Lusitana',
					'Lustria' =>	'Lustria',
					'Macondo' =>	'Macondo',
					'Macondo+Swash+Caps' =>	'Macondo Swash Caps',
					'Magra' =>	'Magra',
					'Maiden+Orange' =>	'Maiden Orange',
					'Mako' =>	'Mako',
					'Mallanna' =>	'Mallanna',
					'Mandali' =>	'Mandali',
					'Marcellus' =>	'Marcellus',
					'Marcellus+SC' =>	'Marcellus SC',
					'Marck+Script' =>	'Marck Script',
					'Margarine' =>	'Margarine',
					'Marko+One' =>	'Marko One',
					'Marmelad' =>	'Marmelad',
					'Martel' =>	'Martel',
					'Martel+Sans' =>	'Martel Sans',
					'Marvel' =>	'Marvel',
					'Mate' =>	'Mate',
					'Mate+SC' =>	'Mate SC',
					'Maven+Pro' =>	'Maven Pro',
					'McLaren' =>	'McLaren',
					'Meddon' =>	'Meddon',
					'MedievalSharp' =>	'MedievalSharp',
					'Medula+One' =>	'Medula One',
					'Megrim' =>	'Megrim',
					'Meie+Script' =>	'Meie Script',
					'Merienda' =>	'Merienda',
					'Merienda+One' =>	'Merienda One',
					'Merriweather' =>	'Merriweather',
					'Merriweather+Sans' =>	'Merriweather Sans',
					'Metal' =>	'Metal',
					'Metal+Mania' =>	'Metal Mania',
					'Metamorphous' =>	'Metamorphous',
					'Metrophobic' =>	'Metrophobic',
					'Michroma' =>	'Michroma',
					'Milonga' =>	'Milonga',
					'Miltonian' =>	'Miltonian',
					'Miltonian+Tattoo' =>	'Miltonian Tattoo',
					'Miniver' =>	'Miniver',
					'Miss+Fajardose' =>	'Miss Fajardose',
					'Modak' =>	'Modak',
					'Modern+Antiqua' =>	'Modern Antiqua',
					'Molengo' =>	'Molengo',
					'Molle' =>	'Molle',
					'Monda' =>	'Monda',
					'Monofett' =>	'Monofett',
					'Monoton' =>	'Monoton',
					'Monsieur+La+Doulaise' =>	'Monsieur La Doulaise',
					'Montaga' =>	'Montaga',
					'Montez' =>	'Montez',
					'Montserrat' =>	'Montserrat',
					'Montserrat+Alternates' =>	'Montserrat Alternates',
					'Montserrat+Subrayada' =>	'Montserrat Subrayada',
					'Moul' =>	'Moul',
					'Moulpali' =>	'Moulpali',
					'Mountains+of+Christmas' =>	'Mountains of Christmas',
					'Mouse+Memoirs' =>	'Mouse Memoirs',
					'Mr+Bedfort' =>	'Mr Bedfort',
					'Mr+Dafoe' =>	'Mr Dafoe',
					'Mr+De+Haviland' =>	'Mr De Haviland',
					'Mrs+Saint+Delafield' =>	'Mrs Saint Delafield',
					'Mrs+Sheppards' =>	'Mrs Sheppards',
					'Muli' =>	'Muli',
					'Mystery+Quest' =>	'Mystery Quest',
					'NTR' =>	'NTR',
					'Neucha' =>	'Neucha',
					'Neuton' =>	'Neuton',
					'New+Rocker' =>	'New Rocker',
					'News+Cycle' =>	'News Cycle',
					'Niconne' =>	'Niconne',
					'Nixie+One' =>	'Nixie One',
					'Nobile' =>	'Nobile',
					'Nokora' =>	'Nokora',
					'Norican' =>	'Norican',
					'Nosifer' =>	'Nosifer',
					'Nothing+You+Could+Do' =>	'Nothing You Could Do',
					'Noticia+Text' =>	'Noticia Text',
					'Noto+Sans' =>	'Noto Sans',
					'Noto+Serif' =>	'Noto Serif',
					'Nova+Cut' =>	'Nova Cut',
					'Nova+Flat' =>	'Nova Flat',
					'Nova+Mono' =>	'Nova Mono',
					'Nova+Oval' =>	'Nova Oval',
					'Nova+Round' =>	'Nova Round',
					'Nova+Script' =>	'Nova Script',
					'Nova+Slim' =>	'Nova Slim',
					'Nova+Square' =>	'Nova Square',
					'Numans' =>	'Numans',
					'Nunito' =>	'Nunito',
					'Odor+Mean+Chey' =>	'Odor Mean Chey',
					'Offside' =>	'Offside',
					'Old+Standard+TT' =>	'Old Standard TT',
					'Oldenburg' =>	'Oldenburg',
					'Oleo+Script' =>	'Oleo Script',
					'Oleo+Script+Swash+Caps' =>	'Oleo Script Swash Caps',
					'Open+Sans' =>	'Open Sans',
					'Open+Sans+Condensed' =>	'Open Sans Condensed',
					'Oranienbaum' =>	'Oranienbaum',
					'Orbitron' =>	'Orbitron',
					'Oregano' =>	'Oregano',
					'Orienta' =>	'Orienta',
					'Original+Surfer' =>	'Original Surfer',
					'Oswald' =>	'Oswald',
					'Over+the+Rainbow' =>	'Over the Rainbow',
					'Overlock' =>	'Overlock',
					'Overlock+SC' =>	'Overlock SC',
					'Ovo' =>	'Ovo',
					'Oxygen' =>	'Oxygen',
					'Oxygen+Mono' =>	'Oxygen Mono',
					'PT+Mono' =>	'PT Mono',
					'PT+Sans' =>	'PT Sans',
					'PT+Sans+Caption' =>	'PT Sans Caption',
					'PT+Sans+Narrow' =>	'PT Sans Narrow',
					'PT+Serif' =>	'PT Serif',
					'PT+Serif+Caption' =>	'PT Serif Caption',
					'Pacifico' =>	'Pacifico',
					'Palanquin' =>	'Palanquin',
					'Palanquin+Dark' =>	'Palanquin Dark',
					'Paprika' =>	'Paprika',
					'Parisienne' =>	'Parisienne',
					'Passero+One' =>	'Passero One',
					'Passion+One' =>	'Passion One',
					'Pathway+Gothic+One' =>	'Pathway Gothic One',
					'Patrick+Hand' =>	'Patrick Hand',
					'Patrick+Hand+SC' =>	'Patrick Hand SC',
					'Patua+One' =>	'Patua One',
					'Paytone+One' =>	'Paytone One',
					'Peddana' =>	'Peddana',
					'Peralta' =>	'Peralta',
					'Permanent+Marker' =>	'Permanent Marker',
					'Petit+Formal+Script' =>	'Petit Formal Script',
					'Petrona' =>	'Petrona',
					'Philosopher' =>	'Philosopher',
					'Piedra' =>	'Piedra',
					'Pinyon+Script' =>	'Pinyon Script',
					'Pirata+One' =>	'Pirata One',
					'Plaster' =>	'Plaster',
					'Play' =>	'Play',
					'Playball' =>	'Playball',
					'Playfair+Display' =>	'Playfair Display',
					'Playfair+Display+SC' =>	'Playfair Display SC',
					'Podkova' =>	'Podkova',
					'Poiret+One' =>	'Poiret One',
					'Poller+One' =>	'Poller One',
					'Poly' =>	'Poly',
					'Pompiere' =>	'Pompiere',
					'Pontano+Sans' =>	'Pontano Sans',
					'Poppins' =>	'Poppins',
					'Port+Lligat+Sans' =>	'Port Lligat Sans',
					'Port+Lligat+Slab' =>	'Port Lligat Slab',
					'Pragati+Narrow' =>	'Pragati Narrow',
					'Prata' =>	'Prata',
					'Preahvihear' =>	'Preahvihear',
					'Press+Start+2P' =>	'Press Start 2P',
					'Princess+Sofia' =>	'Princess Sofia',
					'Prociono' =>	'Prociono',
					'Prosto+One' =>	'Prosto One',
					'Puritan' =>	'Puritan',
					'Purple+Purse' =>	'Purple Purse',
					'Quando' =>	'Quando',
					'Quantico' =>	'Quantico',
					'Quattrocento' =>	'Quattrocento',
					'Quattrocento+Sans' =>	'Quattrocento Sans',
					'Questrial' =>	'Questrial',
					'Quicksand' =>	'Quicksand',
					'Quintessential' =>	'Quintessential',
					'Qwigley' =>	'Qwigley',
					'Racing+Sans+One' =>	'Racing Sans One',
					'Radley' =>	'Radley',
					'Rajdhani' =>	'Rajdhani',
					'Raleway' =>	'Raleway',
					'Raleway+Dots' =>	'Raleway Dots',
					'Ramabhadra' =>	'Ramabhadra',
					'Ramaraja' =>	'Ramaraja',
					'Rambla' =>	'Rambla',
					'Rammetto+One' =>	'Rammetto One',
					'Ranchers' =>	'Ranchers',
					'Rancho' =>	'Rancho',
					'Ranga' =>	'Ranga',
					'Rationale' =>	'Rationale',
					'Ravi+Prakash' =>	'Ravi Prakash',
					'Redressed' =>	'Redressed',
					'Reenie+Beanie' =>	'Reenie Beanie',
					'Revalia' =>	'Revalia',
					'Rhodium+Libre' =>	'Rhodium Libre',
					'Ribeye' =>	'Ribeye',
					'Ribeye+Marrow' =>	'Ribeye Marrow',
					'Righteous' =>	'Righteous',
					'Risque' =>	'Risque',
					'Roboto' =>	'Roboto',
					'Roboto+Condensed' =>	'Roboto Condensed',
					'Roboto+Mono' =>	'Roboto Mono',
					'Roboto+Slab' =>	'Roboto Slab',
					'Rochester' =>	'Rochester',
					'Rock+Salt' =>	'Rock Salt',
					'Rokkitt' =>	'Rokkitt',
					'Romanesco' =>	'Romanesco',
					'Ropa+Sans' =>	'Ropa Sans',
					'Rosario' =>	'Rosario',
					'Rosarivo' =>	'Rosarivo',
					'Rouge+Script' =>	'Rouge Script',
					'Rozha+One' =>	'Rozha One',
					'Rubik' =>	'Rubik',
					'Rubik+Mono+One' =>	'Rubik Mono One',
					'Rubik+One' =>	'Rubik One',
					'Ruda' =>	'Ruda',
					'Rufina' =>	'Rufina',
					'Ruge+Boogie' =>	'Ruge Boogie',
					'Ruluko' =>	'Ruluko',
					'Rum+Raisin' =>	'Rum Raisin',
					'Ruslan+Display' =>	'Ruslan Display',
					'Russo+One' =>	'Russo One',
					'Ruthie' =>	'Ruthie',
					'Rye' =>	'Rye',
					'Sacramento' =>	'Sacramento',
					'Sahitya' =>	'Sahitya',
					'Sail' =>	'Sail',
					'Salsa' =>	'Salsa',
					'Sanchez' =>	'Sanchez',
					'Sancreek' =>	'Sancreek',
					'Sansita+One' =>	'Sansita One',
					'Sarala' =>	'Sarala',
					'Sarina' =>	'Sarina',
					'Sarpanch' =>	'Sarpanch',
					'Satisfy' =>	'Satisfy',
					'Scada' =>	'Scada',
					'Scheherazade' =>	'Scheherazade',
					'Schoolbell' =>	'Schoolbell',
					'Seaweed+Script' =>	'Seaweed Script',
					'Sevillana' =>	'Sevillana',
					'Seymour+One' =>	'Seymour One',
					'Shadows+Into+Light' =>	'Shadows Into Light',
					'Shadows+Into+Light+Two' =>	'Shadows Into Light Two',
					'Shanti' =>	'Shanti',
					'Share' =>	'Share',
					'Share+Tech' =>	'Share Tech',
					'Share+Tech+Mono' =>	'Share Tech Mono',
					'Shojumaru' =>	'Shojumaru',
					'Short+Stack' =>	'Short Stack',
					'Siemreap' =>	'Siemreap',
					'Sigmar+One' =>	'Sigmar One',
					'Signika' =>	'Signika',
					'Signika+Negative' =>	'Signika Negative',
					'Simonetta' =>	'Simonetta',
					'Sintony' =>	'Sintony',
					'Sirin+Stencil' =>	'Sirin Stencil',
					'Six+Caps' =>	'Six Caps',
					'Skranji' =>	'Skranji',
					'Slabo+13px' =>	'Slabo 13px',
					'Slabo+27px' =>	'Slabo 27px',
					'Slackey' =>	'Slackey',
					'Smokum' =>	'Smokum',
					'Smythe' =>	'Smythe',
					'Sniglet' =>	'Sniglet',
					'Snippet' =>	'Snippet',
					'Snowburst+One' =>	'Snowburst One',
					'Sofadi+One' =>	'Sofadi One',
					'Sofia' =>	'Sofia',
					'Sonsie+One' =>	'Sonsie One',
					'Sorts+Mill+Goudy' =>	'Sorts Mill Goudy',
					'Source+Code+Pro' =>	'Source Code Pro',
					'Source+Sans+Pro' =>	'Source Sans Pro',
					'Source+Serif+Pro' =>	'Source Serif Pro',
					'Special+Elite' =>	'Special Elite',
					'Spicy+Rice' =>	'Spicy Rice',
					'Spinnaker' =>	'Spinnaker',
					'Spirax' =>	'Spirax',
					'Squada+One' =>	'Squada One',
					'Sree+Krushnadevaraya' =>	'Sree Krushnadevaraya',
					'Stalemate' =>	'Stalemate',
					'Stalinist+One' =>	'Stalinist One',
					'Stardos+Stencil' =>	'Stardos Stencil',
					'Stint+Ultra+Condensed' =>	'Stint Ultra Condensed',
					'Stint+Ultra+Expanded' =>	'Stint Ultra Expanded',
					'Stoke' =>	'Stoke',
					'Strait' =>	'Strait',
					'Sue+Ellen+Francisco' =>	'Sue Ellen Francisco',
					'Sumana' =>	'Sumana',
					'Sunshiney' =>	'Sunshiney',
					'Supermercado+One' =>	'Supermercado One',
					'Sura' =>	'Sura',
					'Suranna' =>	'Suranna',
					'Suravaram' =>	'Suravaram',
					'Suwannaphum' =>	'Suwannaphum',
					'Swanky+and+Moo+Moo' =>	'Swanky and Moo Moo',
					'Syncopate' =>	'Syncopate',
					'Tangerine' =>	'Tangerine',
					'Taprom' =>	'Taprom',
					'Tauri' =>	'Tauri',
					'Teko' =>	'Teko',
					'Telex' =>	'Telex',
					'Tenali+Ramakrishna' =>	'Tenali Ramakrishna',
					'Tenor+Sans' =>	'Tenor Sans',
					'Text+Me+One' =>	'Text Me One',
					'The+Girl+Next+Door' =>	'The Girl Next Door',
					'Tienne' =>	'Tienne',
					'Tillana' =>	'Tillana',
					'Timmana' =>	'Timmana',
					'Tinos' =>	'Tinos',
					'Titan+One' =>	'Titan One',
					'Titillium+Web' =>	'Titillium Web',
					'Trade+Winds' =>	'Trade Winds',
					'Trocchi' =>	'Trocchi',
					'Trochut' =>	'Trochut',
					'Trykker' =>	'Trykker',
					'Tulpen+One' =>	'Tulpen One',
					'Ubuntu' =>	'Ubuntu',
					'Ubuntu+Condensed' =>	'Ubuntu Condensed',
					'Ubuntu+Mono' =>	'Ubuntu Mono',
					'Ultra' =>	'Ultra',
					'Uncial+Antiqua' =>	'Uncial Antiqua',
					'Underdog' =>	'Underdog',
					'Unica+One' =>	'Unica One',
					'UnifrakturCook' =>	'UnifrakturCook',
					'UnifrakturMaguntia' =>	'UnifrakturMaguntia',
					'Unkempt' =>	'Unkempt',
					'Unlock' =>	'Unlock',
					'Unna' =>	'Unna',
					'VT323' =>	'VT323',
					'Vampiro+One' =>	'Vampiro One',
					'Varela' =>	'Varela',
					'Varela+Round' =>	'Varela Round',
					'Vast+Shadow' =>	'Vast Shadow',
					'Vesper+Libre' =>	'Vesper Libre',
					'Vibur' =>	'Vibur',
					'Vidaloka' =>	'Vidaloka',
					'Viga' =>	'Viga',
					'Voces' =>	'Voces',
					'Volkhov' =>	'Volkhov',
					'Vollkorn' =>	'Vollkorn',
					'Voltaire' =>	'Voltaire',
					'Waiting+for+the+Sunrise' =>	'Waiting for the Sunrise',
					'Wallpoet' =>	'Wallpoet',
					'Walter+Turncoat' =>	'Walter Turncoat',
					'Warnes' =>	'Warnes',
					'Wellfleet' =>	'Wellfleet',
					'Wendy+One' =>	'Wendy One',
					'Wire+One' =>	'Wire One',
					'Work+Sans' =>	'Work Sans',
					'Yanone+Kaffeesatz' =>	'Yanone Kaffeesatz',
					'Yantramanav' =>	'Yantramanav',
					'Yellowtail' =>	'Yellowtail',
					'Yeseva+One' =>	'Yeseva One',
					'Yesteryear' =>	'Yesteryear',
					'Zeyada' =>	'Zeyada',
				)
			)
		));

	}

}

add_action( 'customize_register', 'ngaire_theming_customize_register' );

function ngaire_header_customize_register($wp_customize) {
	// Lets add a section for #header
	$wp_customize->add_section(
		// ID
		'header_section',
		// Arguments array
		array(
			'title' => __( 'Header Settings', 'ngaire-2-0' ),
			'description' => __( 'Edit your header', 'ngaire-2-0' ),
			'priority' => 30,
		)
	);
	
	$wp_customize->add_setting("show_preheader", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"show_preheader",
		array(
			"label" => __("Show Preheader?", "customizer_show_preheader_label"),
			"section" => "header_section",
			"settings" => "show_preheader",
			"type" => "checkbox",
		)
	));

	$wp_customize->add_setting("show_socials_navbar", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"show_socials_navbar",
		array(
			"label" => __("Show Socials in the Navbar?", "customizer_show_socials_navbar_label"),
			"section" => "header_section",
			"settings" => "show_socials_navbar",
			"type" => "checkbox",
		)
	));

	$wp_customize->add_setting("navbar_type", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"navbar_type",
		array(
			"label" => __("Select the navbar type (static, fixed or sticky)", "customizer_navbar_type_navbar_label"),
			"section" => "header_section",
			"settings" => "navbar_type",
			"type" => "select",
			"choices" => array(
				"static" => "Static",
				"fixed-top" => "Fixed",
				"sticky" => "Sticky"
			)
		)
	));

	$wp_customize->add_setting("navbar_menu_alignment", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"navbar_menu_alignment",
		array(
			"label" => __("Select the navbar alignment", "customizer_navbar_menu_alignment_label"),
			"section" => "header_section",
			"settings" => "navbar_menu_alignment",
			"type" => "select",
			"choices" => array(
				"left" => "Left",
				"center" => "Center",
				"right" => "Right",
				"split" => "Split (Primary menu on left, logo in center, woocommerce on right)",
			)
		)
	));

	$wp_customize->add_setting("logo_position", array(
		"default" => "",
		"transport" => "refresh",
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"logo_position",
		array(
			"label" => __("Select the logo position (above the menu or inline)", "customizer_logo_position_label"),
			"section" => "header_section",
			"settings" => "logo_position",
			"type" => "select",
			"choices" => array(
				"above" => "Above Menu",
				"inline" => "Inline with Menu",
			)
		)
	));
	
}

add_action( 'customize_register', 'ngaire_header_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ngaire_customize_preview_js() {
	wp_enqueue_script( 'ngaire_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ngaire_customize_preview_js' );

class page_options_meta {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'page_options',
			__( 'Page Options', 'ngaire2.0' ),
			array( $this, 'render_metabox' ),
			'page',
			'side',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'page_options_nonce_action', 'page_options_nonce' );

		// Retrieve an existing value from the database.
		$page_options_full_width = get_post_meta( $post->ID, 'page_options_full_width', true );
		$page_options_show_sidebar = get_post_meta( $post->ID, 'page_options_show_sidebar', true );

		// Set default values.

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="page_options_full_width" class="page_options_full_width_label">' . __( 'Full Width page?', 'ngaire2.0' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" name="page_options_full_width" class="page_options_full_width_field" value="' . $page_options_full_width . '" ' . checked( $page_options_full_width, 'checked', false ) . '> ' . __( '', 'ngaire2.0' ) . '</label><br>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="page_options_show_sidebar" class="page_options_show_sidebar_label">' . __( 'Show sidebar?', 'ngaire2.0' ) . '</label></th>';
		echo '		<td>';
		echo '			<label><input type="checkbox" name="page_options_show_sidebar" class="page_options_show_sidebar_field" value="' . $page_options_show_sidebar . '" ' . checked( $page_options_show_sidebar, 'checked', false ) . '> ' . __( '', 'ngaire2.0' ) . '</label><br>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = isset( $_POST['page_options_nonce'] ) ? $_POST['page_options_nonce'] : '';
		$nonce_action = 'page_options_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Sanitize user input.
		$page_options_new_full_width = isset( $_POST[ 'page_options_full_width' ] ) ? 'checked' : '';
		$page_options_new_show_sidebar = isset( $_POST[ 'page_options_show_sidebar' ] ) ? 'checked' : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'page_options_full_width', $page_options_new_full_width );
		update_post_meta( $post_id, 'page_options_show_sidebar', $page_options_new_show_sidebar );
	}

}

new page_options_meta;

add_filter('body_class','custom_field_body_class');
function custom_field_body_class( $classes ) {
	if ( get_post_meta( get_the_ID(), 'page_options_show_sidebar', true ) ) {		
		$classes[] = 'layout-content-sidebar';		
	}
	
	if ( get_post_meta( get_the_ID(), 'page_options_full_width', true ) ) {		
		$classes[] = 'full-width';		
	}
	
	// return the $classes array
	return $classes;
}

