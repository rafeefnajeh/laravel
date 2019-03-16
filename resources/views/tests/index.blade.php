@extends('layouts.frontLayout.front_design')
@section('content')

<h2 class='mt-5 text-center'>Choose the language you want and select the level at which you want the exam</h2>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      HTML
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="#">Level 1</a>
      <a class="dropdown-item" href="#">Level 2</a>
      <a class="dropdown-item" href="#">Level 3</a>
      <a class="dropdown-item" href="#">Level 4</a>
    </div>
  </div>
</div>

<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      CSS
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    <a class="dropdown-item" href="#">Level 1</a>
      <a class="dropdown-item" href="#">Level 2</a>
      <a class="dropdown-item" href="#">Level 3</a>
      <a class="dropdown-item" href="#">Level 4</a>
    </div>
  </div>
</div>

<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Javascript
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
    <a class="dropdown-item" href="#">Level 1</a>
      <a class="dropdown-item" href="#">Level 2</a>
      <a class="dropdown-item" href="#">Level 3</a>
      <a class="dropdown-item" href="#">Level 4</a>
    </div>
  </div>
</div>
@endsection