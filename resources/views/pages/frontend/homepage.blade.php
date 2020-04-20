@extends('layouts.app')

@section('content')
<div class="col">
    @foreach ($data as $dataItems)
    <img src={{ asset('storage/'.$dataItems->image) }} width="900px" height="500px">
    <h1>{{ $dataItems->title }}</h1>
    <h3>{{ $dataItems->desc }}</h3>
    @endforeach
    
</div>
   

@endsection