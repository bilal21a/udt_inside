@extends('layouts.app')
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-7">
              <div class="row">
                 <div class="row">
                        <div class="col-12">
                            <!-- Inventory Start -->
                            <section class="scroll-section" id="horizontal">
                                <div class="row">
                                    <div class="col-xxl-6 col-sm-12">
                                        <div class="card custom-card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <span class="avatar avatar-md  bg-primary">
                                                            <svg fill="#ffffff" version="1.1" id="Layer_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px"
                                                            viewBox="924 578 200 200" enable-background="new 924 578 200 200"
                                                            xml:space="preserve" stroke="#ffffff">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="M984.585,638.942c0,13.999-9.609,25.348-21.462,25.348c-11.852,0-21.459-11.349-21.459-25.348 c0-13.998,9.607-25.346,21.459-25.346C974.976,613.596,984.585,624.944,984.585,638.942z">
                                                                        </path>
                                                                        <path
                                                                            d="M987.585,683.641c1.55-0.945,3.265-1.561,5.041-1.855c-3.606-5.088-6.161-10.546-7.637-17.078 c-0.404-2.387-3.672-2.667-6.102-0.687c-4.546,3.706-9.849,6.186-15.765,6.186c-6.03,0-11.577-2.399-16.024-6.414 c-1.419-1.282-3.51-1.476-5.143-0.479c-8.443,5.158-14.834,13.344-17.622,23.067c-0.749,2.605-0.223,5.42,1.411,7.588 c1.636,2.166,4.192,3.443,6.906,3.443h38.668C975.947,692.072,981.41,687.41,987.585,683.641z">
                                                                        </path>
                                                                    </g>
                                                                    <g>
                                                                        <path
                                                                            d="M1063.416,638.942c0,13.999,9.608,25.348,21.461,25.348c11.854,0,21.46-11.349,21.46-25.348 c0-13.998-9.606-25.346-21.46-25.346C1073.024,613.596,1063.416,624.944,1063.416,638.942z">
                                                                        </path>
                                                                        <path
                                                                            d="M1060.415,683.641c-1.55-0.945-3.266-1.561-5.041-1.855c3.606-5.088,6.161-10.546,7.637-17.078 c0.405-2.387,3.673-2.667,6.103-0.687c4.546,3.706,9.848,6.186,15.764,6.186c6.029,0,11.577-2.399,16.025-6.414 c1.419-1.282,3.509-1.476,5.142-0.479c8.444,5.158,14.836,13.344,17.622,23.067c0.748,2.605,0.223,5.42-1.41,7.588 c-1.637,2.166-4.192,3.443-6.905,3.443h-38.67C1072.053,692.072,1066.591,687.41,1060.415,683.641z">
                                                                        </path>
                                                                    </g>
                                                                    <g>
                                                                        <path
                                                                            d="M1082.475,725.451c-4.198-14.654-13.72-27.045-26.326-34.992c-2.487-1.566-5.715-1.313-7.921,0.631 c-6.766,5.959-15.138,9.506-24.228,9.506c-9.269,0-17.791-3.686-24.626-9.855c-2.182-1.971-5.393-2.268-7.902-0.734 c-12.977,7.924-22.799,20.504-27.082,35.445c-1.151,4.008-0.344,8.328,2.166,11.662c2.516,3.33,6.443,5.291,10.615,5.291h92.523 c4.173,0,8.103-1.955,10.618-5.291C1082.823,733.779,1083.626,729.463,1082.475,725.451z">
                                                                        </path>
                                                                        <path
                                                                            d="M1056.981,652.547c0,21.513-14.766,38.955-32.981,38.955c-18.214,0-32.979-17.442-32.979-38.955 c0-21.515,14.765-38.951,32.979-38.951C1042.216,613.596,1056.981,631.033,1056.981,652.547z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>                                        </span>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <h4 class="fw-semibold mb-0"> Customers</h4>
                                                                <p class="text-muted mt-1">{{ $customers }}</p>
                                                            </div>
                                                            <div id="crm-total-customers" style="min-height: 40px;"><div id="apexchartsdq1qpxvf" class="apexcharts-canvas apexchartsdq1qpxvf apexcharts-theme-light" style="width: 100px; height: 40px;"><svg id="SvgjsSvg1916" width="100" height="40" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1918" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1917"><clipPath id="gridRectMaskdq1qpxvf"><rect id="SvgjsRect1923" width="105.5" height="41.5" x="-2.75" y="-0.75" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskdq1qpxvf"></clipPath><clipPath id="nonForecastMaskdq1qpxvf"></clipPath><clipPath id="gridRectMarkerMaskdq1qpxvf"><rect id="SvgjsRect1924" width="104" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1929" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1930" stop-opacity="0.9" stop-color="rgba(66,45,112,0.9)" offset="0"></stop><stop id="SvgjsStop1931" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="0.98"></stop><stop id="SvgjsStop1932" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1922" x1="0" y1="0" x2="0" y2="40" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="40" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1934" class="apexcharts-grid"><g id="SvgjsG1935" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1948" x1="0" y1="4" x2="100" y2="4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1949" x1="0" y1="8" x2="100" y2="8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1950" x1="0" y1="12" x2="100" y2="12" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1951" x1="0" y1="16" x2="100" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1952" x1="0" y1="20" x2="100" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1953" x1="0" y1="24" x2="100" y2="24" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1954" x1="0" y1="28" x2="100" y2="28" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1955" x1="0" y1="32" x2="100" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1956" x1="0" y1="36" x2="100" y2="36" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1936" class="apexcharts-gridlines-vertical" style="display: none;"><line id="SvgjsLine1938" x1="0" y1="0" x2="0" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1939" x1="12.5" y1="0" x2="12.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1940" x1="25" y1="0" x2="25" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1941" x1="37.5" y1="0" x2="37.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1942" x1="50" y1="0" x2="50" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1943" x1="62.5" y1="0" x2="62.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1944" x1="75" y1="0" x2="75" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1945" x1="87.5" y1="0" x2="87.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1946" x1="100" y1="0" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1959" x1="0" y1="40" x2="100" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1958" x1="0" y1="1" x2="0" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1937" class="apexcharts-grid-borders" style="display: none;"><line id="SvgjsLine1947" x1="0" y1="0" x2="100" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1957" x1="0" y1="40" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1925" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1926" class="apexcharts-series" seriesName="Value" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1933" d="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1929)" stroke-opacity="1" stroke-linecap="butt" stroke-width="1.5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskdq1qpxvf)" pathTo="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" pathFrom="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill-rule="evenodd"></path><g id="SvgjsG1927" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1928" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1960" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1961" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1962" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1963" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1964" class="apexcharts-point-annotations"></g><g id="SvgjsG1965" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1966" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g></g><g id="SvgjsG1919" class="apexcharts-annotations"></g><g id="SvgjsG1976" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><rect id="SvgjsRect1921" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect></svg><div class="apexcharts-legend" style="max-height: 20px;"></div></div></div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                            <div>
                                                                <a class="text-primary" href="javascript:void(0);">View All<i class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-sm-12">
                                        <div class="card custom-card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <span class="avatar avatar-md  bg-primary">
                                                            <svg fill="#ffffff" height="30px" width="30px" version="1.1" id="Capa_1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.785 489.785"
                                                                xml:space="preserve" stroke="#ffffff">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <g id="XMLID_196_">
                                                                        <path id="XMLID_203_"
                                                                            d="M409.772,379.327l-81.359-124.975c-5.884-9.054-15.925-13.119-25.987-13.119 c-2.082,0-6.392,0.05-11.051,0.115c-0.363-0.61-0.742-1.215-1.355-1.627l-20.492-13.609c-2.364-1.569-5.434-1.486-7.701,0.182 l-16.948,12.508l-16.959-12.508c-2.285-1.668-5.337-1.751-7.72-0.182l-20.455,13.609c-0.578,0.377-0.945,0.907-1.282,1.461 c-4.828,0.031-9.327,0.057-11.222,0.057c-10.016,0-20.011,4.119-25.859,13.113L80.022,379.327 c-8.65,13.267-5.149,31.008,7.896,39.992l18.06,12.449c10.887-25.926,28.868-48.094,51.45-64.279l4.657-7.162v3.861 c16.364-10.811,34.941-18.477,54.885-22.234c-5.926-13.152-10.899-28.819-14.546-43.586c-4.249-17.232-6.741-33.201-6.741-42.245 c0-3.351,0.433-6.579,1.09-9.727l14.8,48.975c0.766,2.565,2.984,4.417,5.641,4.73c0.268,0.03,0.529,0.046,0.784,0.046 c2.365,0,4.602-1.25,5.818-3.34l11.538-19.873l3.246,3.235c-7.768,10.276-10.82,39.199-12.005,60.314 c5.994-0.734,12.066-1.222,18.254-1.222c6.201,0,12.292,0.497,18.304,1.23c-1.186-21.114-4.237-50.037-12.024-60.322l3.246-3.255 l11.574,19.892c1.216,2.09,3.422,3.34,5.805,3.34c0.255,0,0.522-0.016,0.779-0.046c2.655-0.314,4.874-2.166,5.659-4.73 l14.791-48.872c0.634,3.116,1.051,6.313,1.051,9.624c0,16.806-8.425,57.342-21.276,85.831 c19.981,3.768,38.588,11.453,54.953,22.291v-3.899l4.735,7.256c22.504,16.193,40.436,38.324,51.293,64.206l18.139-12.488 C414.919,410.335,418.403,392.594,409.772,379.327z M219.962,276.685l-8.613-28.53l12.388-8.24l12.322,9.088L219.962,276.685z M269.783,276.685l-16.079-27.683l12.31-9.088l12.401,8.24L269.783,276.685z">
                                                                        </path>
                                                                        <path id="XMLID_202_"
                                                                            d="M202.716,424.721l14.705,19.349c8.151-4.914,17.598-7.607,27.427-7.607c9.848,0,19.313,2.692,27.464,7.615 l14.705-19.363c-11.465-10.799-26.346-16.721-42.15-16.721C229.055,407.994,214.156,413.925,202.716,424.721z">
                                                                        </path>
                                                                        <path id="XMLID_201_"
                                                                            d="M176.693,160.576c0.499,25.456,14.96,47.266,36.03,58.591c9.622,5.18,20.473,8.384,32.174,8.384 c11.683,0,22.503-3.198,32.114-8.368c21.063-11.311,35.579-33.117,36.06-58.582c-17.379,12.075-41.896,19.923-68.174,19.923 S194.096,172.676,176.693,160.576z">
                                                                        </path>
                                                                        <path id="XMLID_200_"
                                                                            d="M174.741,100.132l-0.225,20.205c0.037,15.991,31.524,36.82,70.38,36.82 c38.855,0,70.314-20.829,70.331-36.82l-0.207-20.195c10.224-2.662,18.158-6.617,23.239-12.301 c3.981-4.434,6.267-9.902,6.267-16.783C344.528,39.883,299.879,0,244.897,0c-55.031,0-99.631,39.883-99.631,71.058 c0,6.881,2.273,12.34,6.236,16.783C156.585,93.524,164.529,97.479,174.741,100.132z">
                                                                        </path>
                                                                        <path id="XMLID_197_"
                                                                            d="M244.848,356.925c-73.255,0-132.858,59.605-132.858,132.86h33.47c0-0.048,0-0.114,0-0.161v-0.031 c1.088-6.557,6.711-11.334,13.313-11.334c0.115,0,0.243,0.01,0.37,0.01l51.707,1.341c-0.973,3.247-1.648,6.619-1.648,10.176h71.322 c0-3.557-0.669-6.929-1.66-10.176l51.724-1.341c0.109,0,0.219-0.01,0.353-0.01c6.595,0,12.243,4.777,13.324,11.334v0.031 c0,0.047,0,0.113,0,0.161h33.44C377.706,416.53,318.122,356.925,244.848,356.925z M302.201,433.91l-27.562,36.317 c-6.389-9.687-17.325-16.104-29.792-16.104c-12.437,0-23.385,6.411-29.762,16.098l-27.555-36.3 c-4.699-6.194-4.11-14.923,1.392-20.424c15.452-15.443,35.689-23.166,55.943-23.166c20.249,0,40.484,7.723,55.961,23.179 C306.322,419.007,306.901,427.719,302.201,433.91z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        </div>
                                                    <div class="flex-fill ms-3">
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <h4 class="fw-semibold mb-0"> Driver</h4>
                                                                <p class="text-muted mt-1">{{ $drivers }}</p>
                                                            </div>
                                                            <div id="crm-total-customers" style="min-height: 40px;"><div id="apexchartsdq1qpxvf" class="apexcharts-canvas apexchartsdq1qpxvf apexcharts-theme-light" style="width: 100px; height: 40px;"><svg id="SvgjsSvg1916" width="100" height="40" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1918" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1917"><clipPath id="gridRectMaskdq1qpxvf"><rect id="SvgjsRect1923" width="105.5" height="41.5" x="-2.75" y="-0.75" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskdq1qpxvf"></clipPath><clipPath id="nonForecastMaskdq1qpxvf"></clipPath><clipPath id="gridRectMarkerMaskdq1qpxvf"><rect id="SvgjsRect1924" width="104" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1929" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1930" stop-opacity="0.9" stop-color="rgba(66,45,112,0.9)" offset="0"></stop><stop id="SvgjsStop1931" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="0.98"></stop><stop id="SvgjsStop1932" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1922" x1="0" y1="0" x2="0" y2="40" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="40" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1934" class="apexcharts-grid"><g id="SvgjsG1935" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1948" x1="0" y1="4" x2="100" y2="4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1949" x1="0" y1="8" x2="100" y2="8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1950" x1="0" y1="12" x2="100" y2="12" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1951" x1="0" y1="16" x2="100" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1952" x1="0" y1="20" x2="100" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1953" x1="0" y1="24" x2="100" y2="24" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1954" x1="0" y1="28" x2="100" y2="28" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1955" x1="0" y1="32" x2="100" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1956" x1="0" y1="36" x2="100" y2="36" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1936" class="apexcharts-gridlines-vertical" style="display: none;"><line id="SvgjsLine1938" x1="0" y1="0" x2="0" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1939" x1="12.5" y1="0" x2="12.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1940" x1="25" y1="0" x2="25" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1941" x1="37.5" y1="0" x2="37.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1942" x1="50" y1="0" x2="50" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1943" x1="62.5" y1="0" x2="62.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1944" x1="75" y1="0" x2="75" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1945" x1="87.5" y1="0" x2="87.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1946" x1="100" y1="0" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1959" x1="0" y1="40" x2="100" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1958" x1="0" y1="1" x2="0" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1937" class="apexcharts-grid-borders" style="display: none;"><line id="SvgjsLine1947" x1="0" y1="0" x2="100" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1957" x1="0" y1="40" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1925" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1926" class="apexcharts-series" seriesName="Value" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1933" d="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1929)" stroke-opacity="1" stroke-linecap="butt" stroke-width="1.5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskdq1qpxvf)" pathTo="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" pathFrom="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill-rule="evenodd"></path><g id="SvgjsG1927" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1928" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1960" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1961" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1962" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1963" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1964" class="apexcharts-point-annotations"></g><g id="SvgjsG1965" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1966" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g></g><g id="SvgjsG1919" class="apexcharts-annotations"></g><g id="SvgjsG1976" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><rect id="SvgjsRect1921" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect></svg><div class="apexcharts-legend" style="max-height: 20px;"></div></div></div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                            <div>
                                                                <a class="text-primary" href="javascript:void(0);">View All<i class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-sm-12">
                                        <div class="card custom-card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <span class="avatar avatar-md  bg-primary">
                                                            <svg fill="#ffffff" width="35px" height="35px" viewBox="0 -43.92 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 35.03" xml:space="preserve" stroke="#ffffff">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.9830399999999999"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <style type="text/css">
                                                                        .st0 {
                                                                            fill-rule: evenodd;
                                                                            clip-rule: evenodd;
                                                                        }
                                                                    </style>
                                                                    <g>
                                                                        <path class="st0" d="M99.42,13.57c5.93,0,10.73,4.8,10.73,10.73c0,5.93-4.8,10.73-10.73,10.73s-10.73-4.8-10.73-10.73 C88.69,18.37,93.49,13.57,99.42,13.57L99.42,13.57z M79.05,5c-0.59,1.27-1.06,2.69-1.42,4.23c-0.82,2.57,0.39,3.11,3.19,2.06 c2.06-1.23,4.12-2.47,6.18-3.7c1.05-0.74,1.55-1.47,1.38-2.19c-0.34-1.42-3.08-2.16-5.33-2.6C80.19,2.23,80.39,2.11,79.05,5 L79.05,5z M23.86,19.31c2.75,0,4.99,2.23,4.99,4.99c0,2.75-2.23,4.99-4.99,4.99c-2.75,0-4.99-2.23-4.99-4.99 C18.87,21.54,21.1,19.31,23.86,19.31L23.86,19.31z M99.42,19.31c2.75,0,4.99,2.23,4.99,4.99c0,2.75-2.23,4.99-4.99,4.99 c-2.75,0-4.99-2.23-4.99-4.99C94.43,21.54,96.66,19.31,99.42,19.31L99.42,19.31z M46.14,12.5c2.77-2.97,5.97-4.9,9.67-6.76 c8.1-4.08,13.06-3.58,21.66-3.58l-2.89,7.5c-1.21,1.6-2.58,2.73-4.66,2.84H46.14L46.14,12.5z M23.86,13.57 c5.93,0,10.73,4.8,10.73,10.73c0,5.93-4.8,10.73-10.73,10.73s-10.73-4.8-10.73-10.73C13.13,18.37,17.93,13.57,23.86,13.57 L23.86,13.57z M40.82,10.3c3.52-2.19,7.35-4.15,11.59-5.82c12.91-5.09,22.78-6,36.32-1.9c4.08,1.55,8.16,3.1,12.24,4.06 c4.03,0.96,21.48,1.88,21.91,4.81l-4.31,5.15c1.57,1.36,2.85,3.03,3.32,5.64c-0.13,1.61-0.57,2.96-1.33,4.04 c-1.29,1.85-5.07,3.76-7.11,2.67c-0.65-0.35-1.02-1.05-1.01-2.24c0.06-23.9-28.79-21.18-26.62,2.82H35.48 C44.8,5.49,5.04,5.4,12.1,28.7C9.62,31.38,3.77,27.34,0,18.75c1.03-1.02,2.16-1.99,3.42-2.89c-0.06-0.05,0.06,0.19-0.15-0.17 c-0.21-0.36,0.51-1.87,1.99-2.74C13.02,8.4,31.73,8.52,40.82,10.3L40.82,10.3z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                    </span>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <h4 class="fw-semibold mb-0"> Vehicles</h4>
                                                                <p class="text-muted mt-1">{{ $vehicles }}</p>
                                                            </div>
                                                            <div id="crm-total-customers" style="min-height: 40px;"><div id="apexchartsdq1qpxvf" class="apexcharts-canvas apexchartsdq1qpxvf apexcharts-theme-light" style="width: 100px; height: 40px;"><svg id="SvgjsSvg1916" width="100" height="40" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1918" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1917"><clipPath id="gridRectMaskdq1qpxvf"><rect id="SvgjsRect1923" width="105.5" height="41.5" x="-2.75" y="-0.75" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskdq1qpxvf"></clipPath><clipPath id="nonForecastMaskdq1qpxvf"></clipPath><clipPath id="gridRectMarkerMaskdq1qpxvf"><rect id="SvgjsRect1924" width="104" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1929" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1930" stop-opacity="0.9" stop-color="rgba(66,45,112,0.9)" offset="0"></stop><stop id="SvgjsStop1931" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="0.98"></stop><stop id="SvgjsStop1932" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1922" x1="0" y1="0" x2="0" y2="40" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="40" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1934" class="apexcharts-grid"><g id="SvgjsG1935" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1948" x1="0" y1="4" x2="100" y2="4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1949" x1="0" y1="8" x2="100" y2="8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1950" x1="0" y1="12" x2="100" y2="12" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1951" x1="0" y1="16" x2="100" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1952" x1="0" y1="20" x2="100" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1953" x1="0" y1="24" x2="100" y2="24" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1954" x1="0" y1="28" x2="100" y2="28" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1955" x1="0" y1="32" x2="100" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1956" x1="0" y1="36" x2="100" y2="36" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1936" class="apexcharts-gridlines-vertical" style="display: none;"><line id="SvgjsLine1938" x1="0" y1="0" x2="0" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1939" x1="12.5" y1="0" x2="12.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1940" x1="25" y1="0" x2="25" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1941" x1="37.5" y1="0" x2="37.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1942" x1="50" y1="0" x2="50" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1943" x1="62.5" y1="0" x2="62.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1944" x1="75" y1="0" x2="75" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1945" x1="87.5" y1="0" x2="87.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1946" x1="100" y1="0" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1959" x1="0" y1="40" x2="100" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1958" x1="0" y1="1" x2="0" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1937" class="apexcharts-grid-borders" style="display: none;"><line id="SvgjsLine1947" x1="0" y1="0" x2="100" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1957" x1="0" y1="40" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1925" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1926" class="apexcharts-series" seriesName="Value" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1933" d="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1929)" stroke-opacity="1" stroke-linecap="butt" stroke-width="1.5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskdq1qpxvf)" pathTo="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" pathFrom="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill-rule="evenodd"></path><g id="SvgjsG1927" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1928" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1960" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1961" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1962" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1963" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1964" class="apexcharts-point-annotations"></g><g id="SvgjsG1965" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1966" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g></g><g id="SvgjsG1919" class="apexcharts-annotations"></g><g id="SvgjsG1976" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><rect id="SvgjsRect1921" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect></svg><div class="apexcharts-legend" style="max-height: 20px;"></div></div></div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                            <div>
                                                                <a class="text-primary" href="javascript:void(0);">View All<i class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-sm-12">
                                        <div class="card custom-card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <span class="avatar avatar-md  bg-primary">
                                                            <svg fill="#ffffff" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 299 299" xml:space="preserve" stroke="#ffffff">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <g id="XMLID_1118_">
                                                                        <g>
                                                                            <g>
                                                                                <circle cx="248.535" cy="69.403" r="15.657">
                                                                                </circle>
                                                                                <path d="M257.529,206.705l-0.889,28.2c-0.162,5.143,3.959,9.418,9.131,9.418c4.909,0,8.965-3.901,9.121-8.843l1.009-32.039 c-1.319,0.619-2.673,1.165-4.068,1.626C267.225,206.592,262.481,207.095,257.529,206.705z">
                                                                                </path>
                                                                                <path d="M240.29,201.703c-4.278-2.159-8.456-4.971-12.405-8.421c-2.381-2.081-4.553-4.167-6.551-6.24 c-0.357,1.142-0.494,2.348-0.385,3.55l4.196,46.352c0.456,5.043,4.926,8.732,9.916,8.27c5.023-0.454,8.725-4.895,8.27-9.916 L240.29,201.703z">
                                                                                </path>
                                                                                <path d="M295.866,151.706c-2.141-0.467-4.262,0.896-4.727,3.041c-4.453,20.518-12.56,33.305-23.445,36.978 c-9.06,3.056-20.533-0.289-30.69-8.952c-13.71-11.694-19.561-23.811-21.851-30.089c-0.4-1.097-0.693-2.014-0.898-2.721 c0.865-1.245,1.573-2.608,2.093-4.059l18.616-2.844c1.965-0.3,3.734-1.357,4.929-2.945l19.049-25.299l-13.838,29.222 c-2.343,4.947-6.706,5.095-10.734,5.71l-0.445,12.214l-3.024,5.953c2.692,3.326,5.997,6.845,10.064,10.4 c1.13,0.987,2.366,1.955,3.68,2.865l9.052-17.821l5.194,0.189l-0.733,23.271c2.525,0.319,5.042,0.17,7.437-0.622 c4.165-1.378,7.932-4.727,11.162-9.81l0.383-12.174l0.081,0.003l2.14-58.748c0.23-6.324-4.709-11.637-11.033-11.868 l-20.419-0.744c-6.324-0.23-11.637,4.709-11.868,11.033l-0.423,11.614l11.167-9.84l-17.183,22.821l-14.927,2.28 c-3.105-4.911-8.571-8.141-14.734-8.141c-4.119,0-7.906,1.44-10.891,3.838l-16.424,9.912L161.92,79.971 c-0.648-3.416-3.634-5.888-7.111-5.888H39.518c-3.477,0-6.462,2.472-7.111,5.888l-11.423,60.198C8.651,145.4,0,157.619,0,171.859 v28.735c0,7.112,5.766,12.877,12.877,12.877H17.1v14.799c0,9.379,7.604,16.983,16.983,16.983c9.38,0,16.983-7.604,16.983-16.983 v-14.799h92.195v14.799c0,9.379,7.604,16.983,16.983,16.983s16.983-7.604,16.983-16.983v-14.799h4.222 c7.112,0,12.877-5.766,12.877-12.877v-28.735c0-6.654-1.89-12.867-5.161-18.131c2.973,2.345,6.718,3.744,10.772,3.744 c2.635,0,5.336-0.612,7.799-1.85c2.685,7.338,9.199,20.483,24.108,33.201c10.75,9.169,25.264,14.864,38.39,10.435 c13.875-4.682,23.522-19.091,28.672-42.825C299.374,154.288,298.012,152.171,295.866,151.706z M33.598,193.82 c-8.908,0-16.033-7.242-16.033-16.033c0-8.855,7.179-16.033,16.033-16.033c8.815,0,15.967,7.115,16.03,15.916 c0,0.039,0.003,0.078,0.003,0.117C49.631,186.642,42.453,193.82,33.598,193.82z M36.234,137.452l9.278-48.894h103.304 l9.278,48.894H36.234z M160.73,193.82c-8.855,0-16.033-7.179-16.033-16.033c0-0.039,0.003-0.077,0.003-0.116 c0.063-8.801,7.214-15.917,16.03-15.917c8.855,0,16.033,7.179,16.033,16.033C176.763,186.584,169.631,193.82,160.73,193.82z M177.864,142.498l4.66-2.813c-0.058,2.79,0.542,5.428,1.65,7.777C182.275,145.575,180.16,143.905,177.864,142.498z M199.939,149.522c-5.223,0-9.473-4.25-9.473-9.473c0-2.829,1.253-5.364,3.225-7.102c2.413-1.457,3.429-2.372,6.248-2.372 c1.966,0,3.793,0.603,5.308,1.631l-2.482,0.379c-4.154,0.634-7.007,4.516-6.373,8.67c0.575,3.765,3.817,6.46,7.512,6.46 c0.694,0,1.126-0.083,1.831-0.19C204.131,148.772,202.123,149.522,199.939,149.522z">
                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>                                        </span>
                                                    </div>
                                                    <div class="flex-fill ms-3">
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                            <div>
                                                                <h4 class="fw-semibold mb-0">Service Providers</h4>
                                                                <p class="text-muted mt-1">{{1,02,890}}</p>
                                                            </div>
                                                            <div id="crm-total-customers" style="min-height: 40px;"><div id="apexchartsdq1qpxvf" class="apexcharts-canvas apexchartsdq1qpxvf apexcharts-theme-light" style="width: 100px; height: 40px;"><svg id="SvgjsSvg1916" width="100" height="40" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1918" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1917"><clipPath id="gridRectMaskdq1qpxvf"><rect id="SvgjsRect1923" width="105.5" height="41.5" x="-2.75" y="-0.75" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskdq1qpxvf"></clipPath><clipPath id="nonForecastMaskdq1qpxvf"></clipPath><clipPath id="gridRectMarkerMaskdq1qpxvf"><rect id="SvgjsRect1924" width="104" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1929" x1="0" y1="1" x2="1" y2="1"><stop id="SvgjsStop1930" stop-opacity="0.9" stop-color="rgba(66,45,112,0.9)" offset="0"></stop><stop id="SvgjsStop1931" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="0.98"></stop><stop id="SvgjsStop1932" stop-opacity="0.9" stop-color="rgba(132,90,223,0.9)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1922" x1="0" y1="0" x2="0" y2="40" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="40" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1934" class="apexcharts-grid"><g id="SvgjsG1935" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1948" x1="0" y1="4" x2="100" y2="4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1949" x1="0" y1="8" x2="100" y2="8" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1950" x1="0" y1="12" x2="100" y2="12" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1951" x1="0" y1="16" x2="100" y2="16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1952" x1="0" y1="20" x2="100" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1953" x1="0" y1="24" x2="100" y2="24" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1954" x1="0" y1="28" x2="100" y2="28" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1955" x1="0" y1="32" x2="100" y2="32" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1956" x1="0" y1="36" x2="100" y2="36" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1936" class="apexcharts-gridlines-vertical" style="display: none;"><line id="SvgjsLine1938" x1="0" y1="0" x2="0" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1939" x1="12.5" y1="0" x2="12.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1940" x1="25" y1="0" x2="25" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1941" x1="37.5" y1="0" x2="37.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1942" x1="50" y1="0" x2="50" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1943" x1="62.5" y1="0" x2="62.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1944" x1="75" y1="0" x2="75" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1945" x1="87.5" y1="0" x2="87.5" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1946" x1="100" y1="0" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1959" x1="0" y1="40" x2="100" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1958" x1="0" y1="1" x2="0" y2="40" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1937" class="apexcharts-grid-borders" style="display: none;"><line id="SvgjsLine1947" x1="0" y1="0" x2="100" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1957" x1="0" y1="40" x2="100" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1925" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1926" class="apexcharts-series" seriesName="Value" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1933" d="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill="none" fill-opacity="1" stroke="url(#SvgjsLinearGradient1929)" stroke-opacity="1" stroke-linecap="butt" stroke-width="1.5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskdq1qpxvf)" pathTo="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" pathFrom="M 0 5.217391304347828C 4.375 5.217391304347828 8.125 15.65217391304348 12.5 15.65217391304348C 16.875 15.65217391304348 20.625 6.956521739130437 25 6.956521739130437C 29.375 6.956521739130437 33.125 22.608695652173914 37.5 22.608695652173914C 41.875 22.608695652173914 45.625 7.105427357601002e-15 50 7.105427357601002e-15C 54.375 7.105427357601002e-15 58.125 5.217391304347828 62.5 5.217391304347828C 66.875 5.217391304347828 70.625 1.7391304347826164 75 1.7391304347826164C 79.375 1.7391304347826164 83.125 24.347826086956523 87.5 24.347826086956523C 91.875 24.347826086956523 95.625 19.1304347826087 100 19.1304347826087" fill-rule="evenodd"></path><g id="SvgjsG1927" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1928" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1960" x1="0" y1="0" x2="100" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1961" x1="0" y1="0" x2="100" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1962" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1963" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1964" class="apexcharts-point-annotations"></g><g id="SvgjsG1965" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1966" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g></g><g id="SvgjsG1919" class="apexcharts-annotations"></g><g id="SvgjsG1976" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><rect id="SvgjsRect1921" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect></svg><div class="apexcharts-legend" style="max-height: 20px;"></div></div></div>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-1">
                                                            <div>
                                                                <a class="text-primary" href="javascript:void(0);">View All<i class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Inventory End -->
                        </div>

                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header justify-content-between">
                                            <div class="card-title">
                                                Deals Statistics
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <div>
                                                    <input class="form-control form-control-sm" type="text" placeholder="Search Here" aria-label=".form-control-sm example">
                                                </div>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Sort By<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-hover border table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="..."></th>
                                                            <th scope="col">Sales Rep</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Mail</th>
                                                            <th scope="col">Location</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel2" value="" aria-label="..."></th>
                                                            <td>
                                                                <div class="d-flex align-items-center fw-semibold">
                                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                        <img src="../assets/images/faces/4.jpg" alt="img">
                                                                    </span>Mayor Kelly
                                                                </div>
                                                            </td>
                                                            <td>Manufacture</td>
                                                            <td>mayorkelly@gmail.com</td>
                                                            <td>
                                                                <span class="badge bg-info-transparent">Germany</span>
                                                            </td>
                                                            <td>Sep 15 - Oct 12, 2023</td>
                                                            <td>
                                                                <div class="hstack gap-2 fs-15">
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel13" value="" aria-label="..." checked=""></th>
                                                            <td>
                                                                <div class="d-flex align-items-center fw-semibold">
                                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                        <img src="../assets/images/faces/15.jpg" alt="img">
                                                                    </span>Andrew Garfield
                                                                </div>
                                                            </td>
                                                            <td>Development</td>
                                                            <td>andrewgarfield@gmail.com</td>
                                                            <td>
                                                                <span class="badge bg-primary-transparent">Canada</span>
                                                            </td>
                                                            <td>Apr 10 - Dec 12, 2023</td>
                                                            <td>
                                                                <div class="hstack gap-2 fs-15">
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel4" value="" aria-label="..."></th>
                                                            <td>
                                                                <div class="d-flex align-items-center fw-semibold">
                                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                        <img src="../assets/images/faces/11.jpg" alt="img">
                                                                    </span>Simon Cowel
                                                                </div>
                                                            </td>
                                                            <td>Service</td>
                                                            <td>simoncowel234@gmail.com</td>
                                                            <td>
                                                                <span class="badge bg-danger-transparent">Europe</span>
                                                            </td>
                                                            <td>Sep 15 - Oct 12, 2023</td>
                                                            <td>
                                                                <div class="hstack gap-2 fs-15">
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel5" value="" aria-label="..." checked=""></th>
                                                            <td>
                                                                <div class="d-flex align-items-center fw-semibold">
                                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                        <img src="../assets/images/faces/8.jpg" alt="img">
                                                                    </span>Mirinda Hers
                                                                </div>
                                                            </td>
                                                            <td>Marketing</td>
                                                            <td>mirindahers@gmail.com</td>
                                                            <td>
                                                                <span class="badge bg-warning-transparent">USA</span>
                                                            </td>
                                                            <td>Apr 14 - Dec 14, 2023</td>
                                                            <td>
                                                                <div class="hstack gap-2 fs-15">
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="ps-4"><input class="form-check-input" type="checkbox" id="checkboxNoLabel3" value="" aria-label="..." checked=""></th>
                                                            <td>
                                                                <div class="d-flex align-items-center fw-semibold">
                                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                                        <img src="../assets/images/faces/9.jpg" alt="img">
                                                                    </span>Jacob Smith
                                                                </div>
                                                            </td>
                                                            <td>Social Plataform</td>
                                                            <td>jacobsmith@gmail.com</td>
                                                            <td>
                                                                <span class="badge bg-success-transparent">Singapore</span>
                                                            </td>
                                                            <td>Feb 25 - Nov 25, 2023</td>
                                                            <td>
                                                                <div class="hstack gap-2 fs-15">
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    Showing 5 Entries <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
                                                </div>
                                                <div class="ms-auto">
                                                    <nav aria-label="Page navigation" class="pagination-style-4">
                                                        <ul class="pagination mb-0">
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="javascript:void(0);">
                                                                    Prev
                                                                </a>
                                                            </li>
                                                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link text-primary" href="javascript:void(0);">
                                                                    next
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-3 col-xl-3">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Recent Activity
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            View All<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">Today</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <ul class="list-unstyled mb-0 crm-recent-activity">
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-primary-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span class="fw-semibold">Update of calendar events &amp;</span><span><a href="javascript:void(0);" class="text-primary fw-semibold"> Added new events in next week.</a></span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">4:45PM</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-secondary-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>New theme for <span class="fw-semibold">Spruko Website</span> completed</span>
                                        <span class="d-block fs-12 text-muted">Lorem ipsum, dolor sit amet.</span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">3 hrs</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-success-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>Created a <span class="text-success fw-semibold">New Task</span> today <span class="avatar avatar-xs bg-purple-transparent avatar-rounded ms-1"><i class="ri-add-fill text-purple fs-12"></i></span></span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">22 hrs</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-pink-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>New member <span class="badge bg-pink-transparent">@andreas gurrero</span> added today to AI Summit.</span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">Today</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-warning-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>32 New people joined summit.</span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">22 hrs</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-info-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>Neon Tarly added <span class="text-info fw-semibold">Robert Bright</span> to AI summit project.</span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">12 hrs</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-dark-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>Replied to new support request <i class="ri-checkbox-circle-line text-success fs-16 align-middle"></i></span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">4 hrs</span>
                                    </div>
                                </div>
                            </li>
                            <li class="crm-recent-activity-content">
                                <div class="d-flex align-items-top">
                                    <div class="me-3">
                                        <span class="avatar avatar-xs bg-purple-transparent avatar-rounded">
                                            <i class="bi bi-circle-fill fs-8"></i>
                                        </span>
                                    </div>
                                    <div class="crm-timeline-content">
                                        <span>Completed documentation of <a href="javascript:void(0);" class="text-purple text-decoration-underline fw-semibold">AI Summit.</a></span>
                                    </div>
                                    <div class="flex-fill text-end">
                                        <span class="d-block text-muted fs-11 op-7">4 hrs</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_after')
    <script>
        axios.get("{{ route('get_count') }}")
            .then(response => {
                console.log(response.data);
                var data = response.data;
                Object.entries(data).forEach(([key, value]) => {
                    console.log(key + ': ' + value);
                    $(`.${ key }`).html(value);
                    // Perform actions on each property
                });

            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
