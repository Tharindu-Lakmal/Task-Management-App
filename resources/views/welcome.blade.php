@extends("layout.default")

@section('content')

    <main class="flex" style="margin-block-start:180px; margin-block-end:60px;">
        <div style="padding: 50px; border-radius: 20px; background-color: #caf0f8">

            <div class="fs-4">Welcome back {{auth()->user()->name}}!</div>

            <h1 class="mt-4">Stay Organized, Stay Productive</h1>
            <p class="lead">Effortlessly manage tasks, collaborate with your team, and boost productivity with our intuitive task management platform.</p>
            
        </div>
    </main>

    <section>

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

        {{-- print JSON --}}
        {{-- {{$tasks}} --}}

        <div>

            <div class="d-flex flex-column g-4">
                <div class="search-bar mw-100 d-flex justify-content-end">
                    <div class="search" style="width: 500px">
                        <form class="d-flex" role="search">
                            <input class="form-control no-focus me-2 rounded-pill px-4 py-3" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark rounded-pill px-4 py-3" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                
                <h2 class="inline mt-4">Tasks to complete</h2>
            </div>

            <hr>

            @foreach ( $tasks as $task )
                <div class="bg-body-tertiary p-3 mb-3 rounded">
                    <h3>{{$task->title}}</h3>
                    <p>{{$task->deadline}}</p>
                    <p class="">{{$task->description}}</p>
                    
                    <div class="card-btn flex flex-row gap-1 mt-5">
                        <a class="btn btn-dark rounded-pill px-4 py-3" 
                            href="{{route("task.status.update", $task->id)}}">
                            Complete
                        </a>
                        <a class="btn border border-secondary-subtle rounded-pill px-4 py-3" 
                            href="{{route("task.delete", $task->id)}}">
                            Delete
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- default pagination option --}}
            {{$tasks->links()}}
            
        </div>
    </section>

@endsection