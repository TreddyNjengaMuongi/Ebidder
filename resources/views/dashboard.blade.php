<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .card-body {
            margin-top: 25px;
            text-align: center;
        }
        .product-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            margin-top: 20px;
        }

        .product-card .card {
            width: 200px;
            margin: 10px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to the Ebid system") }}
                    <div class="container">
                        <h1>Product Listing</h1>
                
                        <div class="row">
                            <div class="product-card">
                                @foreach ($products as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 350px; height:400px">
                                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image" style="width: 100%; height:70%">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->product_name }}</h5>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <p class="card-text">Price: ${{ $product->price }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
