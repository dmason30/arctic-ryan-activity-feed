<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">
                @foreach($activities as $activity)
                    <div class="bg-white p-2 overflow-hidden shadow-xl sm:rounded">
                        <div class="flex justify-between mb-2">
                            <h3 class="text-xl">{{$activity->name}}</h3>
                            <div>{{$activity->created_at->diffForHumans()}}</div>
                        </div>

                        @foreach ($activity->attachments as $attachment)
                            @switch(get_class($attachment->attachable))
                                @case(\App\Models\Video::class)
                                    <iframe width="420" height="315"
                                            src="{{$attachment->attachable->url}}">
                                    </iframe>

                                    @break
                                @case(\App\Models\Photo::class)
                                        <img src="{{$attachment->attachable->url}}" class="inline-block w-1/6"/>
                                    @break
                                @case(\App\Models\Event::class)
                                    <p>{{$attachment->attachable->description}}</p>
                                    <a class="text-blue-500 hover:underline" href="{{$attachment->attachable->url}}">Click to see event</a>
                                    @break
                            @endswitch
                        @endforeach
                    </div>
                @endforeach
        </div>
    </div>
</x-app-layout>
