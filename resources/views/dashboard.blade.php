@extends("layouts.admin")
@section("title","Dashboard")

@section('content')

<section id="dashboard-analytics">
    <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-primary p-50 mb-1">
                        <div class="avatar-content">
                            <img src="{{ asset('app-assets/images/icons/brands/user.png') }}" class="invert" style="width: 20px !important" alt="icon">
                        </div>
                    </div>
                    <h2 class="fw-bolder">0</h2>
                    <p class="card-text">Clients</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-primary p-50 mb-1">
                        <div class="avatar-content">
                            <img src="{{ asset('app-assets/images/icons/brands/order.png') }}" class="invert" style="width: 20px !important" alt="icon">
                        </div>
                    </div>
                    <h2 class="fw-bolder">0</h2>
                    <p class="card-text">Order</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-primary p-50 mb-1">
                        <div class="avatar-content">

                            <img src="{{ asset('app-assets/images/icons/brands/task.png') }}" class="invert" style="width: 20px !important" alt="icon">
                        </div>
                    </div>
                    <h2 class="fw-bolder">0</h2>
                    <p class="card-text">Task</p>
                </div>
            </div>
        </div>

        <!-- Greetings Card ends -->

    </div>

</section>
@endsection