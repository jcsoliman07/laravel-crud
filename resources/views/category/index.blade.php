<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

</head>
<body class="w-full h-full bg-gray-100">

<div class="container overflow-hidden h-full mx-auto px-4 py-4">
    <div class="mb-6">
        <h1 class="font-medium text-3xl mb-4">Category</h1>
        <p class="text-sm text-gray-500"> Managesyour Category</p>
    </div>

    @if (session('success'))
        <div id="success-alert" class="mt-12 mb-6 rounded-lg bg-green-600 text-white px-4 py-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="px-6 py-6">
        <div class="flex justify-end mb-6">
            <button type="button"
                    onclick="openModal('add-new-category')"
                    class="bg-blue-600 text-white rounded-lg px-4 py-2 font-medium hover:scale=105 hover:-translate-y-1 hover:bg-blue-800 hover:shadow-md transition duration-300 ease-out"
            >
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>

        @include('category.add-new-category')

        <div class="grid grid-cols sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach ($categories as $category)
                <div class="w-full h-[150px] px-4 py-4 rounded-lg bg-white shadow-sm hover:shadow-md hover:scale-105 hover:-translate-y-1 transition duration-300 ease-out">
                    <div class="flex justify-between px-4 py-4">
                        <div class="flex items-center space-x-4">
                            <h1 class="font-medium text-xl">{{ $category->name }}</h1>
                        </div>
                        
                        <div class="flex justify-between gap-2">
                            <button type="button"
                                    onclick="openModal('edit-category{{ $category->id }}')"
                            >
                                <i class="fa-solid fa-pen-to-square text-md text-blue-600 hover:text-blue-800 hover:scale-105 hover:-translate-y-1 transition duration-100 ease-out"></i>
                            </button>

                            <button type="button"
                                    onclick="openModal('delete-category{{ $category->id }}')"
                            >
                                <i class="fa-solid fa-trash text-md text-red-600 hover:text-red-800 hover:scale-105 hover:-translate-y-1 transition duration-100 ease-out"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @include('category.edit-category')
                @include('category.delete-category')
            @endforeach
            
        </div>
    </div>
</div>


<script src="{{ asset('build/assets/js/global.js') }}"></script>
</body>
</html>