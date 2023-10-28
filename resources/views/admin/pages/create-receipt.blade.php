@php
    $title ="Company | Receipt";
    $mainHeading = "Create Receipt";
    $companyProfile = "active";

@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Receipt Details
                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('CompanyReceipt') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <x-input type="text" name="receiver" label="Received with thanks From" />
                                                <x-input type="text" name="amount" label="a sum of Rupees" />
                                                <x-input type="text" name="towards" label="towards" />
                                                <x-input type="select" name="transfer_mode" label="vide" option="Cash|Bank"/>
                                                <x-input type="date" name="receipt_date" label="Dated" />
                                                <x-input type="text" name="receipt_no" label="Receipt No" value="{{ $receiptNumber }}" readonly='readOnly' />
                                                <x-input type="date" name="date" label="Date" />


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
