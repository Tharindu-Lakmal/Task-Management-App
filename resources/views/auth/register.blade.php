@extends("layout.auth")

@section("style")

    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 380px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            border-radius: 10px;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-radius: 10px;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            box-shadow: none;
            border-color: initial;
        }

        .btn {
            border-radius: 10px;
        }
    </style>

@endsection

@section("content")

    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{route("register.post")}}">
            @csrf
            <h1 class="h3 mb-2 fs-3 fw-bolder text-center">OrganizedIt</h1>
            <h1 class="h3 mb-5 fs-6 fw-normal text-center">Ultimate place to manage tasks</h1>
            <h1 class="h3 mb-5 fs-1 fw-bolder text-center">Create account</h1>
        
            <div class="form-floating mb-2">
                <input name="fullname" type="text" class="form-control no-focus" id="floatingInput" placeholder="Kasun Tharuka">
                <label for="floatingInput">Full name</label>

                @error('fullname')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control no-focus" id="floatingInput" placeholder="Kasun@gmail.com">
                <label for="floatingInput">Email address</label>

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input name="password" type="password" class="form-control no-focus" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>

                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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

            
            <button class="btn btn-dark px-4 py-3 w-100" type="submit">Continue</button>
            
            <div class="d-flex flex-row justify-content-center mt-5" style="gap: 8px">
                <p class="text-body-secondary">Already have an account?</p>
                <a href="{{route("login")}}">
                    Log in
                </a>
            </div>
        </form>
    </main>

@endsection