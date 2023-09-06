@extends('layouts.app')

@section('content')


@if($errors->any())

<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<a href="{{ route('note.index') }}" >Back</a>
<br><br>

<form method="POST" action="{{ route('note.store') }}">

    @csrf
    <label>Title: </label>
    <input type="text" name="title"/>

    @error('title')
        <p style="color:brown">{{ $message }}</p>
    @enderror

    <br><br>

    <label>Description: </label>
    <input type="text" name="description"/>

    @error('description')
        <p style="color:brown">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="submit"  value="Create"/>
</form>
@endsection
