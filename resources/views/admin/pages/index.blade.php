@extends('admin.layouts.base-2cols')

@section('title')
    {!! $page->title !!}
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
            {{-- print messages --}}
            <?php $message = Session::get('message'); ?>
            @if( isset($message) )
                <div class="alert alert-success">{!! $message !!}</div>
            @endif
            {{-- print errors --}}
            @if($errors )
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{!! $error !!}</div>
                @endforeach
            @endif
             
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-bold"><i class="glyphicon glyphicon-th-list"></i> Pages</h3>
                </div>
                <div class="panel-body">
                    @include('admin.pages.pages-table')
               </div>
           </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
    <script>
        $(".delete").click(function(){
            return confirm("Are you sure to delete this item?");
        });
    </script>
@stop