

<div id="add-new-category"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-start justify-center pt-20 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-out"
>
    <div class="relative w-full max-w-lg max-h-full">

        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray">

            <div class="mb-6 border-b border-gray-200 px-4 py-4">
                <h1 class="font-medium text-xl">Add New Category</h1>
            </div>

            <div class="flex flex-col px-4 py-2">

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    <div class="mb-4 flex flex-col flex-1">
                        <label class="text-md font-medium mb-4">Category</label>
                        <input type="text" 
                                name="name" 
                                id="name" 
                                placeholder="Enter Category Name" 
                                class="rounded-lg px-4 py-2 border border-gray-200"
                                required
                        >
                    </div>

                    <div class="flex justify-end px-4 py-4 space-x-4">
                        <button type="button"
                                onclick="closeModal('add-new-category')"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium bg-white text-gray-900 border border-gray-200 rounded-lg hover:bg-gray-100"
                        > 
                                Cancel
                        </button>

                        <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-800"
                        > 
                                Save
                        </button>
                    </div>

                </form>
                
            </div>

        </div>

    </div>
    
</div>