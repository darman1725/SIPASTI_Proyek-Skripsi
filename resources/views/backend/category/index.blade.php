<x-app-layout>
    <x-card.nofooter>
        <x-slot name="header">
            <x-card.title :icon="'menu-button-fill'" :title="'Categories'"></x-card.title>
            <div>
                <x-button.add :href="route('category.create')"></x-button.add>
                <x-button.trash :href="route('category.trash')"></x-button.trash>
            </div>
        </x-slot>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>CREATED AT</th>
                    <th>CREATED BY</th>
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
                        <td class="text-center">
                            <x-button.view :href="route('category.show', $cat->slug)"></x-button.view>
                            <x-button.edit :href="route('category.edit', $cat->slug)"> </x-button.edit>
                            <x-button.delete :action="route('category.destroy', $cat->slug)"></x-button.delete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card.nofooter>
</x-app-layout>
