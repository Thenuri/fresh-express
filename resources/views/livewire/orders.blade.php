<div class="m-10">
    @if (session()->has('message'))
        <div class="flex items-center bg-orange-500 text-white text-sm font-bold px-4 py-3 relative" role="alert"
            x-data="{ show: true }" x-show="show">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('message') }}</p>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="show = false">
                <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('[x-data="{ show: true }"]').remove();
            }, 2000); // 5000 milliseconds = 5 seconds
        </script>
    @endif
<div>
    <div class="m-10">
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">New Orders</h3>
               <div class="block w-full overflow-x-auto">
                  <table class="items-center w-full bg-transparent border-collapse">
                     <thead>
                        <tr>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Order Number</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">City</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Delivery Address</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">ZiP Code</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Delivery Type</th>
                         
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Ordered Products</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Status</th>
                            <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                        </tr>
                        </tr>
                     </thead>
                     <tbody class="divide-y divide-gray-100">
                        @foreach($newOrders as $order)
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{$order->id}}</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->order_number}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->user->name}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->city}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->delivery_address}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->ZIP_code}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->delivery_type}}</td>
                                <td  class="border-t-0 px-4 align-middle text-xs  font-medium text-gray-900  whitespace-nowrap p-4">
                                        <ul>
                                        @foreach($order->products as $product)
                                        <li>{{$product->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->status}}</td>


                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                                 <x-buttondash wire:click="dispatchOrder({{ $order->id }})">
                                     {{ __('Dispatch') }}
                                 </x-buttondash>
                               </td>
                               <td class="border-t-0  px-2 py-3 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                                <x-danger-button>
                                    {{ __('Cancel') }}
                                </x-danger-button>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <br>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Previous Orders</h3>
                   <div class="block w-full overflow-x-auto">
                      <table class="items-center w-full bg-transparent border-collapse">
                         <thead>
                            <tr>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Order Number</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">City</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Delivery Address</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">ZiP Code</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Delivery Type</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Ordered Products</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Status</th>
                               <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                            </tr>
                            </tr>
                         </thead>
                         
                         <tbody class="divide-y divide-gray-100">
                              @foreach($previousOrders as $order)
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{$order->id}}</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->order_number}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->user->name}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->city}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->delivery_address}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->ZIP_code}}</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->delivery_type}}</td>
                                <td  class="border-t-0 px-4 align-middle text-xs  font-medium text-gray-900  whitespace-nowrap p-4">
                                        <ul>
                                        @foreach($order->products as $product)
                                        <li>{{$product->name}}</li>
                                        @endforeach
                                        </ul>
                                    </td>  
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->status}}</td>
                           </tr>
                        @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
                <br>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Canceled Orders</h3>
                       <div class="block w-full overflow-x-auto">
                          <table class="items-center w-full bg-transparent border-collapse">
                             <thead>
                                <tr>
                                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Address</th>
                                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Ordered Products</th>
                                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                                </tr>
                                </tr>
                             </thead>
                             <tbody class="divide-y divide-gray-100">
                                   <tr class="text-gray-500">
                                      <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">1</th>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">pasindu</td>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thalawathugoda</td>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">tomato,beens,garlic</td>
                                   <tr class="text-gray-500">
                                      <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">2</th>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thenuri</td>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">dehiwala</td>
                                      <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">tomato,beens,garlic</td>
                                   </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
</div>
