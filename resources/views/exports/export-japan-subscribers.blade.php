<table>
    <thead>
        <tr>
            <td>email</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>