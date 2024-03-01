<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transactions-paypal</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="admin/assets/css/tailwind.output.css" />
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script>
    <script src="admin/assets/js/init-alpine.js"></script>
</head>
<body>
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen}"
>
    @include('admin.sidebar')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <!-- CTA -->
            <a
                class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="/"
            >
                <div class="flex items-center">
                    <svg
                        class="w-5 h-5 mr-2"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        ></path>
                    </svg>
                    <span>Finalised jobs</span>
                </div>
                <span>View more &RightArrow;</span>
            </a>
            <!-- With actions -->
            <h4
                class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
                Table for applications made
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Application ID</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Job ID</th>
                            <th class="px-4 py-3">Payment method</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Created at</th>
                        </tr>
                        </thead>
                        <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        @foreach($transaction as $n)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div
                                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                        >
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{$n->id}}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$n->transaction_id}}
                                </td>
                                <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          {{$n->status}}
                        </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$n->job_id}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$n->Payment_Method}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a>{{$n->calculated_column}}</a>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a>{{$n->created_at}}</a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                        >
                          <svg
                              class="w-4 h-4 fill-current"
                              aria-hidden="true"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next"
                        >
                          <svg
                              class="w-4 h-4 fill-current"
                              aria-hidden="true"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
</body>



{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <!-- Required meta tags -->--}}
{{--    <meta charset="utf-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />--}}
{{--    <title>Breeze Admin</title>--}}
{{--    @include('admin.style')--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container-scroller">--}}
{{--    @include('admin.sidebar')--}}
{{--    <div class="container-fluid page-body-wrapper">--}}
{{--        <div id="theme-settings" class="settings-panel">--}}
{{--            <i class="settings-close mdi mdi-close"></i>--}}
{{--            <p class="settings-heading">SIDEBAR SKINS</p>--}}
{{--            <div class="sidebar-bg-options selected" id="sidebar-default-theme">--}}
{{--                <div class="img-ss rounded-circle bg-light border mr-3"></div> Default--}}
{{--            </div>--}}
{{--            <div class="sidebar-bg-options" id="sidebar-dark-theme">--}}
{{--                <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark--}}
{{--            </div>--}}
{{--            <p class="settings-heading mt-2">HEADER SKINS</p>--}}
{{--            <div class="color-tiles mx-0 px-4">--}}
{{--                <div class="tiles light"></div>--}}
{{--                <div class="tiles dark"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @include('admin.navbar')--}}
{{--        <div class="main-panel">--}}
{{--            <div class="content-wrapper">--}}
{{--                <div class="page-header">--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12 grid-margin stretch-card">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <h4 class="card-title">Paypal transactions Table</h4>--}}
{{--                                <div class="table-responsive">--}}
{{--                                        <table class="table table-striped">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Id</th>--}}
{{--                                                <th>Transaction ID</th>--}}
{{--                                                <th>Payment Status</th>--}}
{{--                                                <th>Payment Method</th>--}}
{{--                                                <th>Job ID</th>--}}
{{--                                                <th>Amount</th>--}}
{{--                                                <th>Created at</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            @foreach($transaction as $n)--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{$n->id}}</td>--}}
{{--                                                    <td>{{$n->transaction_id}}</td>--}}
{{--                                                    <td>{{$n->status}}</td>--}}
{{--                                                    <td>{{$n->Payment_Method}}</td>--}}
{{--                                                    <td>{{$n->job_id}}</td>--}}
{{--                                                    <td>KES {{$n->calculated_column}}</td>--}}
{{--                                                    <td>{{$n->created_at}}</td>--}}
{{--                                                </tr>--}}
{{--                                            @endforeach--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <footer class="footer">--}}
{{--                    <div class="d-sm-flex justify-content-center justify-content-sm-between">--}}
{{--                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="/" target="_blank">nbcodes</a>--}}
{{--                    </div>--}}
{{--                </footer>--}}
{{--            </div>--}}
{{--            <!-- main-panel ends -->--}}
{{--        </div>--}}
{{--        <!-- page-body-wrapper ends -->--}}
{{--    </div>--}}
{{--    <!-- container-scroller -->--}}
{{--    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>--}}
{{--    <script src="../../assets/js/off-canvas.js"></script>--}}
{{--    <script src="../../assets/js/hoverable-collapse.js"></script>--}}
{{--    <script src="../../assets/js/misc.js"></script>--}}
{{--</body>--}}
{{--</html>--}}
{{--<style>--}}
{{--    .dropdown {--}}
{{--        position: relative;--}}
{{--        display: inline-block;--}}
{{--    }--}}

{{--    .dropdown-content {--}}
{{--        display: none;--}}
{{--        position: absolute;--}}
{{--        z-index: 1;--}}
{{--        background-color: black; /* Set the background color to black */--}}
{{--        color: white; /* Set the text color to white */--}}
{{--    }--}}

{{--    .dropdown:hover .dropdown-content {--}}
{{--        display: block;--}}
{{--    }--}}


{{--</style>--}}

