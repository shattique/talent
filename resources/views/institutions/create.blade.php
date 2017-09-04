@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            @include('institutions.top')

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{ route('admin::institutions.index') }}"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li class="active">Add</li>
                </ul>

                <!--<ul class="breadcrumb-elements">
                    <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear position-left"></i>
                            Dropdown
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                            <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                            <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                        </ul>
                    </li>
                </ul>-->
            </div>
        </div>
        <!-- /page header -->


        <!-- Content area -->
        <div class="content">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Grid -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Horizontal form -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Add Instituition</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="{{url('admin/institutions')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Institution Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Institution Type</label>
                                    <div class="col-lg-10">
                                        <select name="ins_type" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="High School">High School</option>
                                            <option value="College">College</option>
                                            <option value="University">University</option>
                                            <option value="Institution">Institution</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Institution Location</label>
                                    <div class="col-lg-10">
                                        <textarea name="location" rows="5" cols="5" class="form-control"></textarea>
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /horizotal form -->

                </div>

            </div>
            <!-- /grid -->


            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@endsection
