@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables Courses</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/questions/create" style="float:right;margin-top:3px; margin-right:10px;">Add new</a>
            <h5>Table Question</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table table-bordered">
              <thead>
                <tr>
                  <th> #</th>
                  <th>Courses </th>
                  <th>Question</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody >
              @if (count($questions) > 0)
                        @foreach ($questions as $question)
                            <tr data-entry-id="{{ $question->id }}">
                            <td>{{  $question->id  }}</td>
                                <td>{{ $question->courses->courses_name  }}</td>
                                <td>{!! $question->question_text !!}</td>
                                <td>
                                 
                                    <form action="{{route('questions.destroy',$question->id)}}" method="post">
                                          <a class="btn btn-primary" href="{{route('questions.edit',$question->id)}}">Edit</a>
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>

                                </td>
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