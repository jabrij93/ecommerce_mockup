@php
$role = Auth::user()-> role ?? null
@endphp

<x-app-layout>
    <script>
        // Retrieve existing item information to be used in update/edit form
        async function fetchItemData(itemID) {
            try {
                const response = await axios.get(`http://localhost:8000/api/get-items/${itemID}`); // Adjust the URL according to your backend API
                return response.data; // Assuming your API returns JSON data
            } catch (error) {
                console.error("Error fetching item data:", error);
                return {}; // Return an empty object if there's an error
            }
        }

        // Logic for Add Item and Update Item Button
        document.addEventListener("DOMContentLoaded", function () {
            const openModalButtons = document.querySelectorAll("#openModal, #openModalEdit");

            const modal = document.getElementById("myModal");
            const modalTitle = document.getElementById("modalTitle");
            const form = modal.querySelector("form");
            const actionButton = form.querySelector("button[type='submit']");

            openModalButtons.forEach(button => {
                button.addEventListener("click", async function () {
                    const itemID = this.getAttribute("data-item-id");
                    const methodInput = document.getElementById("formMethod");

                    if (itemID) {
                        // Editing mode - populate form with existing item data
                        const itemData = await fetchItemData(itemID); // Implement this function
                        form.setAttribute('action', '/sales/' + itemData.id);
                        methodInput.value = "PUT";

                        modalTitle.textContent = "Edit Item"; // Change modal title
                        actionButton.textContent = "Update"; // Change button text

                        // Select form fields
                        let typeDropdown = document.querySelector("select[name='type_id']");
                        let name = document.querySelector("input[name='name']");
                        let price = document.querySelector("input[name='price']");
                        let productId = document.getElementById("productIDInput");

                        // Populate form fields
                        name.value = itemData.name;
                        typeDropdown.value = itemData.type_id; // Assuming type_id is returned by your API
                        price.value = itemData.price;
                        productId.value = itemData.product_id;
                        
                        // Update image preview
                        const imagePreview = document.getElementById("imagePreview");
                        imagePreview.src = "{{ asset('storage/item_images/') }}" + "/" + itemData.images;
                    } else {
                        form.setAttribute('action', "/sales");
                        methodInput.value = "POST";
                        // Adding mode - clear form fields 
                        modalTitle.textContent = "Add Item"; // Change modal title
                        actionButton.textContent = "Add"; // Change button text

                        // Adding mode - clear form fields 
                        document.querySelector("input[name='name']").value = "";

                        // Previous to store 'type_id'  
                        // document.querySelector("input[name='type_id']").value = "";

                        // Set type_id dropdown to its default (first) value
                        let typeDropdown = document.querySelector("select[name='type_id']");
                        if(typeDropdown.options.length > 0) {
                            typeDropdown.selectedIndex = 0;
                        }

                        document.querySelector("input[name='price']").value = "";
                        
                        // Clear image preview
                        const imagePreview = document.getElementById("imagePreview");
                        imagePreview.src = "";
                    }

                    modal.classList.remove("hidden");
                });
            });

            document.getElementById("closeModal").addEventListener("click", function () {
                modal.classList.add("hidden");
            });
        });
    </script>

    <!-- Add Item Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 flex items-center justify-center z-50">
        <div class="modal-overlay absolute inset-0 bg-black opacity-50"></div>

        <div class="modal-container bg-white w-96 mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-header py-4 px-6 border-b">
                <h2 class="font-semibold text-xl" id="modalTitle">Add Item</h2>
            </div>

            <div class="modal-body py-4 px-6">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="mb-4">
                        <input type="hidden" name="user_id" value=" {{ Auth::user()->id }}">
                    </div>

                    <input type="hidden" name="product_id" id="productIDInput">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Item</label>
                        <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->types }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <img id="imagePreview" alt="Current Item Image" class="mt-2" style="max-width: 250px; max-height: 200px; border:2px solid black; border-radius: 4px;">
                        <input type="file" name="images" class="mt-4 block w-full">                            
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="text" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
                            $no = 1
                            @endphp
                            @foreach ($items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $no++ }}  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('item.detail', ['id' => $item->id]) }}" class="text-sm text-gray-900">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <!-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $item->name }} </div>
                                </td> -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $item->itemType->types }} </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <img src="{{ !empty($item->images) && file_exists(public_path('storage/item_images/' . $item->images)) 
                                                    ? asset('storage/item_images/' . $item->images) 
                                                    : 'https://picsum.photos/200/150?random=' . $item->id }}" 
                                            alt="Item Image"  
                                            style="max-width: 200px; max-height: 150px;">
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $item->price }} </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <a href="{{ route('item.detail', ['id' => $item->id]) }}" class="flex items-center mr-3" title="Add to Cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                        <a href="#" class="flex items-center" title="Edit" data-item-id="{{ $item->id }}" id="openModalEdit">
                                            <i class="fas fa-edit mr-2"></i>
                                        </a>
                                        <!-- <a href="/sales/edit/{{ $item->id }}" class="flex items-center" title="Edit" id="openModal">
                                            <i class="fas fa-edit mr-2"></i>
                                        </a> -->
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