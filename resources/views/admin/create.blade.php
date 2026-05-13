<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div style="padding: 50px; color: #d4b16a; max-width: 800px; margin: 0 auto;">
    <h1 style="text-transform: uppercase; letter-spacing: 3px; border-bottom: 2px solid #d4b16a; padding-bottom: 10px;">
        Publish a New Decree
    </h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: 30px; display: flex; flex-direction: column; gap: 20px;">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 5px;">
            <label style="font-family: 'Playfair Display', serif;">Title of the Decree</label>
            <input type="text" name="title" required style="padding: 10px; background: #2c1810; border: 1px solid #d4b16a; color: white;">
        </div>

        <div style="display: flex; flex-direction: column; gap: 5px;">
            <label style="font-family: 'Playfair Display', serif;">Imperial Content</label>
            <textarea name="content" rows="10" required style="padding: 10px; background: #2c1810; border: 1px solid #d4b16a; color: white; resize: vertical;"></textarea>
        </div>

        <div style="display: flex; flex-direction: column; gap: 5px;">
            <label style="font-family: 'Playfair Display', serif;">Attach an Imperial Seal (Image)</label>
            <input type="file" name="image" style="color: #d4b16a;">
        </div>

        <button type="submit" style="padding: 15px; background: #d4b16a; color: #1a0f0f; border: none; font-weight: bold; cursor: pointer; text-transform: uppercase;">
            Release to the Archives
        </button>
    </form>
</div>
@endsection
</body>
</html>