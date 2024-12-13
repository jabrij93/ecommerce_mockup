@php
$role = Auth::user()-> role ?? null
@endphp

<x-app-layout>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("openModal").addEventListener("click", function() {
                document.getElementById("myModal").classList.remove("hidden");
            });
            document.getElementById("closeModal").addEventListener("click", function() {
                document.getElementById("myModal").classList.add("hidden");
            });
        });
    </script>

    <!-- Add Item Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>

        <div class="modal-container bg-white w-96 mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-header py-4 px-6 border-b">
                <h2 class="font-semibold text-xl">Add Item</h2>
            </div>

            <div class="modal-body py-4 px-6">
                <form method="POST" action="/sales" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <input type="hidden" name="user_id" value=" {{ Auth::user()->id }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Item</label>
                        <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Type</label>
                        <input type="text" name="type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" name="images" class="mt-1 block w-full">
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add</button>
                        <button type="button" class="ml-2 text-gray-500 hover:text-gray-700" id="closeModal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Item Modal -->

    <div class="flex flex-col mt-6 ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="flex flex-col items-start shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">

                    <div class="mb-6 mx-24">
                        <button type="submit" class="bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 hover:bg-gray-600"> Category </button>
                    </div>

                    <div class="mb-6 mx-24">
                        <button type="button" class="bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 hover:bg-gray-600" id="openModal">Add Item</button>
                    </div>

                    <table class="min-w-0 mx-24 mb-14 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Item
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @php    
                                $no = 1;
                            @endphp
                            @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $no++ }}  </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('item.detail', ['id' => $cartItem->id]) }}" class="text-sm text-gray-900">
                                            {{ $cartItem->name }}
                                        </a>
                                    </td>
                                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $cartItem->name }} </div>
                                    </td> -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $cartItem->types ?? 'N/A' }} </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <img src="{{ asset('storage/item_images/' . $cartItem->images) }}" alt="Item Image" style="max-width: 200px; max-height: 150px;">
                                    </td> 
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"> {{ $cartItem->price }} </div>
                                    </td>
                                    @if (!$cartItem->is_available)
                                        <p class="text-red-500">This item is no longer available for sale.</p>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <a href="detail" class="flex items-center mr-3" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                            <a href="users/profile/edit/" class="flex items-center" title="Edit">
                                                <i class="fas fa-edit mr-2"></i>
                                            </a>
                                            <a href="users/profile/delete/" class="flex items-center" title="Delete" onclick="return confirm('Confirm to delete data?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            
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
</x-app-layout>