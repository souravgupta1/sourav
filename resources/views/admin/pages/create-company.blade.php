@php
    $title ="Company | Profile";
    $mainHeading = "Company Registration";





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
                                                <x-input type="text" name="company_name" label="Company Name" value="{{ ($company)?$company->company_name:'' }}" />
                                                <x-input type="text" name="email" label="Company Email Id" value="{{ ($company)?$company->email:'' }}" />
                                                <x-input type="file" name="logo" label="Company Logo" />
                                                <div class="col-md-3 col-12">
                                                <div class="form-group"><br>
                                                        <img src="{{ ($company)?asset('storage/'.$company->logo):'#'  }}" alt="Logo" class="form-control" style="width: 50%;height: 37px;">
                                                </div></div>
                                                <x-input type="number" name="mobile" label="Mobile number" value="{{ ($company)?$company->mobile:'' }}" />

                                             <div class="card-header"><h4 class="card-title">Address</h4></div>
                                                <x-input type="text" name="address1" label="Address 1" value="{{ ($company)?$company->address1:'' }}" />
                                                <x-input type="text" name="address2" label="Address 2" value="{{ ($company)?$company->address2:'' }}" />
                                                <x-input type="text" name="city" label="City" value="{{ ($company)?$company->city:'' }}" />
                                                <x-input type="text" name="state" label="State" value="{{ ($company)?$company->state:'' }}" />
                                                <x-input type="text" name="country" label="Country" value="{{ ($company)?$company->country:'' }}" />
                                                <x-input type="number" name="pincode" label="Pincode" value="{{ ($company)?$company->pincode:'' }}" />

                                                 <div class="card-header"><h4 class="card-title">Registration Info</h4></div>
                                                <x-input type="select" name="com_reg_type" label="Registration Type" option="trust|Socity|Individual" />
                                                <x-input type="text" name="com_reg_no" label="Registration No" value="{{ ($company)?$company->com_reg_no:'' }}" />
                                                <x-input type="date" name="com_reg_expiry_date" label="Expiry Date" value="{{ ($company)?$company->com_reg_expiry_date:'' }}"  />
                                                <x-input type="date" name="com_reg_date" label="Registration Date" value="{{ ($company)?$company->com_reg_date:'' }}"  />
                                                </div>
                                                <div class="row">
                                                <x-input type="file" name="com_reg_file" label="Document Upload" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->com_reg_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="card-header"><h4 class="card-title">80G Info</h4></div>
                                                <x-input type="text" name="_80G_num" label="80G Registration Number" value="{{ ($company)?$company->_80G_num:'' }}" />
                                                <x-input type="file" name="_80G_file" label="80G Upload" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->_80G_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                <x-input type="date" name="_80G_start_date" label="80G Registration Date" value="{{ ($company)?$company->_80G_start_date:'' }}" />
                                                <x-input type="date" name="_80G_end_date" label="80G Expiry Date" value="{{ ($company)?$company->_80G_end_date:'' }}" />
                                                </div>
                                                <div class="row">
                                                <div class="card-header"><h4 class="card-title">12A Info</h4></div>
                                                <x-input type="text" name="_12A_num" label="12A/12AA Registration Number" value="{{ ($company)?$company->_12A_num:'' }}" />
                                                <x-input type="file" name="_12A_file" label="12A/12AA Upload" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->_12AG_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                <x-input type="date" name="_12A_start_date" label="12A Registration Date" value="{{ ($company)?$company->_12A_start_date:'' }}" />
                                                <x-input type="date" name="_12A_end_date" label="12A Expiry Date" value="{{ ($company)?$company->_12A_end_date:'' }}" />
                                                </div>
                                                <div class="row">
                                                <div class="card-header"><h4 class="card-title">FCRA Info</h4></div>
                                                <x-input type="text" name="fcra_num" label="FCRA Registration Number" value="{{ ($company)?$company->fcra_num:'' }}"  />
                                                <x-input type="file" name="fcra_file" label="FCRA Upload" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->fcra_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                <x-input type="date" name="fcra_date" label="FCRA Valid Till" value="{{ ($company)?$company->fcra_date:'' }}"  />
                                                </div>
                                                 <div class="row">
                                                <div class="card-header"><h4 class="card-title">CSR Info</h4></div>
                                                <x-input type="text" name="csr_num" label="CSR Registration Number" value="{{ ($company)?$company->csr_num:'' }}" />
                                                <x-input type="file" name="csr_file" label="CSR Upload" value="" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->csr_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="card-header"><h4 class="card-title">Other Details</h4></div>
                                                <x-input type="text" name="pan" label="Pan" value="{{ ($company)?$company->pan:'' }}" />
                                                <x-input type="file" name="pan_file" label="Pan Upload" />
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->pan_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <x-input type="text" name="gstin_num" label="GSTIN" value="{{ ($company)?$company->gstin_num:'' }}" />
                                                <x-input type="file" name="gstin_file" label="GSTIN Upload" />
                                                <div class="col-md-3 col-12">
                                                <div class="form-group"><br>
                                                        <a target="_blank" href="{{ ($company)?asset('storage/'.$company->gstin_file):'#'  }}"><img src="{{ asset('assets/images/logo/file.png') }}" class="form-control" style="width: 40%;height: 60px;"></a>
                                                </div></div>


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
