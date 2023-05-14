<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        Register
    @endsection
    @include('dashboard.layouts.head-content')
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent">
                    <div class="container-fluid ps-2 pe-0">
                        <span class="text-light fs-5 fw-normal"><span
                                class="fw-bold text-success">MALANG</span>CAMP</span>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0 bg-gradient-dark"
        style="background: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80'); background-size:cover;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <section>
            <div class="page-header min-vh-100">
                <div class="container my-auto">
                    <div class="row mt-2">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div
                                    class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center text-light">
                                    <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                            Sign Up
                                        </h4>
                                        <p class="mb-0">
                                            Fill the fields to register
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form role="form" class="text-start">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" />
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn bg-gradient-success w-100 my-4 mb-2">
                                                Sign up
                                            </button>
                                        </div>
                                        <p class="mt-4 text-sm text-center">
                                            Already have account?
                                            <a href="/login" class="text-success text-gradient font-weight-bold">Sign
                                                in</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('dashboard.layouts.foot-content')
</body>

</html>
