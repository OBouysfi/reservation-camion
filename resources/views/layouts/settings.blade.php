@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <!-- End Navbar -->
    
    <div class="container-fluid py-4">
        <div class="row">
          
          
                <!-- Profile Settings Card -->
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class=" bg-primary text-white text-sm p-1 px-2 !rounded-lg mb-0">Save Changes</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="form-control-label">First Name</label>
                                        <input class="form-control" type="text" id="firstName" value="John">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName" class="form-control-label">Last Name</label>
                                        <input class="form-control" type="text" id="lastName" value="Doe">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" id="email" value="john@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-control-label">Phone Number</label>
                                        <input class="form-control" type="tel" id="phone" value="+1 (555) 123-4567">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" id="address" value="123 Main St, City, State">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="form-control-label">City</label>
                                        <input class="form-control" type="text" id="city" value="New York">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state" class="form-control-label">State</label>
                                        <input class="form-control" type="text" id="state" value="NY">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="zipcode" class="form-control-label">Zip Code</label>
                                        <input class="form-control" type="text" id="zipcode" value="10001">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
           
                
                <!-- Reservation Preferences Card -->
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Reservation Preferences</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-sm bg-gradient-primary mb-0">Save Preferences</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preferredTruckType" class="form-control-label">Preferred Truck Type</label>
                                        <select class="form-control" id="preferredTruckType">
                                            <option value="pickup">Pickup Truck</option>
                                            <option value="box" selected>Box Truck</option>
                                            <option value="moving">Moving Truck</option>
                                            <option value="flatbed">Flatbed Truck</option>
                                            <option value="refrigerated">Refrigerated Truck</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preferredDuration" class="form-control-label">Default Rental Duration (hours)</label>
                                        <input class="form-control" type="number" id="preferredDuration" value="4">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preferredLocation" class="form-control-label">Preferred Pickup Location</label>
                                        <select class="form-control" id="preferredLocation">
                                            <option value="downtown">Downtown Hub</option>
                                            <option value="north" selected>North Side Station</option>
                                            <option value="east">East End Depot</option>
                                            <option value="south">South Branch</option>
                                            <option value="west">West Side Location</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preferredPayment" class="form-control-label">Default Payment Method</label>
                                        <select class="form-control" id="preferredPayment">
                                            <option value="card1" selected>Visa ending in 4242</option>
                                            <option value="card2">Mastercard ending in 5555</option>
                                            <option value="bank">Direct Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="insuranceDefault" checked>
                                            <label class="form-check-label" for="insuranceDefault">Add insurance by default</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="emailConfirmation" checked>
                                            <label class="form-check-label" for="emailConfirmation">Send email confirmation</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="smsReminders">
                                            <label class="form-check-label" for="smsReminders">Send SMS reminders</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
      
    </div>
</main>
@endsection