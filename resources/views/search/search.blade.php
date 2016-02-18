<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<title>Morphing Search Input</title>
		<meta name="description" content="A search input that morphs into a fullscreen search page." />
		<meta name="keywords" content="search, input, effect, morph, transition, inspiration" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			
			<div id="morphsearch" class="morphsearch">
				<form class="morphsearch-form">
					<input class="morphsearch-input" type="search" placeholder="Search..."/>
					<button class="morphsearch-submit" type="submit">Search</button>
				</form>
				<div class="morphsearch-content">
					<div class="col-md-12" id="results">

				
						<h2>Faculty</h2>
						
						<a class="dummy-media-object" href="http://twitter.com/SaraSoueidan">
							<img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
							<h3>Sara Soueidan</h3>
						</a>

						<h2>Papers</h2>
						
						<a class="dummy-media-object" href="http://twitter.com/SaraSoueidan">
							<img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
							<h3>Sara Soueidan</h3>
						</a>
							<a class="dummy-media-object" href="http://twitter.com/SaraSoueidan">
							
							<h3>Sara Soueidan</h3>
							<p>hai how are you a  asdf  ;des   loreisam ipadm </p>
						</a>
				
					</div>
					
				</div><!-- /morphsearch-content -->
				<span class="morphsearch-close"></span>
			</div><!-- /morphsearch -->
			<header class="codrops-header">
				<h1>Morphing Search <span>A search input that morphs into a fullscreen search page.</span></h1>
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon-prev" href="http://tympanus.net/Development/WobblySlideshowEffect/"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon-drop" href="http://tympanus.net/codrops/?p=21106"><span>Back to the Codrops Article</span></a>
				</div>
			</header>
			<div class="overlay"></div>
		</div><!-- /container -->
		<script src="{{asset('js/classie.js')}}"></script>
		<script>
			(function() {
				var morphSearch = document.getElementById( 'morphsearch' ),
					input = morphSearch.querySelector( 'input.morphsearch-input' ),
					ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
					isOpen = isAnimating = false,
					// show/hide search area
					toggleSearch = function(evt) {
						// return if open and the input gets focused
						if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

						var offsets = morphsearch.getBoundingClientRect();
						if( isOpen ) {
							classie.remove( morphSearch, 'open' );

							// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();
						}
						else {
							classie.add( morphSearch, 'open' );
						}
						isOpen = !isOpen;
					};

				// events
				input.addEventListener( 'focus', toggleSearch );
				ctrlClose.addEventListener( 'click', toggleSearch );
				// esc key closes search overlay
				// keyboard navigation events
				document.addEventListener( 'keydown', function( ev ) {
					var keyCode = ev.keyCode || ev.which;
					if( keyCode === 27 && isOpen ) {
						toggleSearch(ev);
					}
				} );


				/***** for demo purposes only: don't allow to submit the form *****/
				morphSearch.querySelector( 'button[type="submit"]' ).addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			})();
		</script>
	</body>
</html>