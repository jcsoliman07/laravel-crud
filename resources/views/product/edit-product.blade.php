@props(['product', 'categories'])


<div id="edit-product{{ $product->id }}"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-start justify-center pt-20 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-out"
>
    <div class="relative w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray">

            <div class="mb-4 border-bottom border-b border-gray-200 px-4 py-4">
                <h1 class="text-xl font-medium">Edit Product</h1>
            </div>

                <div class="flex flex-col px-4 py-2">

                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4 flex flex-col flex-1">
                            <label class="text-md font-medium mb-4">Product Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                placeholder="Enter Product Name" 
                                class="rounded-lg border border-1 border-gray-200 px-4 py-2"
                                value="{{ old('name', $product->name) }}"
                                required
                            >
                        </div>

                        <div class="mb-4 flex flex-col flex-1">
                            <label class="text-md font-medium mb-4">Price</label>
                            <input 
                                type="number"
                                step="0.01" 
                                name="price" 
                                id="price" 
                                placeholder="0.00" 
                                class="rounded-lg border border-1 border-gray-200 px-4 py-2"
                                value="{{ old('name', $product->price) }}"
                                required
                            >
                        </div>

                        <div class="mb-4 flex flex-col flex-1">
                            <label class="text-md font-medium mb-4">Category</label>
                            <select name="category" id="category" class="rounded-lg border border-1 border-gray-200 px-4 py-2">
                                <option> -- Select -- </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"
                                        {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 flex flex-col flex-1">
                            <label class="text-md font-medium mb-4">Description</label>
                            <input 
                                type="text"
                                name="description" 
                                id="description" 
                                placeholder="Enter description for product here...." 
                                class="rounded-lg border border-1 border-gray-200 px-4 py-2"
                                value="{{ old('description', $product->description) }}"
                                required
                            >
                        </div>

                        <div class="border-t border-gray-200 mt-4 px-4 py-4">
                            <div class="flex justify-end space-x-4">
                                <button type="button" 
                                        onclick="closeModal('edit-product{{ $product->id }}')"
                                        class="inline-flex justify-center py-4 px-2 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100"
                                >
                                    Cancel
                                </button>

                                <button type="submit" class="px-4 py-2 rounded-lg text-white bg-blue-600">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>