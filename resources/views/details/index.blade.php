@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Details</h1>
    <form action="{{ route('details.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <!-- <div class="form-group">
            <label for="file">Choose file:</label>
            <input type="file" name="file" id="file">
        </div> -->
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <textarea name="data" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Detail</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Role</th>
                <th>Encrypted Data</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $detail)
            <tr>
                <td>{{ $detail->name }}</td>
                <td>{{ $detail->email }}</td>
                <td>{{ $detail->mobile }}</td>
                <td>{{ $detail->password }}</td>
                <td>{{ $detail->role }}</td>
                <td>{{ Crypt::decryptString($detail->encrypted_data) }}</td>
                <td>
                    <a href="{{ route('details.edit', $detail->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <a href="{{ route('details.bulk.upload') }}" class="btn btn-success">Bulk Upload</a>
        <a href="{{ route('details.bulk.download') }}" class="btn btn-info">Bulk Download</a>
    </div>
</div>
@endsection