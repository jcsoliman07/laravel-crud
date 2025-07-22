
@props(['category'])

<div id="edit-category{{ $category->id }}"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-start justify-center pt-20 bg-black bg-opacity-50 opacity-0 pointer-events-none trainsition-opacity duration-300 ease-out"
>

    <div class="relative w-full max-w-lg max-h-full">

        <div class="relative bg-white rounded-lg shadown=sm dark-bg-gray">

            <div class="mb-6 border-b border-gray-200 px-4 py-4">
                <h1 class="font-medium text-xl">Edit Category</h1>
            </div>

            <div class="flex flex-col px-4 py-4">
                
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6 flex flex-col flex-1">
                        
                        <label class="font-medium text-md mb-4">Category</label>
                        <input type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name', $category->name) }}"
                            class="rounded-lg px-4 py-2 border border-gray-200"
                        >

                    </div>

                    <div class="flex justify-end px-4 py-4 space-x-4 border-t border-gray-200">
                        <button type="button"
                                onclick="closeModal('edit-category{{ $category->id }}')"
                                class="inline-flex justify-center px-4 py-2 rounded-lg text-gray-900 bg-white border border-gray-200 hover:bg-gray-100"
                        >
                            Cancel
                        </button>

                        <button type="submit"
                                class="inline-flex justify-center px-4 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-800"
                        >
                            Save
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>