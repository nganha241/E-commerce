@extends('admin.layouts.index')

@section('title')
    Product Create
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="">
                    <label class="bmd-label-floating">Image</label>
                    <div>
                        <input type="file"  name="image[]" accept="image/*" multiple>
                    </div>

                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sale</label>
                    <input type="text" value="{{old('sale') ??  '0'}} " class="form-control" name="sale">

                    @error('sale')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>

                  <div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    @error('price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" >{{old('description')}}</textarea>
                  </div>

                  <div class="row">
                  

                      <div class="form-group col-6">
                        <label name="group" class="bmd-label-floating">Categoy</label>
                            <select name="category_ids" class="form-control h-100" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category_ids') == $category->id ? 'selected' : ''}}>
                                        {{$category->name}}</option>
                                @endforeach
                            </select>

                            @error('category_ids')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                  </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary pull-right">Add</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
