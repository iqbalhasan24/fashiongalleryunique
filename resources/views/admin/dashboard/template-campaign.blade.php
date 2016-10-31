@extends('admin.layouts.base-2cols')

@section('title')
Admin area: dashboard
@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3><i class="fa fa-dashboard"></i> Campaign tools</h3>
        <hr/>
    </div>
    <div class="col-xs-12 fdl content">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
            @foreach($campaigns as $campaign)
            <li class="block-grid-item">
                <p class="lead"><strong>{!! $campaign->campaign_name !!}</strong></p>
                @if( count($campaign->content)>0)
                <ul>
                    @foreach($campaign->content as $content)
                    <li class="red"><a href="{!! URL::route('templates.new', ['id' => $content->id]) !!}" target="_blank">{!! $content->content_title !!}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@stop