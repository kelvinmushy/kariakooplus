@extends('layouts.app')

@section('title', 'All Ads')

@section('top')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


@endsection
@section('content')
<div class="container">
    <h2 class="mb-4">All Ads</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ads.create') }}" class="btn btn-primary mb-3">+ Create New Ad</a>

    <table class="table table-bordered table-hover" style="background-color: #blue">
        <thead>
            <tr>
                <th class="Thb" >Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->name }}</td>
                    <td>${{ number_format($ad->price, 2) }}</td>
                    <td id="td">{{ ucfirst($ad->status) }}</td>
                    <td>
                        <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this ad?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')




@endsection
