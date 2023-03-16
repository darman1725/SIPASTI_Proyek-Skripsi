<x-app-layout>
    <x-card.nofooter>
        <x-slot name="header">
            <x-card.title :icon="'newspaper'" :title="'Posts'"></x-card.title>
            <div>
                <x-button.add :href="route('post.create')"></x-button.add>
                <x-button.trash :href="route('post.trash')"></x-button.trash>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>TITLE</th>
                    <th>CATEGORIES</th>
                    <th>STATUS</th>
                    <th>PUBLISH AT</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </x-card.nofooter>
</x-app-layout>
