@php
    $title ="Company | Funder";
    $mainHeading = "List Funder";
    $companyProfile = "active";

@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Funder List
                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">

                                    <!-- table bordered -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Funder Type</th>
                                                    <th>Funder Category</th>
                                                    <th>Funder Name</th>
                                                    <th>Nationality</th>
                                                    <th>Address</th>
                                                    <th>Country</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($funder as $item )


                                                <tr>
                                                    <td class="text-bold-500">{{ $item->funder_type }}</td>
                                                    <td class="text-bold-500">{{ $item->funder_category }}</td>
                                                    <td class="text-bold-500">{{ $item->funder_name.' '.$item->funder_middel.' '.$item->funder_middel }}</td>
                                                    <td class="text-bold-500">{{ $item->funder_nationality }}</td>
                                                    <td class="text-bold-500">{{ $item->funder_address1 }}</td>
                                                    <td class="text-bold-500">{{ $item->funder_country }}</td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
