<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>


</head>
<body class="bg-gray-50">

<div class="container overflow-hidden h-full mx-auto px-4py-2">

    @if (session('success'))
        <div id="success-alert" class="mt-12 mb-6 rounded-lg bg-green-600 text-white px-4 py-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6">
        <h1 class="text-3xl font-medium">Products</h1>
    </div>

    <div class="px-6 px-6">
        <div class="flex justify-end mb-6">
            <button type="button"
                    onclick="openModal('add-new-product')"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800 hover:-translate-y-1 hover:scale-105 transition-all duration:300"
            >
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>
        
        @include('product.add-new-product')

        <table class="rounded-lg bg-white shadow-md w-full">
            <thead class="bg-gray-100">
                <tr class="divide-x divide-gray-200">
                    <th class="px-4 py-4 text-left">#</th>
                    <th class="px-4 py-4 text-left">Name</th>
                    <th class="px-4 py-4 text-left">Category</th>
                    <th class="px-4 py-4 text-left">Price</th>
                    <th class="px-4 py-4 text-left">Description</th>
                    <th class="px-4 py-4 text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-4">#</td>
                        <td class="px-4 py-4">{{ $product->name }}</td>
                        <td class="px-4 py-4">{{ $product->category->name }}</td>
                        <td class="px-4 py-4">{{ $product->price }}</td>
                        <td class="px-4 py-4">{{ $product->description }}</td>
                        <td class="px-4 py-4 text-right">

                            <button type="button" onclick="openModal('edit-product{{ $product->id }}')">
                                <i class="fa-solid fa-pen-to-square text-blue-600 px-4 py-2 rounded-lg hover:text-blue-800 hover:-translate-y-1 hover:scale-120 transition-all duration:300"></i>
                            </button>
                            {{-- <a href="{{ route('products.edit', $product->id) }}">
                                <i class="fa-solid fa-pen-to-square text-blue-600 px-4 py-2 rounded-lg hover:text-blue-800 hover:-translate-y-1 hover:scale-120 transition-all duration:300"></i>
                            </a> --}}

                            <button type="button" onclick="openModal('delete-product{{ $product->id }}')">
                                <i class="fa-solid fa-trash text-red-600 px-4 py-2 rounded-lg hover:text-red-800 hover:-translate-y-1 hover:scale-120 transition-all duration-300"></i>
                            </button>

                            {{-- <a href="{{ route('products.edit', $product->id) }}">
                                <i class="fa-solid fa-trash text-red-600 px-4 py-2 rounded-lg hover:text-red-800 hover:-translate-y-1 hover:scale-120 transition-all duration:300"></i>
                            </a> --}}
                        </td>
                    </tr>
                    @include('product.edit-product', ['product' => $product, 'categories' => $categories])
                    @include('product.delete-product')
                @endforeach
            </tbody>
        </table>

        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{$products->firstItem()}}</span>
                    to
                    <span class="font-medium">{{$products->lastItem()}}</span>
                    of
                    <span class="font-medium">{{$products->total()}}</span>
                    orders
                </p>
            </div>
            <div>
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>
     </div>

</div>


<script src="{{ asset('build/assets/js/global.js') }}"></script>
</body>
</html>