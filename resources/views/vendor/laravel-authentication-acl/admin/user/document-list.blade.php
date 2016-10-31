@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: users document list
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
                    <h3 class="panel-title bariol-bold"><i class="fa fa-group"></i> User's Document</h3>
                </div>
                <div class="panel-body">
                    @if(! $documents->isEmpty() )
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>User</th>
                                    <th class="hidden-xs">Status</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $document)
                                <tr>
                                    <td>{!! $document->file_name !!}</td>
                                    <td>{!! $document->user()->first()->email !!}</td>
                                    <td>
                                        @if($document->status==0)
                                            <a href="{!! URL::route('users.doc_approve', ['id' => $document->id, 'status' =>'approved' ]) !!}" class="margin-left-5">Pending</a>
                                        @else
                                            <a href="{!! URL::route('users.doc_approve', ['id' => $document->id, 'status' =>'pending' ]) !!}" class="margin-left-5">Approved</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{!! URL::route('users.doc_delete', ['id' => $document->id ]) !!}" class="margin-left-5 delete"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="paginator">                    
                            {!! $documents->appends($request->except(['page']) )->render() !!}
                        </div>
                        @else
                        <span class="text-warning"><h5>No results found.</h5></span>
                        @endif
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
