@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="row">
            <form action="{{route('update',['id'=>$p->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Title</label>
                <input type="text" name="title" value="{{$p->title}}" class="form-control">
                </div>
               
                <div class="mb-3">
                    <label for="">Description</label>
                <input type="text" name="desc" value="{{$p->desc}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                <input type="file" name="image" class="form-control">
                <img src="{{ asset('photos/'.$p->image)}}"  style="height:50px !important; width:50px !important; border-radius:50% ">
                </div>
                <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection