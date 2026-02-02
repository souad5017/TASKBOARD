<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title"
                        value="{{ old('title', $task->title) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="4"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">{{ old('description', $task->description) }}</textarea>
                </div>

                {{-- Deadline --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input type="date" name="deadline"
                        value="{{ old('deadline', $task->deadline) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                </div>

                {{-- Priority --}}
                <div>
                    {{ $task->titre }}
                    <label class="block text-sm font-medium text-gray-700">Priority</label>
                    <select name="priority"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="basse" {{ old('priority', $task->priority) == 'basse' ? 'selected' : '' }}>Basse</option>
                        <option value="moyenne" {{ old('priority', $task->priority) == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                        <option value="haute" {{ old('priority', $task->priority) == 'haute' ? 'selected' : '' }}>Haute</option>
                    </select>
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
                        <option value="todo" {{ old('status', $task->status) == 'todo' ? 'selected' : '' }}>To Do</option>
                        <option value="inProgress" {{ old('status', $task->status) == 'inProgress' ? 'selected' : '' }}>In Progress</option>
                        <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="flex justify-end gap-2">
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md">
                        Cancel
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Update Task
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
