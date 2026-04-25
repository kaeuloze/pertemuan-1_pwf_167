<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-4">Add Category</h2>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Category Name</label>
                        <input type="text" name="name" class="w-full bg-gray-700 border-none rounded-md" placeholder="e.g. Electronic">
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('category.index') }}" class="px-4 py-2 bg-gray-600 rounded-md">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 rounded-md">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>