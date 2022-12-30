<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <hr>
                <div class="p-6">
                    <h2>Past Events</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Users</th>
                            <th>Teams</th>
                            <th>Donated</th>
                            <th>Volunteers</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr class="p-2 rounded-lg relative  max-w-full my-2 text-ellipsis overflow-hidden text-break whitespace-nowrap {{ $event->active ? "bg-indigo-600 text-white" : "bg-gray-100" }}">
                                <td class="p-2 pr-6">
                                    <a href="{{ route('event.view', $event->slug) }}">
                                        {{$event->name}}
                                    </a>
                                </td>
                                <td class="p-2 pr-6">{{$event->users()->count()}}</td>
                                <td class="p-2 pr-6">{{$event->teams()->count()}}</td>
                                <td class="p-2 pr-6">{{$event->totalDonations()}}</td>
                                <td class="p-2 pr-6">{{$event->volunteers()->count()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
