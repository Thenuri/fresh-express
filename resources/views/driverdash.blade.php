<x-app-layout>
   <div class="m-10">
      <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
         <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">New Orders</h3>
            <div class="block w-full overflow-x-auto">
               <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                     <tr>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Address</th>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                     </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-100">
                        <tr class="text-gray-500">
                           <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">1</th>
                           <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">pasindu</td>
                           <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thalawathugoda</td>
                           <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                              <x-buttondash>
                                  {{ __('Deliverd') }}
                              </x-buttondash>
                            </td>
                        </tr>
                        <tr class="text-gray-500">
                           <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">2</th>
                           <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thenuri</td>
                           <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">dehiwala</td>
                           <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                              <x-buttondash>
                                  {{ __('Deliverd') }}
                              </x-buttondash>
                            </td>
                        </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <br>
         <div class="bg-white shadow rounded-lg p-7 sm:p-6 xl:p-8 ">
            <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Previous Orders</h3>
               <div class="block w-full overflow-x-auto">
                  <table class="items-center w-full bg-transparent border-collapse">
                     <thead>
                        <tr>
                           <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Order Id</th>
                           <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                           <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Address</th>
                        </tr>
                     </thead>
                     <tbody class="divide-y divide-gray-100">
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">1</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">pasindu</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thalawathugoda</td>
                              
                           </tr>
                           <tr class="text-gray-500">
                              <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">2</th>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thenuri</td>
                              <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">dehiwala</td>
                              
                           </tr>
                     </tbody>
                  </table>
               </div>
            </div>
          
   </div>
    
</x-app-layout>
