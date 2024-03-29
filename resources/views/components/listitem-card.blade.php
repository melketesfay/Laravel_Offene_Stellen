@props(['topic'])


<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $topic->logo ? asset('storage/' . $topic->logo) : asset('/images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $topic->id }}">{{ $topic->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $topic->company }}</div>
            <x-listitem-tag :tagsCsv="$topic->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $topic->location }}
            </div>
        </div>
    </div>
</x-card>
