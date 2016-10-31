<script type="text/javascript" src="{{ config('tinymce.cdn') }}"></script>
<script type="text/javascript">

	@if(isset($els))
		@foreach($els as $el)
			tinymce.init(
				{!! json_encode(config('tinymce.'.$el)) !!}
			);
		@endforeach
	@else
		tinymce.init(
			{!! json_encode(config('tinymce.default')) !!}
		);
	@endif
	/*function elFinderBrowser(field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: '<?php // route('elfinder.tinymce4') ?>', // use an absolute path!
        title: 'elFinder 2.0',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        setUrl: function (url) {
            win.document.getElementById(field_name).value = url;
        }
    });
    return false;
}*/
 </script>
 <script type="text/javascript">
 function elFinderBrowser(field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: '{{ route('elfinder.tinymce4') }}', // use an absolute path!
        title: 'elFinder 2.0',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        setUrl: function (url) {
            win.document.getElementById(field_name).value = url;
        }
    });
    return false;
}
</script>
