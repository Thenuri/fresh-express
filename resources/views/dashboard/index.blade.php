<x-admin>
    <div class="pt-6 px-4">
        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"> LKR.{{ $weeklyRevenue->last()->total_revenue }}.00</span>

                        <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
                    </div>
                    {{-- <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        12.5%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div> --}}
                </div>
                {{-- <div id="main-chart"></div> --}}
                <canvas id="weeklyRevenueChart" width="400" height="390"></canvas>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span
                                class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $mostOrderedProduct->name }}</span>
                            <h3 class="text-base font-normal text-gray-500">Most Picked Product</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 14 14">
                                <path fill="none" stroke="orange" stroke-linecap="round" stroke-linejoin="round"
                                    d="M12.88 12.39a1 1 0 0 1-.25.78a1 1 0 0 1-.75.33H2.12a1 1 0 0 1-.75-.33a1 1 0 0 1-.25-.78L2 4.5h10ZM4.5 4.5V3a2.5 2.5 0 0 1 5 0v1.5" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow mt-4 rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span
                                class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $mostOrderedProduct->category }}</span>
                            <h3 class="text-base font-normal text-gray-500">Most Picked Category</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                                <path fill="orange"
                                    d="M6.5 11L12 2l5.5 9h-11Zm11 11q-1.875 0-3.188-1.313T13 17.5q0-1.875 1.313-3.188T17.5 13q1.875 0 3.188 1.313T22 17.5q0 1.875-1.313 3.188T17.5 22ZM3 21.5v-8h8v8H3Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white mt-4 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span
                                class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $cartCount }}</span>
                            <h3 class="text-base font-normal text-gray-500">Number of carts</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                                <g fill="orange">
                                    <path
                                        d="M8.418 3.25c.28-.59.884-1 1.582-1h4c.698 0 1.301.41 1.582 1c.683.006 1.216.037 1.692.223a3.25 3.25 0 0 1 1.426 1.09c.367.494.54 1.127.776 1.998l.037.136l.002.007l.874 3.324l.012-.017c.042.045.082.093.121.143c.901 1.154.472 2.87-.386 6.301c-.078.313-.15.603-.22.873l-2.477-2.973l1.83-2.685l-.505-1.922l-2.324 3.409L12.976 9h1.34c1.893 0 3.28 0 4.298.177l-.549-2.088c-.29-1.064-.393-1.395-.57-1.632a1.75 1.75 0 0 0-.767-.587c-.22-.086-.486-.111-1.148-.118A1.75 1.75 0 0 1 14 5.75h-4a1.75 1.75 0 0 1-1.58-.998c-.662.007-.928.032-1.148.118a1.75 1.75 0 0 0-.768.587c-.176.237-.279.568-.57 1.632l-.548 2.088C6.404 9 7.791 9 9.685 9h1.339L7.56 13.157L5.236 9.748L4.73 11.67l1.83 2.685l-2.477 2.973c-.07-.27-.142-.56-.22-.873c-.858-3.431-1.287-5.147-.386-6.301c.039-.05.08-.098.121-.143l.012.017l.874-3.324l.002-.007l.037-.136c.237-.871.41-1.505.776-1.999a3.25 3.25 0 0 1 1.426-1.089c.476-.186 1.008-.217 1.692-.222Z" />
                                    <path
                                        d="M4.602 19.05c.233.593.5 1.007.894 1.315C6.31 21 7.435 21 9.685 21h1.407L7.44 15.644l-2.838 3.405ZM12.908 21h1.407c2.25 0 3.375 0 4.189-.635c.394-.308.661-.722.894-1.316l-2.838-3.405L12.908 21ZM12 19.669l-3.561-5.224L12 10.172l3.561 4.273L12 19.67Z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white mt-4 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span
                                class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $orderCount }}</span>
                            <h3 class="text-base font-normal text-gray-500">Number of orders</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 32 32">
                                <path fill="orange"
                                    d="M29.02 11.754L8.416 9.474L7.16 4.715a.758.758 0 0 0-.727-.558H3.34a1.214 1.214 0 0 0-.963-.49a1.24 1.24 0 1 0 0 2.483c.4 0 .738-.2.965-.492h2.512l5.23 19.8a3.282 3.282 0 0 0-.89 2.242a3.29 3.29 0 0 0 3.292 3.293a3.296 3.296 0 0 0 3.297-3.293a3.19 3.19 0 0 0-.093-.743h5.533a3.25 3.25 0 0 0-.092.743c0 1.82 1.476 3.293 3.296 3.293S28.72 29.52 28.72 27.7a3.296 3.296 0 0 0-3.294-3.297c-.95 0-1.8.41-2.402 1.053h-7.136a3.276 3.276 0 0 0-2.402-1.053c-.38 0-.738.078-1.077.196l-.182-.686H26.81a2.5 2.5 0 0 0 2.39-1.96l1.575-7.798a2.17 2.17 0 0 0 .04-.414a1.995 1.995 0 0 0-1.795-1.988zm-3.592 16.24a.298.298 0 0 1-.297-.295c.003-.166.135-.298.298-.298s.295.132.297.297a.298.298 0 0 1-.297.294zm1.78-7.495l.948-.95l-.318 1.58l-.63-.63zm-14.453-9.037L13.79 12.5l-1.29 1.29l-1.293-1.29l1.087-1.088l.46.05zm4.498.498l.538.54l-1.29 1.29l-1.293-1.29l.688-.69l1.358.15zM9.63 14.076l.87-.868l1.29 1.292l-1.29 1.29l-.565-.563l-.304-1.152zm-.295-1.12l-.328-1.24l.785.785l-.457.456zM21.79 16.5l-1.29 1.29l-1.293-1.29l1.292-1.293l1.29 1.292zm-.583-2l1.292-1.292l1.29 1.292l-1.29 1.292l-1.293-1.292zM18.5 15.79l-1.293-1.29l1.292-1.293l1.29 1.292l-1.29 1.29zm-.71.71l-1.29 1.29l-1.292-1.29l1.292-1.293l1.29 1.292zm-3.29-.71l-1.293-1.29l1.292-1.293l1.29 1.292l-1.29 1.29zm-.71.71l-1.29 1.29l-1.293-1.29l1.292-1.293l1.29 1.292zm-3.29.707l1.29 1.292l-.784.783l-.54-2.044l.033-.033zm.802 3.197l1.197-1.197l1.29 1.292l-1.29 1.29l-1.13-1.13l-.068-.256zm1.906-1.905l1.29-1.293l1.293 1.292l-1.29 1.29l-1.292-1.29zm3.292.707l1.292 1.292l-1.292 1.29l-1.292-1.29l1.292-1.293zm.708-.708l1.292-1.293l1.29 1.292l-1.29 1.29l-1.292-1.29zm3.29.707l1.293 1.292l-1.29 1.29l-1.292-1.292l1.29-1.29zm.71-.708l1.29-1.293l1.293 1.292l-1.29 1.29l-1.293-1.29zm2-2l1.29-1.293l1.293 1.292l-1.29 1.29l-1.293-1.29zm2-2l1.29-1.293L27.79 14.5l-1.29 1.292l-1.293-1.293zm-.71-.708l-1.155-1.156l2.082.23l-.926.926zM21.792 12.5l-1.29 1.292l-1.293-1.292l.29-.29l2.253.25l.04.04zm-7.29-.71l-.152-.15l.273.03l-.12.12zm-4 .002l-.65-.65l1.17.13l-.52.52zm4 9.415l1.205 1.205h-2.41l1.205-1.205zm4 0l1.205 1.206h-2.412l1.206-1.206zm4 0l1.207 1.207h-2.414l1.206-1.207zm.707-.708l1.292-1.293l1.29 1.292l-1.29 1.29l-1.293-1.29zm2-2l1.292-1.292l1.29 1.29l-1.29 1.293l-1.293-1.29zm3.292-.71l-1.292-1.29l1.29-1.292l.445.444l-.43 2.124l-.014.015zm.5-4.5l-.5.5l-.66-.657l1.017.112c.054.008.1.026.144.044zM13.488 27.993a.297.297 0 0 1 0-.593a.296.296 0 0 1 0 .591zm13.323-5.58h-1.517l1.207-1.207l.93.93c-.187.17-.423.29-.62.277z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white mt-4 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span
                                class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $supplierCount }}</span>
                            <h3 class="text-base font-normal text-gray-500">Total Suppliers</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 256 256"><path fill="orange" d="m251.14 115.54l-14-35A19.89 19.89 0 0 0 218.58 68H188v-4a12 12 0 0 0-12-12H24A20 20 0 0 0 4 72v112a20 20 0 0 0 20 20h14.06a36 36 0 0 0 67.88 0h44.12a36 36 0 0 0 67.88 0H232a20 20 0 0 0 20-20v-64a21.7 21.7 0 0 0-.86-4.46ZM188 92h27.88l6.4 16H188ZM72 204a12 12 0 1 1 12-12a12 12 0 0 1-12 12Zm92-41.92A36.32 36.32 0 0 0 150.06 180h-44.12a36 36 0 0 0-67.88 0H28v-40h136Zm0-46.08H28V76h136Zm20 88a12 12 0 1 1 12-12a12 12 0 0 1-12 12Zm44-24h-10.06A36.09 36.09 0 0 0 188 156.23V132h40Z"/></svg>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $employeesCount }}</span>
                        <h3 class="text-base font-normal text-gray-500">Number Of Employees</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                            <g id="clarityEmployeeLine0" fill="gray">
                                <path
                                    d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7Zm0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5ZM22 17.9a25.41 25.41 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.91 22.91 0 0 1 9.7-2.11a23.58 23.58 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z" />
                                <path
                                    d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1Z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $customersCount }}</span>
                        <h3 class="text-base font-normal text-gray-500">Total Customers</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <g fill="gray" fill-rule="evenodd" clip-rule="evenodd">
                                <path
                                    d="M8.609 36.987C5.32 33.378 3.32 28.614 3.32 23.39c0-11.264 9.297-20.395 20.765-20.395c11.467 0 20.764 9.131 20.764 20.395c0 7.965-4.65 14.86-11.427 18.218a29.984 29.984 0 0 1-13.898 3.387c-6.152 0-11.868-1.839-16.608-4.987c0 0 3.179-.347 5.69-3.022h.002Zm25.23-3.502c5.373-5.371 5.373-14.08 0-19.453a13.703 13.703 0 0 0-8.96-4.007c-.098-2.447 1.219-4.099 1.225-4.107h-.001l.001-.001a19.71 19.71 0 0 0-10.228 5.439a19.721 19.721 0 0 0-4.755 7.641c.138-.366.293-.728.463-1.084c-.196.5-.373 1.01-.533 1.532c-1.573 4.776-.463 10.242 3.335 14.04c5.372 5.372 14.082 5.372 19.454 0Z" />
                                <path
                                    d="M17.13 22.345v2.847a2.057 2.057 0 1 0 4.114 0v-2.847a2.057 2.057 0 1 0-4.114 0Zm10.183 0v2.847a2.057 2.057 0 0 0 4.114 0v-2.847a2.057 2.057 0 0 0-4.114 0Z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $driversCount }}</span>
                        <h3 class="text-base font-normal text-gray-500">Number of Drivers</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 15 15">
                            <path fill="gray"
                                d="M13.84 6.852L12.6 5.7l-1.1-2.2a1.05 1.05 0 0 0-.9-.5H4.4a1.05 1.05 0 0 0-.9.5L2.4 5.7L1.16 6.852a.5.5 0 0 0-.16.367V11.5a.5.5 0 0 0 .5.5h2c.2 0 .5-.2.5-.4V11h7v.5c0 .2.2.5.4.5h2.1a.5.5 0 0 0 .5-.5V7.219a.5.5 0 0 0-.16-.367ZM4.5 4h6l1 2h-8ZM5 8.6c0 .2-.3.4-.5.4H2.4c-.2 0-.4-.3-.4-.5V7.4c.1-.3.3-.5.6-.4l2 .4c.2 0 .4.3.4.5Zm8-.1c0 .2-.2.5-.4.5h-2.1c-.2 0-.5-.2-.5-.4v-.7c0-.2.2-.5.4-.5l2-.4c.3-.1.5.1.6.4Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $productsCount }}</span>
                        <h3 class="text-base font-normal text-gray-500">Number of Products</h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 14 14">
                            <path fill="none" stroke="gray" stroke-linecap="round" stroke-linejoin="round"
                                d="M12.88 12.39a1 1 0 0 1-.25.78a1 1 0 0 1-.75.33H2.12a1 1 0 0 1-.75-.33a1 1 0 0 1-.25-.78L2 4.5h10ZM4.5 4.5V3a2.5 2.5 0 0 1 5 0v1.5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4  mt-4 sm:p-6 h-full">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                    {{-- <a href="#"
                        class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        View all
                    </a> --}}
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($latestOrders as $order)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 rounded-full" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24">
                                            <g fill="none" stroke="orange" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <circle cx="12" cy="8" r="5" fill="orange" />
                                                <path d="M20 21a8 8 0 1 0-16 0" />
                                                <path fill="orange" d="M12 13a8 8 0 0 0-8 8h16a8 8 0 0 0-8-8z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $order->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            <a href="mailto:{{ $order->user->email }}"
                                                class="__cf_email__">{{ $order->user->email }}</a>
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                        LKR.{{ $order->total }}.00
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-4 mt-4 sm:p-6 xl:p-8">
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Product sales</h3>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Product</th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Sales</th>
                                <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($productSales as $productId => $totalSales)
                            <tr class="text-gray-500">
                                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">
                                    {{ $products->find($productId)->name }}
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">
                                    {{ $totalSales }}
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        {{-- Progress bar --}}
                                        <div class="relative w-full">
                                            <div class="w-full bg-gray-200 rounded-sm h-2">
                                                <div class="bg-cyan-600 h-2 rounded-sm" style="width: 30%"></div>
                                            </div>
                                        </div>
                                
                                        {{-- Progress percentage text --}}
                                        <span class="ml-2 text-xs font-medium"></span>
                                    </div>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        <div class="bg-white shadow rounded-lg p-4 mt-8 sm:p-6 xl:p-8">
            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Category Sales</h3>
            <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Category</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Sales</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                            @foreach ($categorySales as $category => $sales)
                            <tr>
                                <td class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{ $category }}</td>
                                <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{ $sales }}</td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        {{-- Progress bar --}}
                                        <div class="relative w-full">
                                            <div class="w-full bg-gray-200 rounded-sm h-2">
                                                <div class="bg-red-600 h-2 rounded-sm" style="width: 30%"></div>
                                            </div>
                                        </div>
                                
                                        {{-- Progress percentage text --}}
                                        <span class="ml-2 text-xs font-medium"></span>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</x-admin>

<script>
    var weeklyRevenueData = @json($weeklyRevenue);
    // var salesData = @json($productSales);

      // Get the progress bar element
    //   var progressBar = document.querySelector('.bg-cyan-600');

    //     // Update the progress bar's width based on sales data
    //     progressBar.style.width = salesData + '%';

    var labels = weeklyRevenueData.map(function (data) {
        return 'Week ' + data.week_number;
    });

    var revenueValues = weeklyRevenueData.map(function (data) {
        return data.total_revenue;
    });

    var ctx = document.getElementById('weeklyRevenueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // You can change the chart type (e.g., 'bar', 'pie', etc.)
        data: {
            labels: labels,
            datasets: [{
                label: 'Weekly Revenue',
                data: revenueValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Change the chart color as needed
                borderColor: 'rgba(75, 192, 192, 1)', // Change the border color as needed
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Revenue'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Week'
                    }
                }
            }
        }
    });
</script>

