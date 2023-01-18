@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
{{--    @php--}}
{{--        header("refresh: 10");--}}
{{--    @endphp--}}
    <style>
        .media {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }

        .media-body {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }

        .static-top-widget:hover .icon-bg {
            -webkit-transform: rotate(-5deg) scale(1.1);
            transform: rotate(-5deg) scale(1.1);
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .static-top-widget div.align-self-center svg {
            width: 30px;
            height: 30px;
        }

        .static-top-widget .media-body {
            -ms-flex-item-align: center !important;
            align-self: center !important;
            padding-left: 30px;
        }

        .static-top-widget .media-body .icon-bg {
            position: absolute;
            right: -14px;
            top: 6px;
            opacity: 0.2;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            width: 100px;
            height: 100px;
        }

        .static-top-widget span {
            font-weight: 500;
        }

        .static-top-widget h4 {
            font-weight: 600;
        }

        .bg-danger .media.static-top-widget .align-self-center {
            background-color: #d22d3d;
        }

        .widget-joins:before {
            content: "";
            position: absolute;
            height: 100%;
            width: 1px;
            background-color: #efefef;
            left: calc(50% - 1px);
        }

        .widget-joins:after {
            content: "";
            position: absolute;
            height: 1px;
            width: 100%;
            background-color: #efefef;
            left: 0;
            top: 50%;
        }

        .widget-joins .media {
            padding: 30px;
            text-align: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .widget-joins .media span {
            font-weight: 500;
        }

        .widget-joins .media span.widget-t {
            color: #999;
        }

        .widget-joins .media h5 {
            font-weight: 600;
            font-size: 18px;
        }

        .widget-joins .media .details {
            border-left: 1px solid #e6edef;
            padding: 1px 0;
        }

        .widget-joins .media .media-body {
            text-align: left;
        }

        .widget-joins .media .media-body > span {
            color: #999;
        }

        .widget-joins .media .media-body svg {
            width: 40px;
            height: 40px;
        }

        .widget-joins .media .media-body h5 span {
            font-weight: 600;
        }

        .widget-joins .media .media-body h6 {
            font-weight: 600;
        }

        .widget-joins .media .media-body h6 span {
            color: #000;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="container-fluid">
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-dark b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-database">
                                                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0">Total Votes</span>
                                                    <h4 class="mb-0 counter">{{ DB::table('votes')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-database icon-bg">
                                                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-dark b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-message-circle">
                                                        <path
                                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0">Total Incidences </span>
                                                    <h4 class="mb-0 counter">{{ DB::table('incidences')->count() }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-message-circle icon-bg">
                                                        <path
                                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-dark b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-user-plus">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="8.5" cy="7" r="4"></circle>
                                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0">Voting for Others</span>
                                                    <h4 class="mb-0 counter">{{ DB::table('votes')->where('party', "!=", 'PDP')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-user-plus icon-bg">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="8.5" cy="7" r="4"></circle>
                                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="bg-dark b-r-4 card-body">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-user-plus">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="8.5" cy="7" r="4"></circle>
                                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0">Total Poll Submissions</span>
                                                    <h4 class="mb-0"> {{ DB::table('votes')->count() }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-user-plus icon-bg">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="8.5" cy="7" r="4"></circle>
                                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="b-r-4 card-body text-white"
                                             style="background-color: #4065c5 !important">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0 text-white">Voting for Peter (PDP) </span>
                                                    <h4 class="mb-0 text-white">{{ DB::table('votes')->where('party', 'PDP')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag icon-bg">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="b-r-4 card-body text-white"
                                             style="background-color: #16942b !important">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0 text-white">Voting for Frank (APGA) </span>
                                                    <h4 class="mb-0 text-white">{{ DB::table('votes')->where('party', 'APGA')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag icon-bg">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="b-r-4 card-body text-white"
                                             style="background-color: #a06e37 !important">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0 text-white">Voting for Chijioke (LP) </span>
                                                    <h4 class="mb-0 text-white">{{ DB::table('votes')->where('party', 'Labour Party')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag icon-bg">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3 col-lg-6">
                                    <div class="card o-hidden border-0">
                                        <div class="b-r-4 card-body text-white"
                                             style="background-color: #831b1e !important;">
                                            <div class="media static-top-widget">
                                                <div class="align-self-center text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="media-body">
                                                    <span class="m-0 text-white">Voting for Uche (APC) </span>
                                                    <h4 class="mb-0 text-white">{{ DB::table('votes')->where('party', 'APC')->sum('number_of_votes') }}</h4>
                                                    <a href="#"> <small class="text-white">View more</small></a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag icon-bg">
                                                        <path
                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card">
                <div class="card-header">
                    Voting Charts by Local Governments
                </div>
                <div class="class card-body">
                    <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">

                            </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header"><strong>Chart</strong><span class="small m-sm-2">Donut</span></div>
                    <div class="card-body">
                        <div class="example">

                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-170">
                                    <div class="c-chart-wrapper">

                                        <div id="piechart" style="width: auto; height: 500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header"><strong>Chart</strong><span class="small m-sm-2">Bar</span></div>
                    <div class="card-body">
                        <div class="example">

                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-428">
                                    <div class="c-chart-wrapper">
{{--                                        <canvas id="canvas-2"--}}
{{--                                                style="display: block; box-sizing: border-box; height: 286px; width: 572px;"--}}
{{--                                                width="572" height="286"></canvas>--}}
                                        <div id="columnchart_values" style="width: auto; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Incidences Reports
                        </div>

                        <div class="card-body">


                            <div class="" style="overflow-x: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>

                                        @php
                                        $incidences = \App\Models\Incidence::all()->take(6);
                                        @endphp


                                            <th>
                                                Subject
                                            </th>
                                            <th>
                                                Observations
                                            </th>
                                            <th>
                                                Local Government
                                            </th>
                                            <th>
                                                Ward
                                            </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($incidences as $incident )
                                        <tr>
                                                <td>
                                                    {!! html_entity_decode($incident->subject) !!}
                                                </td>
                                                <td>
                                                    {!! html_entity_decode($incident->observations) !!}
                                                </td>
                                        </tr>
                                   @empty
                                        <tr>
                                            <td colspan="">{{ __('No entries found') }}
                                                Hi
                                            </td>
                                        </tr>
                                   @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>
@endsection
@section('scripts')
    @parent
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart4->renderJs() !!}{!! $chart5->renderJs() !!}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['PARTY', 'Voting'],
                ['PDP', {{ Db::table('votes')->where('party', 'PDP')->sum('number_of_votes') }}],
                ['APGA', {{ Db::table('votes')->where('party', 'APGA')->sum('number_of_votes') }}],
                ['LP',  {{ Db::table('votes')->where('party', 'Labour Party')->sum('number_of_votes') }}],
                ['APC', {{ Db::table('votes')->where('party', 'APC')->sum('number_of_votes') }}],

            ]);

            var options = {
                title: 'Voting summary in percentages'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ["PARTY", "Voting", { role: "style" }],
                ["PDP", {{ Db::table('votes')->where('party', 'PDP')->sum('number_of_votes') }}, "blue" ],
                ["APGA", {{ Db::table('votes')->where('party', 'APGA')->sum('number_of_votes') }}, "green"],
                ["LP",  {{ Db::table('votes')->where('party', 'Labour Party')->sum('number_of_votes') }}, "gold"],
                ["APC", {{ Db::table('votes')->where('party', 'APC')->sum('number_of_votes') }}, "orange"],

            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Total number of counted Votes by party",
                width: 800,
                height: 500,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
@endsection
