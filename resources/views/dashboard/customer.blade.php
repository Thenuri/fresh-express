<x-admin>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
              <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Customers</h3>
              <div class="block w-full overflow-x-auto">
                 <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                       <tr>
                        <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Customer Name</th>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Address</th>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Phone Number</th>
                          <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                       </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                       <tr class="text-gray-500">
                          <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">Nimal mendis</th>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">thalawathugoda</td>
                          <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">0778457892</td>
                          <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                            <x-button>
                                {{ __('More') }}
                            </x-button>
                          </td>
                       </tr>
                       
                    </tbody>
                 </table>
              </div>
           </div> 


</x-admin>    