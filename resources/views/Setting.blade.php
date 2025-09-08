<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRYVENT - Organizer Settings</title>
    <!-- Bootstrap 5 CSS -->
    <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6f42c1; /* IRYVENT purple */
            --secondary-color: #20c997;
        }
        
        .settings-card {
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            border: none;
        }
        
        .settings-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        
        .nav-pills .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .nav-pills .nav-link {
            color: #495057;
        }
        
        .profile-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
        }
        
        .toggle-checkbox:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Left Navigation -->
            <div class="col-md-3">
                <div class="card settings-card">
                    <div class="settings-header">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Settings</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-bs-toggle="pill">
                                    <i class="fas fa-user-circle me-2"></i> Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#notifications" data-bs-toggle="pill">
                                    <i class="fas fa-bell me-2"></i> Notifications
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#payment" data-bs-toggle="pill">
                                    <i class="fas fa-wallet me-2"></i> Payment Methods
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#security" data-bs-toggle="pill">
                                    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#api" data-bs-toggle="pill">
                                    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Right Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="card settings-card">
                            <div class="settings-header">
                                <h5 class="mb-0"><i class="fas fa-user-circle me-2"></i> Organizer Profile</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row mb-4 text-center">
                                        <div class="col-12">
                                            <img src="https://via.placeholder.com/120" class="profile-pic rounded-circle mb-3" alt="Profile">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fas fa-camera me-1"></i> Change Photo
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash me-1"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h6 class="section-title mb-3">Basic Information</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="orgName" class="form-label">Organization Name</label>
                                            <input type="text" class="form-control" id="orgName" value="IRYVENT Events" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contactEmail" class="form-label">Contact Email</label>
                                            <input type="email" class="form-control" id="contactEmail" value="contact@iryvent.cm" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" value="+237 6XX XXX XXX">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url" class="form-control" id="website" value="https://iryvent.cm">
                                        </div>
                                    </div>
                                    
                                    <h6 class="section-title mb-3 mt-4">Business Details</h6>
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Description/Bio</label>
                                        <textarea class="form-control" id="bio" rows="3">Professional event organizer based in Yaounde, Cameroon</textarea>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-select" id="country">
                                                <option selected>Cameroon</option>
                                                <option>Nigeria</option>
                                                <option>Ghana</option>
                                                <option>Senegal</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" id="city" value="Yaounde">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="timezone" class="form-label">Timezone</label>
                                            <select class="form-select" id="timezone">
                                                <option selected>West Africa Time (WAT)</option>
                                                <option>GMT +1</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="button" class="btn btn-light me-2">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications">
                        <div class="card settings-card">
                            <div class="settings-header">
                                <h5 class="mb-0"><i class="fas fa-bell me-2"></i> Notification Preferences</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="section-title mb-3">Email Notifications</h6>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="emailSales" checked>
                                        <label class="form-check-label" for="emailSales">New ticket sales</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="emailEvent" checked>
                                        <label class="form-check-label" for="emailEvent">Event reminders</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="emailUpdates">
                                        <label class="form-check-label" for="emailUpdates">Platform updates</label>
                                    </div>
                                    
                                    <h6 class="section-title mb-3 mt-4">E-mail Notifications</h6>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="smsSales" checked>
                                        <label class="form-check-label" for="smsSales">Instant sales alerts</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="smsPayout">
                                        <label class="form-check-label" for="smsPayout">Payout confirmations</label>
                                    </div>
                                    
                                    <h6 class="section-title mb-3 mt-4">Push Notifications</h6>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input toggle-checkbox" type="checkbox" id="pushAll" checked>
                                        <label class="form-check-label" for="pushAll">Enable push notifications</label>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary">Update Preferences</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Methods Tab -->
                    <div class="tab-pane fade" id="payment">
                        <div class="card settings-card">
                            <div class="settings-header">
                                <h5 class="mb-0"><i class="fas fa-wallet me-2"></i> Payment Methods</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="section-title mb-3">Payout Accounts</h6>
                                <p class="text-muted mb-4">Add bank accounts or mobile money wallets to receive your earnings</p>
                                
                                <div class="card mb-3 border-primary">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><i class="fas fa-mobile-alt me-2 text-primary"></i> MTN Mobile Money</h6>
                                                <p class="mb-0">6XX XXX XXX • Primary</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><i class="fas fa-university me-2"></i> Ecobank Cameroon</h6>
                                                <p class="mb-0">XXXX-XXXX-XXXX-1234</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-outline-secondary me-2">Edit</button>
                                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addPaymentMethod">
                                    <i class="fas fa-plus me-1"></i> Add Payment Method
                                </button>
                                
                                <h6 class="section-title mb-3 mt-4">Payout Preferences</h6>
                                <div class="mb-3">
                                    <label class="form-label">Default Payout Method</label>
                                    <select class="form-select">
                                        <option selected>MTN Mobile Money (6XX XXX XXX)</option>
                                        <option>Ecobank Cameroon (XXXX-XXXX-XXXX-1234)</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoPayout" checked>
                                    <label class="form-check-label" for="autoPayout">Enable automatic payouts after each event</label>
                                </div>
                                
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Payment Method Modal -->
    <div class="modal fade" id="addPaymentMethod" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment Method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs mb-4" id="paymentTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="mobile-tab" data-bs-toggle="tab" data-bs-target="#mobile" type="button">
                                <i class="fas fa-mobile-alt me-1"></i> Mobile Money
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bank-tab" data-bs-toggle="tab" data-bs-target="#bank" type="button">
                                <i class="fas fa-university me-1"></i> Bank Transfer
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="paymentTabsContent">
                        <div class="tab-pane fade show active" id="mobile" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Mobile Money Provider</label>
                                    <select class="form-select">
                                        <option selected>MTN Mobile Money</option>
                                        <option>Orange Money</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="6XX XXX XXX">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" placeholder="As registered with provider">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="bank" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Bank Name</label>
                                    <select class="form-select">
                                        <option selected>Select Bank</option>
                                        <option>Ecobank Cameroon</option>
                                        <option>Afriland First Bank</option>
                                        <option>SCB Cameroon</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">IBAN/SWIFT (Optional)</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Payment Method</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>