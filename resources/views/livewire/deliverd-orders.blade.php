<div class="m-10">
    <div class="bg-white shadow rounded-lg p-7 sm:p-6 xl:p-8 ">
       <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Delivered Orders</h3>
       <div class="block w-full overflow-x-auto">
          <table class="items-center w-full bg-transparent border-collapse">
             <thead>
                <tr>
                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Address</th>
                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">ZIP Code</th>
                   <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Phone Number</th>
                </tr>
             </thead>
             <tbody class="divide-y divide-gray-100">
                @foreach($previousOrders as $order)
                <tr class="text-gray-500">
                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">{{$order->order_number}}</th>
                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->customer->name }}</td>
                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->delivery_address}}</td>
                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->ZIP_code}}</td>
                   <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">{{$order->customer->phone}}</td>  
                </tr>
               @endforeach
             </tbody>
          </table>
       </div>
    </div>  
 </div>