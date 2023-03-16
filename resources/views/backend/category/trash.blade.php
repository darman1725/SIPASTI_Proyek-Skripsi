<x-app-layout>
    <x-card.nofooter>
        <x-slot name="header">
            <x-card.title :icon="'people-fill'" :title="'Category Trash'"></x-card.title>
            <div>
                <x-button.back :href="route('category.index')"></x-button.back>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>CREATED AT</th>
                    <th>CREATED BY</th>
                    <th>DELETED AT</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cat)
                    <tr>
                        <td></td>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->created_at }}</td>
                        <td>{{ $cat->created_by }}</td>
                        <td> {{ \Carbon\Carbon::parse($cat->deleted_at)->diffForHumans() }}</td>
                        <td class="text-center">
                            <x-button.restore :action="route('category.restore', $cat->id)"></x-button.restore>
                            <x-button.force :action="route('category.force', $cat->id)"></x-button.force>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card.nofooter>
</x-app-layout>
