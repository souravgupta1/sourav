@php
    $title ="Company | Profile";
    $mainHeading = "Create Company Profile";

@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <x-input type="text" name="fname" label="First Name" />
                                                <x-input type="text" name="lname" label="Last Name" />
                                                <x-input type="text" name="email_id" label="Email Id" />
                                                <x-input type="text" name="cname" label="Company Name" />
                                                <x-input type="file" name="fname" label="Company Logo"/>
                                                <div class="col-md-3 col-12">
                                                <div class="form-group"><br>
                                                        <img src="{{ asset('assets/images/logo/logo.png') }}" class="form-control" style="width: 50%;height: 37px;">
                                                </div>
                                            </div>
                                             <div class="card-header"><h4 class="card-title">Address</h4></div>
                                                <x-input type="text" name="fname" label="City" />
                                                <x-input type="text" name="fname" label="State" />
                                                <x-input type="text" name="fname" label="Country" />
                                                <x-input type="number" name="fname" label="Pincode" />
                                                <x-input type="number" name="fname" label="Mobile number" />
                                                 <div class="card-header"><h4 class="card-title">Registration Info</h4></div>
                                                <x-input type="text" name="fname" label="Pan" />
                                                <x-input type="text" name="fname" label="Registration No" />
                                                <x-input type="text" name="fname" label="Registration Type" />
                                                <x-input type="file" name="fname" label="Company files Uploaded" />
                                                <x-input type="text" name="fname" label="Has 12A" />
                                                <x-input type="text" name="fname" label="12A/ 12AA Registration Number" />
                                                <x-input type="date" name="fname" label="12A issue date" />
                                                <x-input type="text" name="fname" label="Has 80G" />
                                                <x-input type="text" name="fname" label="80G Registration Number" />
                                                <x-input type="date" name="fname" label="80 G issue date" />

                                                <div class="col-12 d-flex justify-content-start">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
