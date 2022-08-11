@extends('admin.layouts.index')

@section('title')
    Product Edit
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label class="bmd-label-floating">Image</label>
                    <div>
                        <input type="file"  name="image" accept="image/*">
                        <img src="{{$product->images->count() >0 ? asset('/upload/imgs/' . $product->images->first()->url) :
                        '/upload/imgs/default.jpg'}}"
                         alt="" style="width: 100px; height: 100px; border-radius:50%;">
                    </div>

                    @error('image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $product->name}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sale</label>
                    <input type="text" value="{{old('sale') ?  '0' : $product->sale}} " class="form-control" name="sale">

                    @error('sale')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>

                  <div class="form-group">
                    <label class="bmd-label-floating">Price</label>
                    <input type="text" class="form-control" name="price" value="{{old('price') ?? $product->price}}">
                    @error('price')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" value="{{old('description') ?? $product->description}}">{{$product->description}}</textarea>
                  </div>

                  <div class="row">


                      <div class="form-group col-6">
                        <label name="group" class="bmd-label-floating">Categoy</label>
                            <select name="category_ids" class="form-control h-100" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{(old('category') ?? $product->categories->contains('id', $category->id)) == $category->id ? 'selected' : ''}}>
                                        {{$category->name}}</option>
                                @endforeach
                            </select>

                            @error('category_ids')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                  </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
             </div>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
