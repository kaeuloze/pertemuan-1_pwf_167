<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}"
                               class="p-2 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>
                            </a>
                            <div>
                                <h2 class="text-2xl font-bold">Product Detail</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Viewing product #{{ $product->id }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            @can('update', $product)
                            <a href="{{ route('product.edit', $product) }}"
                               class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg border border-amber-200 dark:border-amber-800 text-amber-600 dark:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition">
                                Edit
                            </a>
                            @endcan

                            @can('delete', $product)
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg border border-red-200 dark:border-red-800 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                                    Delete
                                </button>
                            </form>
                            @endcan
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 rounded-lg">

                        {{-- Item --}}
                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Product Name</div>
                            <div class="col-span-2 font-semibold">{{ $product->name }}</div>
                        </div>

                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Quantity</div>
                            <div class="col-span-2">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $product->quantity > 10
                                        ? 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400'
                                        : 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400' }}">
                                    {{ $product->quantity }} {{ $product->quantity > 10 ? 'In Stock' : 'Low Stock' }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Price</div>
                            <div class="col-span-2 font-medium">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Owner</div>
                            <div class="col-span-2 flex items-center gap-2">
                                <div class="h-8 w-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase">
                                    {{ substr($product->user->name ?? '?', 0, 1) }}
                                </div>
                                <span>{{ $product->user->name ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Created At</div>
                            <div class="col-span-2">
                                {{ $product->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-3 px-6 py-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                            <div class="text-sm text-gray-500">Updated At</div>
                            <div class="col-span-2">
                                {{ $product->updated_at->format('d M Y, H:i') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>