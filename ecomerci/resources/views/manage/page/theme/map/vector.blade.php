@section('title')
    Vector Map
@endsection
@extends('manage.layout.app')
@section('style')
    <!-- jvectormap css -->
    <link href="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">World Map</h5>
                    </div>
                    <div class="card-body">
                        <div id="world-map" style="height: 420px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Iran Map</h5>
                    </div>
                    <div class="card-body">
                        <div id="iran_map" style="height: 420px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">USA</h5>
                    </div>
                    <div class="card-body">
                        <div id="usa" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">India</h5>
                    </div>
                    <div class="card-body">
                        <div id="india" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Australia</h5>
                    </div>
                    <div class="card-body">
                        <div id="australia" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Argentina</h5>
                    </div>
                    <div class="card-body">
                        <div id="argentina" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Russia</h5>
                    </div>
                    <div class="card-body">
                        <div id="russia" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <!-- Start col -->
            <div class="col-lg-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">South Africa</h5>
                    </div>
                    <div class="card-body">
                        <div id="south-africa" style="height: 400px"></div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Vector Maps js -->
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/gdp-data.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-ar-mill.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-ru-mill.js') }}"></script>
    <script src="{{ asset('/assets/manage/plugins/jvectormap/jquery-jvectormap-za-mill.js') }}"></script>
    <script src="{{ asset('/assets/manage/js/custom/custom-jvectormap.js') }}"></script>

    <script src="{{ asset('/assets/manage/plugins/jvectormap/iran/iran_all_state_cities_map.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            const jvm_map = $('#iran_map');
            jvm_map.vectorMap({
                map: 'ir_mill',
                enableZoom: false,
                backgroundColor: 'transparent',
                zoomOnScroll: true,
                normalizeFunction: "polynomial",
                hoverOpacity: .7,
                hoverColor: false,
                regionStyle: {
                    initial: {
                        fill: '#DCE3E8',
                        "fill-opacity": 1,
                        stroke: '#fff',
                        "stroke-width": 2,
                        "stroke-opacity": 1
                    }
                },
                onRegionClick: function (event, code) {
                    if (code !== 'ir_kish') {
                        const jvm_container = jvm_map.children('.jvectormap-container');
                        jvm_container.addClass('ir_mill').hide();
                        $('.jvm_back').show();
                        setTimeout(function () {
                            jvm_map.vectorMap({
                                map: code,
                                enableZoom: false,
                                backgroundColor: 'transparent',
                                zoomOnScroll: true,
                                normalizeFunction: "polynomial",
                                hoverOpacity: .7,
                                hoverColor: false,
                                regionStyle: {
                                    initial: {
                                        fill: '#DCE3E8',
                                        "fill-opacity": 1,
                                        stroke: '#fff',
                                        "stroke-width": 2,
                                        "stroke-opacity": 1
                                    }
                                }
                            });
                        }, 300);
                    } else {
                        event.stopImmediatePropagation();
                    }
                }
            });
            $('.jvm_back').click(function () {
                $(this).hide();
                $('.jvectormap-container:not(.ir_mill)').remove();
                $('.jvectormap-container.ir_mill').removeClass('ir_mill').show();
            });
        });
    </script>
@endsection
