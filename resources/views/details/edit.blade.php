@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Detail</h1>
    <form action="{{ route('details.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $detail->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $detail->email }}" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{ $detail->mobile }}" required>
        </div>
        <!-- <div class="form-group">
            <label for="file">Choose file:</label>
            <input type="file" name="file" id="file">
        </div> -->

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="{{ $detail->password }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" >
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <textarea name="data" class="form-control" required>{{ Crypt::decryptString($detail->encrypted_data) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Detail</button>
    </form>
</div>
@endsection
