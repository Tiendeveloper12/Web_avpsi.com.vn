<!DOCTYPE html>
<html>
<head>
    <title>{{ $gallery->title }}</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1000px; margin: 0 auto; }
        h1 { color: #333; }
        .back { margin-bottom: 20px; }
        .back a { color: #007bff; text-decoration: none; }
        .back a:hover { text-decoration: underline; }
        .gallery-description { background: white; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .photos { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); 
            gap: 15px;
        }
        .photo { 
            border-radius: 5px; 
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }
        .photo:hover { transform: scale(1.05); }
        .photo img { width: 100%; height: 200px; object-fit: cover; display: block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="back">
            <a href="/gallery">← Back to Galleries</a>
        </div>

        <h1>{{ $gallery->title }}</h1>
        
        <div class="gallery-description">
            <p>{{ $gallery->description }}</p>
        </div>

        @if($photos->count() > 0)
            <div class="photos">
                @foreach($photos as $photo)
                    <div class="photo">
                        @if(isset($photo->image) && $photo->image)
                            <img src="/images/{{ $photo->image }}" alt="{{ $photo->title }}">
                        @else
                            <div style="width: 100%; height: 200px; background: #ddd; display: flex; align-items: center; justify-content: center;">
                                <span style="color: #999;">No Image</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p style="text-align: center; color: #999;">No photos in this gallery yet.</p>
        @endif
    </div>
</body>
</html>