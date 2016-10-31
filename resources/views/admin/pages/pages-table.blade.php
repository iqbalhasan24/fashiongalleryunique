@if(! $pages->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>  
            <th>Template</th>  
            <th>Slug</th>  
            <th>Created Date</th>            
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>        
        @foreach($pages as $page)
        <tr>
            <td style="width:25%"><a href="{!! URL::route('pages.edit', ['id' => $page->id]) !!}" target="_blank">{!! $page->name !!}</a></td>
            <td style="width:20%">{!! $page->template !!}</a></td>            
            <td style="width:25%">{!! $page->slug !!}</a></td>            
            <td style="width:15%">{{ $page->created_at }}</a></td>            
            <td style="width:15%">                
                <a href="{!! URL::route('pages.edit', ['id' => $page->id]) !!}" target="_blank"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="{!! URL::route('pages.delete',['id' => $page->id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="glyphicon glyphicon-trash"></i></a>
                <span class="clearfix"></span>            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="paginator">
    {!! $pages->appends($request->except(['page']) )->render() !!}
</div>
@else
<span class="text-warning"><h5>No results found.</h5></span>
@endif
<div class="paginator"></div>
