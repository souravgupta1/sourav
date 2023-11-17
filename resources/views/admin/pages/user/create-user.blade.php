@php
    $title ="Company | User Form";
    $mainHeading = "Create User";
    $companyProfile = "active";
    foreach ($pages as $page) {
        $p[] = "$page->page_name,$page->page_options";
    }
    $unique_array = array_unique($p);
    $PagesAll = implode(':',$unique_array);


@endphp

@extends('admin.layout.master')
@section('content-section')

<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add User
                @if (session('status'))
                    <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                @endif
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="{{ route('new-user') }}" method="POST">
                    @csrf
                        <div class="row">
                            <x-input type="text" name="uname" label="User Name" required />
                            <x-input type="text" name="email" label="Email ID" required />
                            <x-input type="text" name="password" label="Password" required />
                            <x-input type="select" name="role" label='Role' option="Admin|User" required />
                            <x-dropdown label="Access of Pages" name="pages"  option="{{ $PagesAll }}" />
                            <div class="col-12 d-flex justify-content-start my-5">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
