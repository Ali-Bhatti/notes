<x-app-layout title="Create New Note">
    <div class="max-w-4xl mx-auto">
        <!-- Navigation -->
        <div class="mb-6">
            <a href="{{ route('note.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Notes
            </a>
        </div>

        <!-- Create Form -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="p-8">
                <div class="border-b border-gray-200 pb-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Create New Note</h2>
                    <p class="text-gray-600 mt-2">Write down your thoughts, ideas, or anything you want to remember.</p>
                </div>

                <form method="POST" action="{{ route('note.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Note Content -->
                    <div>
                        <label for="note" class="block text-sm font-medium text-gray-700 mb-2">
                            Note Content
                        </label>
                        <textarea 
                            name="note" 
                            id="note" 
                            rows="15"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-y"
                            placeholder="Write your note here..."
                            required
                        >{{ old('note') }}</textarea>
                        @error('note')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                        <div class="flex space-x-3">
                            <button 
                                type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create Note
                            </button>
                            
                            <a href="{{ route('note.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                                Cancel
                            </a>
                        </div>
                        
                        <div class="text-sm text-gray-500">
                            <p>{{ now()->format('M d, Y') }}</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
