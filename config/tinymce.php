<?php

return [

	'cdn' =>  Config('app.url').('/vendor/js/tinymce/tinymce.min.js'),

	'default' => [
		"selector" => ".tinymce",
		"language" => 'en',
		"theme" => "modern",
                
                "plugins" => "image,link,media,anchor,code",
		"skin" => "lightgray",
		
                "relative_urls" => false,
                "remove_script_host" => false,
                "valid_children" => "+body[style]",
                "automatic_uploads" => true,
                "image_advtab" => true,
                "file_browser_callback" => "mce_filebrowser",
            //"file_browser_callback" => "elFinderBrowser"

	],

	// Custom
	
	/*'example' => [
		"selector" => "#example",
		"language" => 'pt_BR',
		"theme" => "modern",
		"skin" => "lightgray",
		"plugins" => [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
		],
		"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	],*/

];