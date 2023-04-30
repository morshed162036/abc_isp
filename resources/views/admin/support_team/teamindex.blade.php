@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Team Member Management</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Team Member List</h4>
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
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Job Description
                          </th>
                          <th>
                            Support Team
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($team as $item)
                        
                        <tr>
                          <td>
                            {{ $item['team_member_id'] }}
                          </td>
                          <td>
                            {{ $item['team_member_name'] }}
                          </td>
                          <td>
                            {{ $item['team_member_email'] }}
                          </td>
                          <td>
                            {{ $item['team_member_phone'] }}
                          </td>
                          <td>
                            {{ $item['team_member_job_description'] }}
                          </td>
                          <td>
                            {{ $item['suppotrteam']['team_name'] }}
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