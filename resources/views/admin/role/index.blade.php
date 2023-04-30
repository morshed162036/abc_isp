@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Role Management</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{ $title }} Table</h4>
                  {{-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> --}}
                  <div class="flex justify-end p-2">
                       <a href="{{ route('role.create') }}" class="btn btn-primary"> + Create Role</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Role Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($roles as $item)
                        
                        <tr>
                          <td>
                            {{ $item['id'] }}
                          </td>
                          <td>
                            {{ $item['name'] }}
                          </td>
                          <td style="display:flex">
                                <a href="{{ route('role.edit', $item['id']) }}" target="_blank" rel="noopener noreferrer"><i class="bx bx-task"></i></a>
                                {{-- <a href="{{ url('admin/admins/delete-Employee/'.$item['id']) }}" target="_blank" rel="noopener noreferrer"><i class="bx bx-x"></i></a> --}}
                                <form action="{{ route('role.destroy', $item['id']) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                                @csrf
                                @method('DELETE')
                                <i class="bx bx-x"><button type="submit" style="display:transparent"></button></i>
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