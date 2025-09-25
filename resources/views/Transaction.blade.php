@extends('layouts.layout')

@section('content')
<style>
    :root {
        --primary: #0d6efd;
        --success: #198754;
        --warning: #ffc107;
        --danger: #dc3545;
        --light: #f8f9fa;
        --dark: #212529;
    }

    body {
        background-color: #f5f7fb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .content-area {
        margin-left:    0px;
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,.05);
        margin-bottom: 24px;
    }

    .card-header {
        background-color: white;
        border-bottom: 1px solid #eaeaea;
        padding: 15px 20px;
        border-radius: 10px 10px 0 0 !important;
    }

    .stats-card {
        border-left: 4px solid var(--primary);
        transition: transform 0.2s;
        padding: 15px 20px;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
    }
    .stats-card.success { border-left-color: var(--success); }
    .stats-card.warning { border-left-color: var(--warning); }
    .stats-card.danger { border-left-color: var(--danger); }

    .transaction-table {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .action-btn {
        padding: 5px 10px;
        border-radius: 5px;
        margin-right: 5px;
    }

    .filter-section {
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .content-area { margin-left: 0; }
    }
</style>

<div class="container-fluid p-0">
    <main class="content-area">

        <!-- Stats Overview -->
        <div class="row g-3 my-3">
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-normal">Total Transactions</h6>
                            <h3 class="mb-0">2,543</h3>
                            <p class="mb-0 mt-2 text-success"><small><i class="bi bi-arrow-up me-1"></i> 12.5% since last month</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="bi bi-credit-card text-primary fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card success mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-normal">Completed</h6>
                            <h3 class="mb-0">1,897</h3>
                            <p class="mb-0 mt-2 text-success"><small><i class="bi bi-check-circle me-1"></i> 74.6% success rate</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="bi bi-check-circle text-success fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card warning mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-normal">Pending</h6>
                            <h3 class="mb-0">327</h3>
                            <p class="mb-0 mt-2 text-warning"><small><i class="bi bi-clock me-1"></i> 12.9% pending</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="bi bi-clock text-warning fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card danger mb-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-muted fw-normal">Failed</h6>
                            <h3 class="mb-0">319</h3>
                            <p class="mb-0 mt-2 text-danger"><small><i class="bi bi-x-circle me-1"></i> 12.5% failure rate</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="bi bi-x-circle text-danger fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="card filter-section">
            <div class="card-body">
                <h5 class="card-title mb-3">Filter Transactions</h5>
                <form class="row g-3">
                    <div class="col-md-3">
                        <select class="form-select" id="statusFilter">
                            <option value="">All Statuses</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Failed</option>
                            <option value="refunded">Refunded</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="dateFilter">
                            <option value="">All Dates</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                            <option value="quarter">This Quarter</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="eventFilter">
                            <option value="">All Events</option>
                            <option value="concert">Rock Concert</option>
                            <option value="conference">Tech Conference</option>
                            <option value="festival">Food Festival</option>
                            <option value="expo">Business Expo</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Transaction ID or Customer...">
                            <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <div class="col-12 text-end mt-2">
                        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="card transaction-table">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Recent Transactions</h5>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-sliders me-1"></i> Options
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Export CSV</a></li>
                        <li><a class="dropdown-item" href="#">Export Excel</a></li>
                        <li><a class="dropdown-item" href="#">Print</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="transactionsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Transaction ID</th>
                                <th>Event</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Row -->
                            <tr>
                                <td><code>TXN-7890</code></td>
                                <td>Rock Concert</td>
                                <td>user@email.com</td>
                                <td>12/10/2023</td>
                                <td>€45.00</td>
                                <td><span class="badge bg-success status-badge">Completed</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary action-btn"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                            <!-- Autres rows -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Transaction pagination" class="mt-3">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <footer class="pt-3 mt-4 text-muted border-top text-center">
            © 2023 EventTick • Admin Dashboard
        </footer>
    </main>
</div>

<script>
    $(document).ready(function() {
        $('#transactionsTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5,10,25,50],
            "language": {
                "search": "Filter:",
                "lengthMenu": "Show MENU entries",
                "info": "Showing START to END of TOTAL transactions",
                "infoEmpty": "Showing 0 to 0 of 0 transactions",
                "paginate": {
                    "previous": "<i class='bi bi-chevron-left'></i>",
                    "next": "<i class='bi bi-chevron-right'></i>"
                }
            }
        });
    });
</script>
@endsection
