<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    Dashboard 1
                </h2>
                <p class="text-sm text-gray-500">Overview of your tasks</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition shadow-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Task
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total tasks</p>
                <h3 class="text-3xl font-bold text-gray-900 mt-1">{{ $statistics['total'] }}</h3>
            </div>

            <div class="bg-blue-50 border border-blue-100 p-6 rounded-xl shadow-sm">
                <p class="text-sm font-medium text-blue-600 uppercase tracking-wider">To do</p>
                <h3 class="text-3xl font-bold text-blue-900 mt-1">{{ $statistics['todo'] }}</h3>
            </div>

            <div class="bg-yellow-50 border border-yellow-100 p-6 rounded-xl shadow-sm">
                <p class="text-sm font-medium text-yellow-600 uppercase tracking-wider">In progress</p>
                <h3 class="text-3xl font-bold text-yellow-900 mt-1">{{ $statistics['inProgress'] }}</h3>
            </div>

            <div class="bg-green-50 border border-green-100 p-6 rounded-xl shadow-sm">
                <p class="text-sm font-medium text-green-600 uppercase tracking-wider">Done</p>
                <h3 class="text-3xl font-bold text-green-900 mt-1">{{ $statistics['done'] }}</h3>
            </div>

            <div class="bg-red-50 border border-red-100 p-6 rounded-xl shadow-sm">
                <p class="text-sm font-medium text-red-600 uppercase tracking-wider">Late tasks</p>
                <h3 class="text-3xl font-bold text-red-900 mt-1">{{ $statistics['overdue'] }}</h3>
            </div>

            <div class="bg-purple-50 border border-purple-100 p-6 rounded-xl shadow-sm">
                <p class="text-sm font-medium text-purple-600 uppercase tracking-wider">Completion</p>
                <div class="flex items-end justify-between">
                    <h3 class="text-3xl font-bold text-purple-900 mt-1">{{ $statistics['done'] }}%</h3>
                </div>
                <div class="w-full bg-purple-200 rounded-full h-2 mt-4">
                    <div class="bg-purple-600 h-2 rounded-full transition-all duration-700" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/30">
                <h3 class="font-semibold text-gray-800">Recent Tasks</h3>
                <div class="flex items-center gap-4">
                    <span class="text-xs text-gray-400">Showing last 10 tasks</span>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium underline-offset-4 hover:underline">View all</a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs font-semibold uppercase tracking-wide text-gray-500 bg-gray-50/50 border-b border-gray-100">
                            <th class="px-6 py-4">Task Name</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Due Date</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($tasks as $task)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-semibold text-gray-900">{{ $task->title }}</span>
                                    <span class="text-xs text-gray-400">Ref: #{{ rand(1000, 9999) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($task->status == 'done')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1 h-1 mr-1.5 rounded-full bg-green-500"></span> Done
                                </span>
                                @elseif($task->status == 'inProgress')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-1 h-1 mr-1.5 rounded-full bg-yellow-500"></span> In Progress
                                </span>
                                @elseif($task->status == 'late')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-1 h-1 mr-1.5 rounded-full bg-red-500"></span> Late
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <span class="w-1 h-1 mr-1.5 rounded-full bg-blue-500"></span> To Do
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                {{ $task->deadline}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('tasks.edit',$task->id ) }}" class="p-1.5 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition" title="Edit Task">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md"
                                            title="Delete Task">
                                            🗑️
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-200 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">No tasks found. Start by creating a new one!</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>