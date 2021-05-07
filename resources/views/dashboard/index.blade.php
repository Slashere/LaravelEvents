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
                    @if (count($sites))
                        @foreach($sites as $site)
                            <div class="d-flex flex-row mb-3">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $site->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $site->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{ $site->url }}</td>
                                    </tr>
                                </table>
                                <form method="POST" action="{{ route('site.destroy', $site) }}" class="alert alert-danger mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a class="nav-link" href=" {{ route('site_stat.show', $site->id) }}">Show stats</a>
                                @endforeach
                                @else
                                    No sites yet
                                @endif

                            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
