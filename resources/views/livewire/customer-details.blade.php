<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>
    <div class="h-full bg-gray-200 p-8">
        <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
            <div class="w-full flex flex-col 2xl:w-1/3">
                <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                    @if($users)
                    <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                    <ul class="mt-2 text-gray-700">
                        <li class="flex border-y py-2">
                            <span class="font-bold w-24">Full name:</span>
                            <span class="text-gray-700">{{$users->name}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Birthday:</span>
                            <span class="text-gray-700">{{$users->dob}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Joined:</span>
                            <span class="text-gray-700">{{$users->created_at}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Mobile:</span>
                            <span class="text-gray-700">{{$users->phone}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Email:</span>
                            <span class="text-gray-700">{{$users->email}}</span>
                        </li>
                        <li class="flex border-b py-2">
                            <span class="font-bold w-24">Location:</span>
                            <span class="text-gray-700">{{$users->address}}</span>
                        </li>
                        <!-- Add more user details as needed -->
                    </ul>
                    @else
                    <p>User not found</p>
                    @endif
                </div>
                <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Purchase History</h4>
                    <!-- component -->
                        <div class="flex  flex-col items-start px-4 py-6">
                            @foreach($orders as $order)
                            {{-- <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="avatar"> --}}
                            <div class="mt-4 border-2 container  rounded space-x-8 ">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{$order->order_number}}</h2>
                                    <small class="text-sm text-gray-700">{{$order->created_at}}</small>
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-gray-700">
                                        <span class="font-semibold">Delivery Address:</span>
                                         {{$order->delivery_address}} </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold">City:</span>
                                        {{$order->city}} </p>
                                    <p class="text-gray-700">
                                        <span class="font-semibold">ZIP_code</span>
                                        {{$order->ZIP_code}} </p>
                                </div>    
                                <p class="mt-3 text-gray-700 text-sm">
                                    <span class="font-bold">Products: </span>
                                    @foreach ($order->products as $product)
                                    {{  $product->name }}@if (!$loop->last), @endif
                                     @endforeach
                                </p>
                            </div>
                            @endforeach
                        </div>
                </div>
                <div class="flex-1 mt-5 bg-white rounded-lg shadow-xl p-8">
                    <h4 class="text-xl text-gray-900 font-bold">Address Book</h4>
                    <ul class="mt-2 text-gray-700">
                        @if(isset($order))
                            <li class="flex border-y py-2">
                                <span class="font-bold w-50">Delivery_Address:</span>
                                <span class="text-gray-700">{{$order->delivery_address}}</span>
                            </li>
                        @else
                        <span class="font-bold w-50">Delivery_Address:</span>
                        <span class="text-gray-700">No delivery address found</span>
                        @endif

                        <li class="flex border-b py-2">
                            <span class="font-bold w-16">Address:</span>
                            <span class="text-gray-700">{{$users->address}}</span>
                        </li>
                        <!-- Add more user details as needed -->
                    </ul>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
