@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <example-component user-id="{{auth()->id()}}"></example-component>
    </div>
</div>
@endsection
