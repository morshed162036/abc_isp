@extends('admin.layout.layout')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('support-team.index') }}" class="btn btn-primary"> Support Team List</a>
                <br><br>
                <h4 class="card-title">Create Team</h4>
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
                    <form action="{{ route('support-team.store') }}" method="POST"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Team Name</label>
                                    <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Team Name">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="basicInput">Team Group</label>
                                    <input type="text" class="form-control" id="team_group" name="team_group" placeholder="team group">
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