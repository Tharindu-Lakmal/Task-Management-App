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

        <form method="POST" action="{{route("login.post")}}">
            @csrf
            <h1 class="h3 mb-2 fs-3 fw-bolder text-center">OrganizedIt</h1>
            <h1 class="h3 mb-5 fs-6 fw-normal text-center">Ultimate place to manage tasks</h1>
            <h1 class="h3 mb-5 fs-1 fw-bolder text-center">Sign in</h1>
        
            <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control no-focus px-4 py-3 w-100" id="floatingInput" placeholder="Kasun@gmail.com">
                <label for="floatingInput">Email address</label>

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input name="password" type="password" class="form-control no-focus px-4 py-3 w-100" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>

                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        

            <button class="btn btn-dark px-4 py-3 w-100" type="submit">Sign in</button>
            
            <div class="d-flex flex-row justify-content-center mt-5" style="gap: 8px">
                <p class="text-body-secondary">Don't have an account?</p>
                <a href="{{route("register")}}">
                    Register
                </a>
            </div>
        </form>
    </main>

@endsection