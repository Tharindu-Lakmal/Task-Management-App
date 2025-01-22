@extends('layout.default')

@section("content")

    <div class="inputform mx-auto" style="margin-top:160px; max-width: 500px">
        
        <div class="mb-5">
            <h1 class="fs-1 text-center">Add new tasks</h1>
        </div>

        {{-- display the success or error message for registration --}}
        @if (session()->has('success'))

            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        
        @endif

        @if (session()->has('error'))

            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
            
        @endif

        {{-- form to add tasks --}}
        <form class="p-0" method="POST" action="{{route("task.add.post")}}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control no-focus py-3" id="exampleFormControlInput1" placeholder="Assignment">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input name="deadline" type="datetime-local" class="form-control no-focus py-3" id="exampleFormControlInput1" placeholder="Assignment">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control no-focus" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button class="btn btn-dark rounded-pill px-4 py-3 mt-4 w-100" type="submit">Submit</button>
        </form>
    </div>

@endsection