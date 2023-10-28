@php
    $title ="Company | Funder";
    $mainHeading = "Create Funder";
    $companyProfile = "active";

@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Funder
                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('CompanyFunder') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <x-input type="select" name="funder_type" label="Funder Type" option="CSR|Foundation|Individual|Corporate Donation"/>
                                                <x-input type="select" name="funder_category" label="Funder Category" option="Domestic|FCRA"/>
                                                <x-input type="text" name="funder_entity" label="Entity Name" />
                                                <x-input type="text" name="funder_name" label="First Name" />
                                                <x-input type="text" name="funder_middel" label="Middle Name" />
                                                <x-input type="text" name="funder_last" label="Last Name" />
                                                <x-input type="text" name="funder_nationality" label="Nationality" />
                                                <x-input type="text" name="funder_country" label="Country" />
                                                <x-input type="text" name="funder_state" label="State" />
                                                <x-input type="text" name="funder_city" label="City" />
                                                <x-input type="text" name="funder_pin" label="Pin" />
                                                <x-input type="text" name="funder_address1" label="Address Line 1" />
                                                <x-input type="text" name="funder_address2" label="Address Line 2" />
                                                <x-input type="text" name="funder_contact_name" label="Contact Person Name" />
                                                <x-input type="text" name="funder_contact_number" label="Contact No" />
                                                <x-input type="text" name="funder_email" label="Email ID" />
                                                <x-input type="text" name="funder_website" label="Website" />
                                                <x-input type="text" name="funder_pan" label="PAN No" />
                                                <x-input type="file" name="funder_pan_img" label="Upload PAN" />
                                                <x-input type="text" name="funder_passport" label="Passport No" />
                                                <x-input type="file" name="funder_passport_img" label="Upload Passport" />
                                                <x-input type="text" name="funder_remark" label="Remarks" />
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
