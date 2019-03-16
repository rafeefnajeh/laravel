@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables Locations</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/admin/location/create" style="float:right;margin-top:3px; margin-right:10px;">New Location</a>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Location ID</th>
                  <th> Name Location</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($locations as $location)
                <tr class="gradeX">
                  <td>{{$location->id}}</td>
                  <td>{{$location->name_location}}</td>
                  
                  <td class="center">
                  <form action="{{route('location.destroy',$location->id)}}" method="post">
                    <a class="btn btn-primary" href="{{route('location.edit',$location->id)}}">Edit</a>
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