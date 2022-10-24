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
                    <div class="flex space-x-8">
                        <div>
                            <form action="/translate" method="post">
                                @csrf
                                <select name="locale">
                                    <option value="fr" {{ \Illuminate\Support\Facades\App::getLocale() == "fr" ? "selected" : ""  }} >fr</option>
                                    <option value="en" {{ \Illuminate\Support\Facades\App::getLocale() == "en" ? "selected" : ""  }}>en</option>
                                </select>
                                <input class="border border-gray-300 p-3 bg-blue-600 text-white hover:bg-blue-600 hover:cursor-pointer" type="submit" value="changer">
                            </form>
                        </div>
                        <label class="text-gray-600 font-semibold">{{ __(trans_choice(__('[1, 10] quelque visiteurs|[10,*] plusieurs visiteurs'), \App\Models\Visits::all()->count()))."." }}</label>
                    </div>
                    <table class="min-w-full border border-gray-400">
                        <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                ID
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                IP
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                LOCAL
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                TIME CONNECT
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Days - 1
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Visits::all() as $v)
                                {{-- dd($loop->index) --}}
                                <tr class={{ $loop->index%2 == 0 ? "bg-gray-100 border-b" : "bg-white-100 border-b" }}>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->index + 1}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $v->ip }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $v->country }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $v->created_at }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $v->created_at->subDays()}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
