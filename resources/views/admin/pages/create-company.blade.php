@php
    $title ="Company | Profile";
    $mainHeading = "Create Company Profile";
    $firstName = session('admin')->name;
    $email = session('admin')->email;




@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">General</h4>

                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('CompanyRegistration') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <x-input type="text" name="fname" label="First Name" value="{{ $firstName }}" />
                                                <x-input type="text" name="email" label="Email Id" value="{{ $email }}" />
                                                <x-input type="number" name="mobile" label="Mobile number" value="{{ ($company)?$company->mobile:'' }}" />
                                                <x-input type="text" name="company_name" label="Company Name" value="{{ ($company)?$company->company_name:'' }}" />
                                                <x-input type="file" name="logo" label="Company Logo" />
                                                <div class="col-md-3 col-12">
                                                <div class="form-group"><br>
                                                        <img src="{{ asset('storage/'.$company->logo) }}" class="form-control" style="width: 50%;height: 37px;">
                                                </div>
                                            </div>
                                             <div class="card-header"><h4 class="card-title">Address</h4></div>
                                                <x-input type="text" name="city" label="City" value="{{ ($company)?$company->city:'' }}" />
                                                <x-input type="text" name="state" label="State" value="{{ ($company)?$company->state:'' }}" />
                                                <x-input type="text" name="country" label="Country" value="{{ ($company)?$company->country:'' }}" />
                                                <x-input type="number" name="pincode" label="Pincode" value="{{ ($company)?$company->pincode:'' }}" />

                                                 <div class="card-header"><h4 class="card-title">Registration Info</h4></div>
                                                <x-input type="text" name="pan" label="Pan" value="{{ ($company)?$company->pan:'' }}" />
                                                <x-input type="text" name="com_reg_no" label="Registration No" value="{{ ($company)?$company->com_reg_no:'' }}" />
                                                <x-input type="text" name="com_type" label="Registration Type" value="{{ ($company)?$company->com_type:'' }}" />
                                                {{-- <x-input type="file" name="com_file" label="Company files Uploaded" /> --}}
                                                <x-input type="text" name="has_12A" label="Has 12A" value="{{ ($company)?$company->has_12A:'' }}" />
                                                <x-input type="text" name="number_12A" label="12A/ 12AA Registration Number" value="{{ ($company)?$company->number_12A:'' }}" />
                                                <x-input type="date" name="has_12A_date" label="12A issue date" value="{{ ($company)?$company->has_12A_date:'' }}" />
                                                <x-input type="text" name="has_80G" label="Has 80G" value="{{ ($company)?$company->has_80G:'' }}" />
                                                <x-input type="text" name="number_80G" label="80G Registration Number" value="{{ ($company)?$company->number_80G:'' }}" />
                                                <x-input type="date" name="has_80G_date" label="80 G issue date" value="{{ ($company)?$company->has_80G_date:'' }}" />

                                                <div class="col-12 d-flex justify-content-start">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">{{ ($company)?'Update':'Submit' }}</button>
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
