@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Social Media</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Social Media Update</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form method="post" action="">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Facebook</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="facebook"
                                                class="form-control @error('facebook') is-invalid @enderror" id=""
                                                placeholder="Enter Facebook Url" value="{{ $data->facebook }}"/>

                                            @error('facebook')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Twitter</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="twitter"
                                                class="form-control @error('twitter') is-invalid @enderror" id=""
                                                placeholder="Enter Twitter Url" value="{{ $data->twitter }}"/>

                                            @error('twitter')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Instagram</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="instagram"
                                                class="form-control @error('instagram') is-invalid @enderror" id=""
                                                placeholder="Enter Instagram Url" value="{{ $data->instagram }}" />

                                            @error('instagram')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">LinkedIn</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="linkedin"
                                                class="form-control @error('linkedin') is-invalid @enderror" id=""
                                                placeholder="Enter LinkedIn Url" value="{{ $data->linkedin }}"/>

                                            @error('linkedin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">YouTube</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="youtube"
                                                class="form-control @error('youtube') is-invalid @enderror" id=""
                                                placeholder="Enter YouTube Url" value="{{ $data->youtube }}"/>

                                            @error('youtube')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">GitHub</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="github"
                                                class="form-control @error('github') is-invalid @enderror" id=""
                                                placeholder="Enter GitHub Url" value="{{ $data->github }}"/>

                                            @error('github')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Update Social Media" />
                                        </div>
                                    </div>
                            </div>

                            </form>



                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
