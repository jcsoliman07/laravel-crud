
@props(['category'])

<div id="delete-category{{ $category->id }}"
    aria-hidden="true"
    class="fixed inset-0 z-50 flex items-start justify-center pt-20 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duraion-300 ease-out"
>
    <div class="relative w-full max-w-lg max-h-full">

        <div class="relative bg-white rounded-lg shadow-sm dark-bg:gray">

            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                @csrf
                @method('DELETE')

                <div class="p-4 text-center">

                    <div class="flex justify-center items-center h-full mb-6">
                        <i class="fa-solid fa-circle-exclamation text-4xl text-red-600"></i>
                    </div>

                    <input type="hidden" name="category" id="category" value="{{ $category->id }}">

                    <h3 class="mb-5 text-lg text-gray-600 ">
                        Are you sure you want to delete this?
                    </h3>

                    <button type="submit"
                            class="text-white bg-red-600 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center hover:bg-red-900 hover:scale-105 hover:-translate-y-1 duration-300 ease-out"
                    >
                        Yes, I'm sure
                    </button>

                    <button type="button"
                            onclick="closeModal('delete-category,{{ $category->id }}')"
                            class="text-gray-900 bg-white font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center border border-gray-200 hover:bg-bg-100 hover:scale-105 hover:-translate-y-1 duration-300 ease-out"
                    >
                        No, Cancel
                    </button>

                </div>



            </form>

        </div>

    </div>

</div>