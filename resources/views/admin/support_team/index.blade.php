@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Support Team Management</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Support Team List</h4>
                  {{-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> --}}
                  <div class="flex justify-end p-2">
                       <a href="{{ route('support-team.create') }}" class="btn btn-primary"> + Create Team</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Team Name
                          </th>
                          <th>
                            Team Group
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($support as $item)
                        
                        <tr>
                          <td>
                            {{ $item['support_team_id'] }}
                          </td>
                          <td>
                            {{ $item['team_name'] }}
                          </td>
                          <td>
                            {{ $item['team_group'] }}
                          </td>
                          <td style="display:flex">
                                <a href="{{ route('support-team.edit', $item['support_team_id']) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Edit</a>
                                {{-- <a href="{{ url('admin/admins/delete-Employee/'.$item['id']) }}" target="_blank" rel="noopener noreferrer"><i class="bx bx-x"></i></a> --}}
                                <form action="{{ route('support-team.destroy', $item['support_team_id']) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dengar">Delete</button>
                                </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection