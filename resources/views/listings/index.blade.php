<x-layout>
    @include('partials._hero')
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless (count($topics) == 0)



            @foreach ($topics as $topic)
                <!-- Item 1 -->
                <x-listitem-card :topic="$topic" />
            @endforeach
        @else
            <p>No listings found</p>

        @endunless

    </div>

    <div class="mt-6 p-4">
        {{ $topics->links() }}
    </div>
</x-layout>
