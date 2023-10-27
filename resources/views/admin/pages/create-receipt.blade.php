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
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <x-input type="text" name="title" label="Received with thanks From" />
                                                <x-input type="text" name="Amt_word" label="a sum of Rupees" />
                                                <x-input type="text" name="towards" label="towards" />
                                                <x-input type="text" name="vide" label="vide" />
                                                <x-input type="file" name="date" label="Dated" />
                                                <x-input type="number" name="fname" label="Receipt No" />
                                                <x-input type="text" name="Date" label="Date" />


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
