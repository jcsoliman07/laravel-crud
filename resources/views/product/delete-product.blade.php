@props(['product'])

<div id="delete-product{{ $product->id }}"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-start justify-center pt-20 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-out"
>
    <div class="relative p-4 w-full max-w-lg max-h-full">
         <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray">

            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <div class="p-4 md:p-5 text-center">
                    <div class="flex justify-center items-center h-full mb-6">
                        <i class="fa-solid fa-circle-exclamation text-4xl text-red-600"></i>
                    </div>

                    <input type="hidden" name="product" id="product" value="{{ $product->id }}">

                    <h3 class="mb-5 text-lg font-medium text-gray-600">
                        Are you sure you want to delete this?
                    </h3>

                    <!-- Button Confirm -->
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>

                    <!-- Butto Cancel -->
                    <button type="button" 
                            onclick="closeModal('delete-product{{ $product->id }}')"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100">
                        No, Cancel
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>