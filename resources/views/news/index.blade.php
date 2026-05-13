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
<style>
    .chronicles-container {
        padding: 50px 20px;
        background-color: #1a0f0f; 
        min-height: 100vh;
        font-family: 'Playfair Display', serif;
    }

    .parchment {
        background: #f2e8c9;
        background-image: url('https://www.transparenttextures.com/patterns/parchment.png');
        color: #2c1810;
        padding: 40px;
        margin: 0 auto 40px auto;
        max-width: 700px;
        position: relative;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        border: 1px solid #d4b16a;
        
       
        clip-path: polygon(0% 2%, 5% 0%, 10% 3%, 15% 1%, 20% 4%, 25% 2%, 30% 5%, 35% 3%, 40% 6%, 45% 4%, 50% 7%, 55% 5%, 60% 8%, 65% 6%, 70% 9%, 75% 7%, 80% 10%, 85% 8%, 90% 11%, 95% 9%, 100% 12%, 100% 88%, 95% 91%, 90% 89%, 85% 92%, 80% 90%, 75% 93%, 70% 91%, 65% 94%, 60% 92%, 55% 95%, 50% 93%, 45% 96%, 40% 94%, 35% 97%, 30% 95%, 25% 98%, 20% 96%, 15% 99%, 10% 97%, 5% 100%, 0% 98%);
    }

    .parchment::before {
        content: "📜";
        display: block;
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        opacity: 0.7;
    }

    .parchment h2 {
        text-align: center;
        text-transform: uppercase;
        border-bottom: 2px solid #2c1810;
        padding-bottom: 10px;
        letter-spacing: 2px;
    }

    .parchment-content {
        line-height: 1.8;
        font-size: 1.1rem;
        text-align: justify;
        margin-top: 20px;
        white-space: pre-wrap; 
    }

    .parchment-date {
        margin-top: 30px;
        text-align: right;
        font-style: italic;
        font-size: 0.9rem;
        border-top: 1px solid rgba(44, 24, 16, 0.2);
        padding-top: 10px;
    }

    .imperial-seal {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        margin-bottom: 20px;
        filter: sepia(0.5) contrast(1.2);
        border: 2px solid #2c1810;
    }
</style>

<div class="chronicles-container">
    <h1 style="color: #d4b16a; text-align: center; margin-bottom: 50px; font-size: 3rem;">— The Archive Chronicles —</h1>

    @forelse($chronicles as $news)
        <article class="parchment">
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" class="imperial-seal" alt="Imperial Seal">
            @endif
            
            <h2>{{ $news->title }}</h2>
            
            <div class="parchment-content">
                {{ $news->content }}
            </div>

            <div class="parchment-date">
                Decreed on the {{ $news->created_at->format('d M, Y') }}
            </div>
        </article>
    @empty
        <p style="color: #fff; text-align: center; font-style: italic;">The scribes have been silent... No decrees found.</p>
    @endforelse
</div>
@endsection
</body>
</html>