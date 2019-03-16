@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1> Results</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5> Results</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table table-bordered ">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Date</th>
                  <th> Results</th>
                
                </tr>
              </thead>
              <tbody >
              @if (count($results) > 0)
                        @foreach ($results as $result)
                      <tr>
                                <td>{{ $result->user->username }} </td>
                                <td>{{ $result->created_at  }}</td>
                                <td>{{ $result->result }}/10</td>
                               
                            </tr>
                        @endforeach
                 
                    @endif
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>     


@endsection