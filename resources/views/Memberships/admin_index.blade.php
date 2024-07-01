

@extends('dashboard')

@section('title', 'Admin - Memberships')

@section('content')
<style>
    <style>
    body {
        background-image: url("https://files.123freevectors.com/wp-content/original/128899-glowing-red-and-blue-wave-background.jpg");
        background-size: cover; /* Scale the background to be as large as possible */
        background-position: center; /* Center the background image */
        background-repeat: no-repeat; /* Do not repeat the background */
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        color: #E0E0E0;
    }

    .container {
        background-color: rgba(45, 85, 255, 0.2);
        padding: 20px;
        border-radius: 8px;
        width: 110%;
        max-width: 1200px;
        margin-top: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    h1 {
        text-align: center;
        color: rgba(72, 113, 247);
    }

    form {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    input[type="text"],
    select,
    button {
        flex-grow: 1;
        padding: 8px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: rgba(44, 44, 78, 0.85);
        color: #fff;
        cursor: pointer; /* Add cursor style */
    }

    button[type="submit"] {
        background-color: #cc0000;
        color: white;
        border: none;
        border-radius: 4px;
    }

    button[type="submit"]:hover {
        background-color: #d63384;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #cc0000;
        color: white;
    }

    td {
        background-color: rgba(45, 85, 255, 0.2);
        color: #E0E0E0;
    }

    .pagination {
        justify-content: center;
        padding: 20px 0;
    }

    .role-update-form {
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .btn {
        cursor: pointer; /* Add cursor style to all buttons */
    }
</style>
    </style>
<div class="container mt-5">
    <h2>Membership Submissions</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Membership Type</th>
                <th>Paid</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($memberships as $membership)
                <tr>
                    <td>{{ $membership->name }}</td>
                    <td>{{ $membership->email }}</td>
                    <td>{{ $membership->phone }}</td>
                    <td>{{ ucfirst($membership->membership_type) }}</td>
                    <td>{{ $membership->paid ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('admin.memberships.approve', $membership->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
