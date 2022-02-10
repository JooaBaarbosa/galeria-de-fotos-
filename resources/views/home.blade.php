@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="row">
                @foreach ($imagesAll as $imagem)                
                    <div class="col-4">
                        <img src="{{asset('/uploads/' . $imagem->image)}}" class="img-thumbnail d-block" alt="...">
                        @method('delete')
                        <a name="delete" id="delelte" class="btn btn-danger" href="{{route('delete_image', $imagem->id)}}" role="button">delete</a>
                    </div>
                @endforeach
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
