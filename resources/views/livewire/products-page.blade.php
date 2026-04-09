<div class="mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full max-w-[85rem]">
    <section class="bg-gray-50 dark:bg-gray-800 py-10 rounded-lg font-poppins">
        <div class="mx-auto px-4 md:px-6 py-4 lg:py-6 max-w-7xl">
            <div class="flex flex-wrap -mx-3 mb-24">
                <div class="lg:block pr-2 w-full lg:w-1/4">
                    <div class="bg-white dark:bg-gray-900 mb-5 p-3 border border-gray-200 dark:border-gray-900">
                        <h2 class="font-bold dark:text-gray-400 text-2xl"> Categories</h2>
                        <div class="mb-6 pb-2 border-rose-600 dark:border-gray-400 border-b w-16"></div>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="mb-4" wire:key="{{ $category->id }}">
                                    <label for="" class="flex items-center dark:text-gray-400">
                                        <input type="checkbox" wire:model.live="selected_categories"  id="{{ $category->slug }}" value="{{ $category->id }}"
                                            class="mr-2 w-4 h-4">
                                        <span class="text-lg">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="bg-white dark:bg-gray-900 mb-5 p-4 border border-gray-200 dark:border-gray-900">
                        <h2 class="font-bold dark:text-gray-400 text-2xl">Brand</h2>
                        <div class="mb-6 pb-2 border-rose-600 dark:border-gray-400 border-b w-16"></div>
                        <ul>

                            @foreach ($brands as $brand)
                                <li class="mb-4" wire:key="{{ $brand->id }}">
                                    <label for="{{ $brand->slug }}" class="flex items-center dark:text-gray-300">
                                        <input type="checkbox" wire:model.live="selected_brands" id="{{ $brand->slug }}" value="{{ $brand->id }}" class="mr-2 w-4 h-4">
                                        <span class="dark:text-gray-400 text-lg">{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="bg-white dark:bg-gray-900 mb-5 p-4 border border-gray-200 dark:border-gray-900">
                        <h2 class="font-bold dark:text-gray-400 text-2xl">Product Status</h2>
                        <div class="mb-6 pb-2 border-rose-600 dark:border-gray-400 border-b w-16"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="featured" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="featured" wire:model.live="featured" value="1" class="mr-2 w-4 h-4">
                                    <span class="dark:text-gray-400 text-lg">Featured Products</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="on_sale" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" wire:model.live="on_sale" id="on_sale" value="1" class="mr-2 w-4 h-4">
                                    <span class="dark:text-gray-400 text-lg">On Sale</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white dark:bg-gray-900 mb-5 p-4 border border-gray-200 dark:border-gray-900">
                        <h2 class="font-bold dark:text-gray-400 text-2xl">Price</h2>
                        <div class="mb-6 pb-2 border-rose-600 dark:border-gray-400 border-b w-16"></div>
                        <div>
                            <div class="font-semibold">{{ Number::currency($price_range, 'UDS') }}</div>
                            <input type="range" wire:model.live='price_range'
                                class="bg-blue-100 mb-4 rounded w-full h-1 appearance-none cursor-pointer"
                                max="5000" value="5000" step="250">
                            <div class="flex justify-between">
                                <span class="inline-block font-bold text-blue-400 text-lg">{{ Number::currency(500, 'UDS') }}</span>
                                <span class="inline-block font-bold text-blue-400 text-lg">{{ Number::currency(5000, 'UDS') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3 w-full lg:w-3/4">
                    <div class="mb-4 px-3">
                        <div
                            class="hidden md:flex justify-between items-center bg-gray-100 dark:bg-gray-900 px-3 py-2">
                            <div class="flex justify-between items-center">
                                <select wire:model.live="sort"
                                    class="block bg-gray-100 dark:bg-gray-900 w-40 dark:text-gray-400 text-base cursor-pointer">
                                    <option value="latest">Sort by latest</option>
                                    <option value="price">Sort by Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center">

                        @foreach ($products as $product)
                            <div class="mb-6 px-3 w-full sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                <div class="border border-gray-300 dark:border-gray-700">
                                    <div class="relative bg-gray-200">
                                        <a href="/products/{{ $product->slug }}" class="">
                                            <img src="{{ url('storage', $product->images[0]) }}"
                                                alt="{{ $product->name }}" class="mx-auto w-full h-56 object-cover">
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="flex justify-between items-center gap-2 mb-2">
                                            <h3 class="font-medium dark:text-gray-400 text-xl">
                                                {{ $product->name }}
                                            </h3>
                                        </div>
                                        <p class="text-lg">
                                            <span
                                                class="text-green-600 dark:text-green-600">{{ Number::currency($product->price, 'USD') }}</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center p-4 border-gray-300 dark:border-gray-700 border-t">

                                        <a wire:click.prevent="addToCart({{ $product->id }})" href="#"
                                            class="flex items-center space-x-2 text-gray-500 hover:text-red-500 dark:hover:text-red-300 dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="w-4 h-4 bi bi-cart3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg><span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to Cart</span><span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>

</div>
