<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .student-card {
            transition: transform 0.2s;
        }
        .student-card:hover {
            transform: translateY(-5px);
        }
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4 mb-3">
                    <i class="bi bi-mortarboard-fill me-3"></i>Students Database
                </h1>
                <p class="lead mb-0">Comprehensive list of all registered students</p>
            </div>
        </div>
    </div>

    <div class="container">
        @if(count($city) > 0)
            <!-- Statistics Card -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Total Students</h5>
                                    <h2 class="mb-0">{{ count($city) }}</h2>
                                </div>
                                <div class="fs-1">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Students Grid -->
            <div class="row">
                @foreach($city as $student)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card student-card shadow-sm h-100">
                        <div class="card-body">
                            <!-- Student Avatar -->
                            <div class="text-center mb-3">
                                <div class="avatar bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                            </div>

                            <!-- Student Info -->
                            <div class="text-center">
                                <h5 class="card-title text-primary mb-1">{{ $student->name }}</h5>
                                <p class="text-muted small mb-3">Student ID: #{{ $student->id }}</p>
                            </div>

                            <!-- Contact Info -->
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-envelope text-primary me-2"></i>
                                    <small class="text-muted">Email:</small>
                                </div>
                                <p class="mb-0">
                                    <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                        {{ $student->email }}
                                    </a>
                                </p>
                            </div>

                            <!-- Additional Info if available -->
                            @if(isset($student->age))
                            <div class="mb-2">
                                <span class="badge bg-info">
                                    <i class="bi bi-calendar me-1"></i>{{ $student->age }} years
                                </span>
                            </div>
                            @endif

                            @if(isset($student->city))
                            <div class="mb-2">
                                <span class="badge bg-secondary">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $student->city }}
                                </span>
                            </div>
                            @endif
                        </div>

                        <!-- Card Footer with Actions -->
                        <div class="card-footer bg-transparent text-center">
                            <small class="text-muted">
                                <i class="bi bi-person-check me-1"></i>Active Student
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Navigation Actions -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Students</h5>
                            <p class="card-text">Add new students or manage existing records</p>
                            <a href="{{ route('user.create') }}" class="btn btn-primary me-2">
                                <i class="bi bi-person-plus-fill me-1"></i>Add New Student
                            </a>
                            <a href="{{ route('user.list') }}" class="btn btn-outline-primary">
                                <i class="bi bi-list-ul me-1"></i>View All Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-mortarboard display-1 text-muted mb-4"></i>
                            <h3 class="text-muted">No Students Found</h3>
                            <p class="text-muted mb-4">There are currently no students in the database.</p>
                            <a href="{{ route('user.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus-fill me-2"></i>Add First Student
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
