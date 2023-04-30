@extends('admin.layout.layout')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('role.index') }}" class="btn btn-primary"> Role List</a>
                <br><br>
                <h4 class="card-title">Create Role</h4>
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
                    <form action="{{ route('role.store') }}" method="POST"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Role</label>
                                    <input type="text" class="form-control" id="role" name="name" placeholder="Role Name">
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection