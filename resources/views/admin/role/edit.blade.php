@extends('admin.layout.layout')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('role.index') }}" class="btn btn-primary"> Role List</a>
                <br><br>
                <h4 class="card-title">Edit Role</h4>
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
                    <form action="{{ route('role.update', $role->id) }}" method="POST"> @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Role</label>
                                    <input type="text" class="form-control" id="role" name="name" value="{{ $role->name }}" placeholder="Role Name">
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Role Permission</h4>
                <br><br>
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                    <form action="{{ route('role.permissions.revoke', [$role->id,$role_permission->id]) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-info">{{ $role_permission->name }} </button>
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
                    <form action="{{ route('role.permissions', $role->id) }}" method="POST"> @csrf 
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