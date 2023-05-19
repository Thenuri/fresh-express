<x-admin>
   <div class="m-10">
      <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
         <div class="max-w-2xl mx-auto">
            <form class="flex items-center">   
               <label for="simple-search" class="sr-only">Search</label>
               <div class="relative w-full">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                     <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                  </div>
                  <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
               </div>
               <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-yellow-400 rounded-lg border border-yellow-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
            </form>   
         </div>
         <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Products</h3>
         <div class="block w-full overflow-x-auto">
         <table class="items-center w-full bg-transparent border-collapse">
            <thead>
               <tr>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Product Id</th>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Product Name</th>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Quantity</th>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Price</th>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                  <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
               </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
               <tr class="text-gray-500">
                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">1</th>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">garlic</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">1g</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">Rs 100.00</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                     <x-buttondash>
                        {{ __('Delete') }}
                     </x-buttondash>
                  </td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                     <x-buttondash>
                        {{ __('Update') }}
                     </x-buttondash>
                  </td>
               </tr>
               <tr class="text-gray-500">
                  <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left">2</th>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">pumkin</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">2kg</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">tomato</td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                     <x-buttondash>
                        {{ __('Delete') }}
                     </x-buttondash>
                  </td>
                  <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4">     
                     <x-buttondash>
                        {{ __('Update') }}
                     </x-buttondash>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
   <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</x-admin>




<!-- This is an example component -->
