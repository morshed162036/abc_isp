@extends('admin.layout.layout')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('permission.index') }}" class="btn btn-primary"> Permission List</a>
                <br><br>
                <h4 class="card-title">Edit Permission</h4>
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
                    <form action="{{ route('permission.update', $permission) }}" method="POST"> @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Permission</label>
                                    <input type="text" class="form-control" id="permission" name="name" value="{{ $permission->name }}" placeholder="Permission Name">
                                </fieldset>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection