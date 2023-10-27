@php
    $title ="Mail Setting | Mail";
    $mainHeading = "Settings";
@endphp
@extends('admin.layout.master')
@section('content-section')
   <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Mail Setting  </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row">
                                            <x-input type="text" name="subject" label="Subject" value="Your Subject" />
                                            <x-input type="text" name="From" label="From Name" value="Jone " />
                                            <x-input type="text" name="to" label="To :" value="example@gmail.com" />
                                            <x-input type="text" name="cc" label="Cc :" value="example@gmail.com;example2@gmail.com" />


                                            <small><b>Notie : Add more CC separated by semicolen ";"</b> </small>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                <label for="message-column">Message</label>
                                                    <textarea name="" id="default" cols="30" rows="15"></textarea>

                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-start">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Update</button>
                                                </div>

                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
