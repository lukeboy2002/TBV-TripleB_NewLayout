<div class="py-6">
    <div class="flex justify-between items-center">
        <div>
            Search
        </div>
        <div class="flex items-center space-x-6">
            <x-link.primary class="text-xs">Invide User</x-link.primary>
            <x-link.primary class="text-xs">Create Member</x-link.primary>

        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-left rtl:text-right text-gray-500">
            <thead class="text-dark dark:text-light uppercase text-xs">
            <tr class="border-b border-dark dark:border-light">
                <th scope="col" class="px-4 py-3">Username</th>
                <th scope="col" class="px-4 py-3">Email</th>
                <th scope="col" class="px-4 py-3">Invited by</th>
                <th scope="col" class="px-4 py-3">Role</th>
                <th scope="col" class="px-4 py-3">Status</th>
                <th scope="col" class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b border-dark dark:border-light text-xs text-dark dark:text-light">
                    <th scope="row"
                        class="px-4 py-2 font-medium whitespace-nowrap">
                        {{ ucfirst($user->username) }}
                    </th>
                    <td class="px-4 py-2">
                        {{ $user->email }}
                    </td>
                    <td class="px-4 py-2">

                    </td>
                    <td class="px-4 py-2">
                        {{--                        {{ $user->roles->name }}--}}
                    </td>
                    <td class="px-4 py-2">

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    Navigatie
</div>
