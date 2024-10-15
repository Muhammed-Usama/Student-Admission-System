<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/profile/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css"
        integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/profile/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to align items to the right -->
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a href="#" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="text-center border-end">
                                    <img src="{{ Storage::url($student->student_photo) }}"
                                        class="img-fluid avatar-xxl rounded-circle" alt>
                                    <h4 class="text-danger font-size-20 mt-3 mb-2">{{ $student->name }}</h4>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="ms-3">
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="text-muted mb-2 fw-medium">
                                                    <i class="mdi mdi-email-outline me-2"></i>
                                                    <a href="#">{{ $student->email }}</a>
                                                </p>
                                                <p class="text-muted fw-medium mb-0">
                                                    <i
                                                        class="mdi mdi-phone-in-talk-outline me-2"></i>{{ $student->phone }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied"
                                        role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4 active" data-bs-toggle="tab"
                                                href="#Personal Iformation" role="tab" aria-selected="false"
                                                tabindex="-1" onclick="showTab('main1')">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">Personal Infromation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4" data-bs-toggle="tab" href="#Education Iformation"
                                                role="tab" aria-selected="false" tabindex="-1"
                                                onclick="showTab('main2')">
                                                <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                                <span class="d-none d-sm-block">Education Infromation</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link px-4" data-bs-toggle="tab" href="#Desires" role="tab"
                                                aria-selected="false" tabindex="-1" onclick="showTab('main3')">
                                                <span class="d-block d-sm-none"><i
                                                        class="mdi mdi-account-group-outline"></i></span>
                                                <span class="d-none d-sm-block">Desires</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="main1">
                    <div class="tab-content p-4">
                        <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                            <div class="d-flex align-items-center">
                                <div class="flex-1">
                                    <h4 class="card-title mb-4">Personal Infromation</h4>
                                </div>
                            </div>
                            <div class="row" id="all-projects">
                                <div class="col-md-12" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Email</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Name</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Gender</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->gander }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Date of Birth</h5>
                                                <p class="text-muted mb-0 team-description">
                                                    {{ $student->dateofbirth }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">National ID</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->nationalid }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mb-3"></div>
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Address</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->address }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mb-3">
                                                <div class="flex-grow-1 align-items-start"></div>
                                            </div>
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Phone</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" id="main2" style="display: none;">
                    <div class="tab-content p-4">
                        <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                            <div class="d-flex align-items-center">
                                <div class="flex-1">
                                    <h4 class="card-title mb-4">Education Infromation</h4>
                                </div>
                            </div>
                            <div class="row" id="all-projects">
                                <div class="col-md-12" id="project-items-1">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Seat Number</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->seatnum }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Grade</h5>
                                                <p class="text-muted mb-0 team-description">{{ $student->grade }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="project-items-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex mb-3"></div>
                                            <div class="mb-4">
                                                <h5 class="mb-1 font-size-17 team-title">Division</h5>
                                                <p class="text-muted mb-0 team-description">
                                                    {{ $student->programrequirement->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main3" style="display: none;">
                    <div class="card">
                        <div class="tab-content p-4">
                            <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <h4 class="card-title mb-4">Selected desires</h4>
                                    </div>
                                </div>

                                <div class="row" id="all-projects">
                                    @php $i = 1; @endphp
                                    @foreach ($student->faculity as $faculty)
                                        <div class="col-md-12" id="project-items-1">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <h5 class="mb-1 font-size-17 team-title">Desire
                                                            {{ $i }}</h5>
                                                        <p class="text-muted mb-0 team-description">
                                                            {{ $faculty->name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php $i++ @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="tab-content p-4">
                            <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <h4 class="card-title mb-4">Final Desire</h4>
                                    </div>
                                </div>
                                <div class="row" id="all-projects">
                                    <div class="col-md-12" id="project-items-1">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-4">
                                                    <h5 class="mb-1 font-size-17 team-title">Desire</h5>
                                                    <p class="text-muted mb-0 team-description">
                                                        {{ $student->final->name ?? 'IN Waiting' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
