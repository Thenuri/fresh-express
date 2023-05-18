<x-admin>
    <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Pending Approvals</h3>

    @if ($users->isEmpty())
        <p>No pending approvals at the moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.approve', ['id' => $user->id]) }}">Approve</a>
                            <a href="{{ route('admin.deny', ['id' => $user->id]) }}">Deny</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-admin>
