@extends('layouts.backend')

@section('siteTitle')
    Website Example : Frontpage
@endsection

@section('adminTitle')
    Frontpage
@endsection

@section('content')
    {{-- <div class="col">
        <form action="{{ route('frontpage.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" name="desc" id="desc" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div> --}}

    {{-- Update --}}
    <div class="col">
        @foreach ($data as $dataItems)
            
        @endforeach
        <form action="{{ route('frontpage.update', $dataItems->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if(isset($dataItems))
            <div class="form-group">
                <img src="{{ asset('storage/'.$dataItems->image) }}" width="600px" height="400px">

            </div>
    
            @endif
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $dataItems->title }}">
            </div>

            <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" name="desc" id="desc" class="form-control" value="{{ $dataItems->desc }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>



@endsection