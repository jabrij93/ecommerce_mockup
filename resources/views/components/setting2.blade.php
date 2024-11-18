@props(['heading'])

<section class="max-w-4xl mx-auto mt-6 ml-10">
    <h1 class="text-lg font-bold mb-8 border-b ml-5">{{ $heading }}</h1>

    <div class="flex">
        <main class="flex-1">
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>