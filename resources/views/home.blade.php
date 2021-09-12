@extends('layouts.base')

@section('content')
    <div class="container mt-4">
        <div class="card border-0 mb-4 shadow-sm">
            <div class="card-header  border-0 d-flex ">
                <div class="" ><img src="{{ asset('photos/'.Auth::user()->image)}}"  style="height:50px !important; width:50px !important; border-radius:50% "></div>
                
                <div class="mt-3 ms-2"><h6>{{Auth::user()->name}}</h6></div>
            </div>
            <div class="card-body">
             <button data-bs-target="#addPost" data-bs-toggle="modal" class="btn btn-white w-100" style="border-radius: 10px">
                    <div class="w-100 border pt-3 pb-1" style="border-radius: 25px;"><p class="small">Write something</p></div>
                </button>
            </div>
        </div>
    
      

        {{-- loop --}}
        @foreach ($posts as $p )
        <div class="card border-0 mb-4 shadow-sm">
            <div class="card-header bg-transparent border-0 d-flex ">
                <div class=" " ><img src="{{ asset('photos/'.Auth::user()->image)}}"  style="height:50px !important; width:50px !important; border-radius:50% "></div>
                <div class="mt-3 ms-2"><h6>{{$p->user->name}}</h6></div>
            </div>
            <div class="card-body">
            <h6>{{$p->title}}</h6>
            <img src="{{ asset('photos/'.$p->image)}}" width="70p" >
                <p class="small text-muted ">{{$p->desc}}</p>
                <a href="{{route('edit',['id'=>$p->id])}}" class="btn btn-success">Edit</a>   
            </div>
            <div class="card-footer d-flex">
                <span class="ms-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg></span>
                <span class="ms-auto"><i class="bi bi-chat-left"></i></span>
                <span class="ms-auto"><i class="bi bi-share"></i></span>
            </div>
        </div>

        @endforeach
        
    </div>

    <div class="modal fade" id="addPost">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('post')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label for="">description</label>
                            <textarea name="desc" class="form-control " id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark float-end">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection