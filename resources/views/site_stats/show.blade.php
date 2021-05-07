<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($siteStats))
                        @foreach($siteStats as $siteStat)
                            <div class="d-flex flex-row mb-3">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $siteStat->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Clicks</th>
                                        <td>{{ $siteStat->click_pointer }}</td>
                                    </tr>
                                    <tr>
                                        <th>RealTimeCreatedAt</th>
                                        <td>{{ $siteStat->realtime_created_at }}</td>
                                    </tr>
                                </table>
{{--                                <form method="POST" action="{{ route('site_stats.destroy', $siteStat) }}" class="alert alert-danger mr-1">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger">Delete</button>--}}
{{--                                </form>--}}
                                @endforeach
                                @else
                                    No statistics yet
                                @endif

                            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
