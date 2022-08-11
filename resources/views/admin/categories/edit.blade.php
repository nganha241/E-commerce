@extends('admin.layouts.index')

@section('title')
    Category Edit
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('categories.update', $category->id)}}" method="post" >
                @csrf
                @method('put')
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $category->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>

              </div>
            @if ($category->childrens->count() < 1)
                <div class="form-group col-md-8">
                    <label name="group" class="bmd-label-floating">Parent Categories</label>
                        <select name="parent_id" class="form-control h-100" >
                            <option value="">Select Parent Category</option>
                            @foreach ($parentCategories as $item)
                                <option value="{{$item->id}}"
                                    {{(old('parent_id') ?? $category->parent_id) == $item->id ? 'selected' : ''}}>
                                    {{$item->name}}</option>
                            @endforeach
                        </select>
                </div>
            @endif


              <div class="col-md-2">
                <button type="submit" class="btn btn-primary pull-right">Edit</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
