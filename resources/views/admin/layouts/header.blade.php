<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('assets/theme/fonts/font-style.css') }}" rel="stylesheet">
        <link href="{{asset('assets/theme/build/styles/ltr-core.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/theme/build/styles/ltr-vendor.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/images/icon.png')}}" rel="shortcut icon" type="image/x-icon"/>
        <link href="{{asset('assets/css/common-admin.css')}}" rel="stylesheet"/>
        <input type="hidden" value="{{url('/')}}" id="site-url"/>
        <title>{{ucwords(strtolower(Request::segment(2)) . ' | '. strtolower(Request::segment(3)))}}</title>
        @stack('css')
    </head>
    <body class="theme-light preload-active aside-active aside-mobile-minimized aside-desktop-maximized" id="fullscreen">
        <!-- BEGIN Preload -->
        <div class="preload">
            <div class="preload-dialog">
                <!-- BEGIN Spinner -->
                <div class="spinner-border text-primary preload-spinner"></div>
                <!-- END Spinner -->
            </div>
        </div>
        <!-- END Preload -->

        <!-- BEGIN Page Holder -->
        <div class="holder">
        <!-- dashboard left side start -->
            @include('admin.layouts.sidebar')
            <div class="wrapper">
                <!-- BEGIN Header -->
                <div class="header">
                    <!-- BEGIN Header Holder -->
                    <div class="header-holder header-holder-desktop sticky-header" id="sticky-header-desktop">
                        <div class="header-container container-fluid">
                            <!-- <div class="header-wrap">
                               
                            </div>
                            <div class="header-wrap header-wrap-block">
                                
                            </div> -->
                            <div class="header-wrap">
                                <div class="dropdown ml-2">
                                    <button class="btn btn-flat-primary widget13" data-toggle="dropdown">
                                        <div class="widget13-text">Hi <strong>{{Auth::guard('admin')->user()->name}}</strong></div>
                                        <!-- BEGIN Avatar -->
                                        <div class="avatar avatar-info widget13-avatar">
                                            <div class="avatar-display">
                                                <i class="fa fa-user-alt"></i>
                                            </div>
                                        </div>
                                        <!-- END Avatar -->
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet border-0">
                                        
                                            <div class="portlet-footer portlet-footer-bordered rounded-0">
                                                <a href="{{route('admin.auth.admin-logout')}}" class="btn">Sign out</a>
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                    </div>
                                </div>
                                <!-- END Dropdown -->
                            </div>
                        </div>
                    </div>
                    <!-- END Header Holder -->                    
                    <!-- BEGIN Header Holder -->
                    <div class="header-holder header-holder-mobile sticky-header" id="sticky-header-mobile">
                        <div class="header-container container-fluid">
                            <div class="header-wrap">
                                <button class="btn btn-flat-primary btn-icon" data-toggle="aside">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <div class="header-wrap header-wrap-block justify-content-start px-3">
                                <h5>{{env('APP_NAME')}}</h4>
                            </div>
                            <div class="header-wrap">
                                <!-- BEGIN Dropdown -->
                                <div class="dropdown ml-2">
                                    <button class="btn btn-flat-primary widget13" data-toggle="dropdown">
                                        <div class="widget13-text">Hi <strong>{{Auth::guard('admin')->user()->name}}</strong></div>
                                        <!-- BEGIN Avatar -->
                                        <div class="avatar avatar-info widget13-avatar">
                                            <div class="avatar-display">
                                                <i class="fa fa-user-alt"></i>
                                            </div>
                                        </div>
                                        <!-- END Avatar -->
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-wide dropdown-menu-right dropdown-menu-animated overflow-hidden py-0">
                                        <!-- BEGIN Portlet -->
                                        <div class="portlet border-0">
                                            <div class="portlet-footer portlet-footer-bordered rounded-0">
                                                <a href="{{route('admin.auth.admin-logout')}}" class="btn">Sign out</a>
                                            </div>
                                        </div>
                                        <!-- END Portlet -->
                                    </div>
                                </div>
                                <!-- END Dropdown -->
                            </div>
                        </div>
                    </div>
                    <!-- END Header Holder -->
                </div>
                <!-- END Header -->