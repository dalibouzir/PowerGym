@extends('frontend')

@section('title', 'Power Gym - Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM Membership Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 50px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #cc0000;
            border-color: #cc0000;
        }
        .btn-primary:hover {
            background-color: #d63384;
            border-color: #d63384;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>GYM Membership Form</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('membership.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label for="membership_type">Membership Duration</label>
                <select class="form-control" id="membership_duration" name="membership_duration" required>
                    <option value="1" {{ old('membership_duration') == '1' ? 'selected' : '' }}>1 Month</option>
                    <option value="3" {{ old('membership_duration') == '3' ? 'selected' : '' }}>3 Months</option>
                    <option value="6" {{ old('membership_duration') == '6' ? 'selected' : '' }}>6 Months</option>
                </select>
            </div>

            <div class="form-group">
                <label for="membership_price">Membership Price</label>
                <input type="text" class="form-control" id="membership_price" name="membership_price" value="{{ old('membership_price') }}" required>
            </div>

            <div class="form-group">
                <label for="paid_status">Payment Status</label>
                <select class="form-control" id="paid_status" name="paid_status" required>
                    <option value="pending" {{ old('paid_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="paid" {{ old('paid_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</body>
</html>

@endsection
