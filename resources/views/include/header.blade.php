<header>
    <!-- Fixed navbar -->
   
    <div class="fixed-top bg-body-tertiary border-bottom">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-between justify-content-md-between py-4">
                <div class="col-md-3 mb-md-0">
                    <a class="nav-link text-dark" href="{{route("home")}}">
                        <h4 class="fw-bolder">OrganizedIt</h4>
                    </a>
                </div>
            
                <div style="width: 200px; display: flex; flex-direction: row; align-items: center;; justify-content: space-between;">
                    <a class="btn fw-medium text-dark d-inline p-0" href="{{route("task.add")}}">Add task</a>                       
                    
                    <a class="btn btn-dark rounded-pill px-4 py-3" href="{{route("logout")}}">
                        Logout
                    </a>
                </div>
            </header>
        </div>
    </div>
</header>