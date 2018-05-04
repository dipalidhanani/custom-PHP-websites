
<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />

<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->

<!-- JS files are loaded at the bottom of the page -->
</head>
<body>
	
	
		<div id='basic-modal'>
			<h3>Basic Modal Dialog</h3>
			<p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
			<input type='button' name='basic' value='Demo' class='basic'/> or <a href='#' class='basic'>Demo</a>
		</div>
		
		<!-- modal content -->
		<div id="basic-modal-content">
			<h3>Basic Modal Dialog</h3>
			<p>For this demo, SimpleModal is using this "hidden" data for its content. You can also populate the modal dialog with an AJAX response, standard HTML or DOM element(s).</p>
			<p>Examples:</p>
			<p><code>$('#basicModalContent').modal(); // jQuery object - this demo</code></p>
			<p><code>$.modal(document.getElementById('basicModalContent')); // DOM</code></p>
			<p><code>$.modal('&lt;p&gt;&lt;b&gt;HTML&lt;/b&gt; elements&lt;/p&gt;'); // HTML</code></p>
			<p><code>$('&lt;div&gt;&lt;/div&gt;').load('page.html').modal(); // AJAX</code></p>
		
			<p><a href='http://www.ericmmartin.com/projects/simplemodal/'>More details...</a></p>
		</div>

		<!-- preload the images -->
		
	
	
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
