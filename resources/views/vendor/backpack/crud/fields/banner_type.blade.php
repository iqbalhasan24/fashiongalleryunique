<div class="form-group">
   <label> Select Banner Type </label> 
 <select name="banner_type"
    	class="form-control"
        id="banner_type"

    	@foreach ($field as $attribute => $value)
            @if (!is_array($value))
    		{{ $attribute }}="{{ $value }}"
            @endif
    	@endforeach
    	>
    	@if (count($field['options']))
    		@foreach ($field['options'] as $key => $value)
    			<option value="{{ $key }}"
					@if (isset($field['value']) && $key==$field['value'])
						 selected
					@endif
    			>{{ $value }}</option>
    		@endforeach
    	@endif
	</select>
</div>