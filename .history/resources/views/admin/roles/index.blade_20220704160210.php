@extends('admin.layouts.index')

@section('title', 'Roles')



@section('content')
<div class="card">
    <h1>Role List</h1>
   
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>ID</th>
          <th>Name</th>
          <th>Salary</th>
          <th>Country</th>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Dakota Rice</td>
            <td>$36,738</td>
            <td>Niger</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Minerva Hooper</td>
            <td>$23,789</td>
            <td>Curaçao</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sage Rodriguez</td>
            <td>$56,142</td>
            <td>Netherlands</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Philip Chaney</td>
            <td>$38,735</td>
            <td>Korea, South</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
