@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_image">Name image</label>
                    <input type="text" class="form-control" name="name_image" id="name_image" placeholder="Name image" value=" ">
                    @if ($errors->has('name_image'))
                    <span class="text-danger">{{ $errors->first('name_image') }}</span>
                     @endif
                  </div>
                  <div class="form-group">
                    <label for="image">Choose an image</label>
                    <input type="file" class="form-control-file" name="image" id="image" value=" ">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                     @endif
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" name="submit" value="Save">
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection