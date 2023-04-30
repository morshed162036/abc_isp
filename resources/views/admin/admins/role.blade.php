@extends('admin.layout.layout')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.index') }}" class="btn btn-primary"> User List</a>
                <br><br>
                <div>{{ $user->name }}</div>
                <div>{{ $user->email }}</div>
                <br><br>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Roles</h4>
                <br><br>
                <div style="display:flex;">
                    @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                    <form action="{{ route('admin.role.revoke', [$user->id,$user_role]) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info" style="margin-right: 20px;">{{ $user_role->name }} </button>
                        </form>
                        <span> </span>
                    @endforeach 
                @endif
            </div>
                
            </div>
            <div class="card-content">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong>{{ Session::get('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success: </strong>{{ Session::get('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                    <form action="{{ route('admin.roles', $user->id) }}" method="POST"> @csrf 
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Assign</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Permission</h4>
                <br><br>
                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                    <form action="{{ route('admin.permissions.revoke', [$user->id,$user_permission->id]) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info">{{ $user_permission->name }} </button>
                        </form>
                        <span> </span>
                    @endforeach 
                @endif
            </div>
            <div class="card-content">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('errors'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong>{{ Session::get('errors') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if(Session::has('successs'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success: </strong>{{ Session::get('successs') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                    <form action="{{ route('admin.permissions', $user->id) }}" method="POST"> @csrf 
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="permission">Permission</label>
                                    <select name="permission" id="permission" class="form-control">
                                        @foreach ($permissions as $permission)
                                            <option value="{{$permission->name}}">{{$permission->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection