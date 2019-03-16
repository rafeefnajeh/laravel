@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables Organization</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
 
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/admin/organization/create" style="float:right;margin-top:3px; margin-right:10px;">New Organization</a>
            <h5> Organization Tables</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table">
              <thead>
                <tr>
                <th>ID  </th>
                  <th>Name Organization </th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>User Name</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>ID Number</th>
                  <th>Address</th>
                  <th>Birth date</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($organizations as $organization)
                <tr class="gradeX ">
                <td>{{$organization->id}}</td>
                  <td>{{$organization->name_org}}</td>
                  <td>{{$organization->full_name}}</td>
                  <td>{{$organization->gender}}</td>
                  <td>{{$organization->username}}</td>
                  <td>{{$organization->phone}}</td>
                  <td>{{$organization->email}}</td>
                  <td>{{$organization->IDN}}</td>
                  <td>{{$organization->address}}</td>
                  <td>{{$organization->birth_date}}</td>
                  <td class="center">
                  <form action="{{route('organization.destroy',$organization->id)}}" method="post">
                    <a class="btn btn-primary" href="{{route('organization.edit',$organization->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
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
                 
                  
        
                  
              