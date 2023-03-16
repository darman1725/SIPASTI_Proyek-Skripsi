<x-app-layout>
    <x-card.index>
        <x-slot name="header">
            <x-card.title :icon="'menu-button-fill'" :title="'Category ' . $category->slug"></x-card.title>
            <div>
                <x-button.back :href="route('category.index')"></x-button.back>
            </div>
        </x-slot>
        <div class="col-md-6">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{ $category->slug }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                        <td>Created By</td>
                        <td>{{ $category->created_by }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $category->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated By</td>
                        <td>{{ $category->updated_by }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <x-card.shadow>
                <x-slot name="header">
                    <x-card.title :icon="'menu-button-fill'" :title="'Post'"></x-card.title>
                </x-slot>
            </x-card.shadow>
        </div>
    </x-card.index>
</x-app-layout>
