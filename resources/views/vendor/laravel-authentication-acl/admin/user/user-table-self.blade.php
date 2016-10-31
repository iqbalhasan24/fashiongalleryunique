<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-bold"><i class="fa fa-user"></i> {!! $request->all() ? 'Search results:' : 'Users' !!}</h3>
    </div>
    <div class="panel-body">
        
      <div class="row">
          <div class="col-md-12">
              @if(! $users->isEmpty() )
              <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Email</th>
<!--                              <th class="hidden-xs">First name</th>
                              <th class="hidden-xs">Last name</th>-->
                              <th>Active</th>
                              <th class="hidden-xs">Last login</th>
                              <th>Operations</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          @if(! $user->protected)
                          <tr>
                              <td>{!! $user->email !!}</td>
<!--                              <td class="hidden-xs">{!! $user->first_name !!}</td>
                              <td class="hidden-xs">{!! $user->last_name !!}</td>-->
                              <td>{!! $user->activated ? '<i class="fa fa-circle green"></i>' : '<i class="fa fa-circle-o red"></i>' !!}</td>
                              <td class="hidden-xs">{!! $user->last_login ? $user->last_login : 'not logged yet.' !!}</td>
                              <td>                                 
                                      <a href="{!! URL::route('users.edit', ['id' => $user->id]) !!}"><i class="fa fa-pencil-square-o fa-2x"></i></a>                                  
                              </td>
                          </tr>
                          @endif
                      </tbody>
                      @endforeach
              </table>
              <div class="paginator">
                  {{-- $users->appends($request->except(['page']) )->render() --}}
              </div>
              @else
                  <span class="text-warning"><h5>No results found.</h5></span>
              @endif
          </div>
      </div>
    </div>
</div>
