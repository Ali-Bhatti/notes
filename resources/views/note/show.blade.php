<x-app-layout title="View Note">
    <div class="max-w-4xl mx-auto">
        <!-- Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('note.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Notes
            </a>
            
            <div class="flex space-x-3">
                <a href="{{ route('note.edit', $note) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Note
                </a>
                
                <form method="POST" action="{{ route('note.destroy', $note) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this note?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete Note
                    </button>
                </form>
            </div>
        </div>

        <!-- Note Content -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="p-8">
                <!-- Meta Information -->
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Note #{{ $note->id }}</p>
                            <p class="text-sm text-gray-500">Created: {{ $note->created_at->format('M d, Y \\a\\t g:i A') }}</p>
                            @if($note->updated_at != $note->created_at)
                                <p class="text-sm text-gray-500">Last updated: {{ $note->updated_at->format('M d, Y \\a\\t g:i A') }}</p>
                            @endif
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">By: {{ $note->user->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Note Content -->
                <div class="prose max-w-none">
                    <div class="whitespace-pre-wrap text-gray-800 leading-relaxed">
                        {{ $note->note }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
