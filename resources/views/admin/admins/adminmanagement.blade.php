@extends("admin.layout.layout")

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Users Details</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users Table</h4>
                  {{-- <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p> --}}
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            User Type
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Job Description
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($user as $item)
                        
                        <tr>
                          {{-- <td class="py-1">
                            <img src="{{ asset('admin/images/profilepic/'.$item['image']) }}" alt="image"/>
                          </td> --}}
                          <td>
                            {{ $item['id'] }}
                          </td>
                          <td>
                            {{ $item['name'] }}
                          </td>
                          <td>
                            {{ $item['type'] }}
                          </td>
                          <td>
                            0{{ $item['mobile'] }}
                          </td>
                          <td>
                            {{ $item['email'] }}
                          </td>
                          <td>
                            {{ $item['Role'] }}
                          </td>
                          <td>
                            <div >
                              <a href="{{ route('admin.show', $item->id) }}"><button class="btn btn-info">Role</button></a>
                              <form action="{{ route('admin.destroy', $item->id) }}" method="post" onsubmit="return confirm('Are You Sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </div>
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